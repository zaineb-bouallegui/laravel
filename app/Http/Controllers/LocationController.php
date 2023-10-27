<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Comment; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;
class LocationController extends Controller
{
    public function create()
    {
        return view('locations.create');
    }
    

    public function index()
    {
        $topLocations = Location::select('locations.id', 'locations.name')
            ->selectRaw('COUNT(comments.id) as comment_count')
            ->leftJoin('comments', 'locations.id', '=', 'comments.location_id')
            ->groupBy('locations.id', 'locations.name') // Group by both id and name
            ->orderByDesc('comment_count')
            ->take(10)
            ->get();
            $locationCount = Location::count();
        
        $locations = Location::all(); 
        return view('admin.locations', ['locations' => $locations, 'topLocations' => $topLocations, 'locationCount' => $locationCount]);
    }
    
    
   

public function indexFront()
{
    $locations = Location::all(); 
    $comments = Comment::all();
    return view('front.locations', ['locations' => $locations ],['comments'=>$comments]);
}

public function locationDetails($id)
{

    $location = Location::with('comments')->find($id);
    if (!$location) {
        return "Location not found";
    }

    return view('front.locationDetails', ['location' => $location]);
}



public function store(Request $request)
{
    // Define validation rules
    $rules = [
        'name' => 'required|string|max:50',
        'address' => 'required|string|max:100',
        'latitude' => 'required|regex:/^\d+(\.\d{1,10})?$/|max:50',
        'longitude' => 'required|regex:/^\d+(\.\d{1,10})?$/|max:50',        
        'city' => 'required|string|max:50',
        'description' => 'required|string',
    ];


    $messages = [
        'required' => 'The :attribute field is required.',
        'string' => 'The :attribute field must be a string.',
        'max' => 'The :attribute field may not be greater than :max characters.',
        'numeric' => 'The :attribute field must be a number.',
    ];

 
    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
        return redirect()
            ->route('locations') 
            ->withErrors($validator) 
            ->withInput(); // Keep the old input values
    }

    // If validation passes, create and save the location
    $location = new Location;
    $location->name = $request->name;
    $location->address = $request->address;
    $location->latitude = $request->latitude;
    $location->longitude = $request->longitude;
    $location->city = $request->city;
    $location->description = $request->description;
    $location->save();

    return redirect()->route('locations')->with('success', 'Location added successfully!');
}




public function edit(Location $location)
{
    return view('admin.locationsEdit', compact('location'));
}


public function update(Request $request, $id)
{
    // Define validation rules (same as in the store function)
    $rules = [
        'name' => 'required|string|max:50',
        'address' => 'required|string|max:50',
        'latitude' => 'required|numeric|max:50', // Update max value to 10 as in your store function
        'longitude' => 'required|numeric|max:50', // Update max value to 10 as in your store function
        'city' => 'required|string|max:50',
        'description' => 'required|string',
    ];

    $messages = [
        'required' => 'The :attribute field is required.',
        'string' => 'The :attribute field must be a string.',
        'max' => 'The :attribute field may not be greater than :max characters.',
        'numeric' => 'The :attribute field must be a number.',
    ];

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
        return redirect()
            ->route('locations.edit', $id) // Redirect back to the edit form
            ->withErrors($validator)
            ->withInput();
    }

    $data = $request->except('_token', '_method');

    Location::where('id', $id)->update($data);

    return redirect()->route('locations');
}



    public function destroy(Location $location)
    {
        $location->delete();
    
        return redirect()->route('locations')->with('success', 'Location deleted successfully!');
    }
    

    public function locationStatistics()
{
    $locationCount = Location::count();
    $commentCount = Comment::count();

    // You can add more statistics here

    return view('admin.locationStatistics', [
        'locationCount' => $locationCount,
        'commentCount' => $commentCount,
    ]);
}

public function topLocationsByComments()
{
   

    return view('admin.topLocationsByComments', ['locations' => $locations]);
}

public function exportLocationPdf(){
    $pdf = \App::make('dompdf.wrapper');

    $pdf->getDomPDF()->set_option("enable_php", false);

    $locations = Location::get();
    $pdf = Pdf::loadView('pdf.locations',[
        'locations' => $locations
    ]);
    return $pdf->download('locations.pdf');
}


}
