<?php

namespace App\Http\Controllers;

use App\Models\Location;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LocationController extends Controller
{
    public function create()
    {
        return view('locations.create');
    }
    

public function index()
{
    $locations = Location::all(); 
    return view('admin.locations', ['locations' => $locations]);
}

public function indexFront()
{
    $locations = Location::all(); 
    return view('front.locations', ['locations' => $locations]);
}

public function locationDetails($id)
{
    $location = Location::find($id);

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
        'address' => 'required|string|max:50',
        'latitude' => 'required|numeric|max:10',
        'longitude' => 'required|numeric|max:10',
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
    
    // $data = $request->except('_token','_method');

    Location::where('id', $id)->update($request->all());

    return redirect()->route('locations');
}


    public function destroy(Location $location)
    {
        $location->delete();
    
        return redirect()->route('locations')->with('success', 'Location deleted successfully!');
    }
    
}
