<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\Location;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PhotoController extends Controller
{


    public function index()
    {
        $photos = Photo::with('location')->get(); 
        $locations = Location::all();
        return view('admin.photos', ['photos' => $photos],['locations' =>$locations]);
    }
    

    public function store(Request $request)
{
    // Define validation rules
    $rules = [
        'location_id' => 'required|exists:locations,id',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'title' => 'required|string',
        'description' => 'required|string',
    ];

    $messages = [
        'required' => 'The :attribute field is required.',
        'exists' => 'The selected :attribute is invalid.',
        'image' => 'The :attribute must be an image.',
        'mimes' => 'The :attribute must be a file of type: :values.',
        'max' => 'The :attribute may not be greater than :max kilobytes.',
        'string' => 'The :attribute must be a string.',
    ];

    // Create a validator instance
    $validator = Validator::make($request->all(), $rules, $messages);

    // Check if validation fails
    if ($validator->fails()) {
        return redirect()
            ->back()
            ->withErrors($validator)
            ->withInput();
    }

    // If validation passes, handle file upload and other operations
    $locationId = $request->input('location_id');

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->storeAs('photos', $imageName, 'public');

        $photo = new Photo();
        $photo->location_id = $locationId;
        $photo->url = 'photos/' . $imageName;
        $photo->title = $request->input('title');
        $photo->description = $request->input('description');
        $photo->save();

        return redirect()->route('photos')->with('success', 'Photo uploaded successfully.');
    }

    return redirect()->back()->with('error', 'Failed to upload the photo.');
}



    public function edit(Photo $photo)
    {
        $locations = Location::all(); // Retrieve all available locations
        return view('admin.photosEdit', compact('photo', 'locations'));
    }
    

    public function update(Request $request, Photo $photo)
    {
        $rules = [
            'location_id' => 'required|exists:locations,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string',
            'description' => 'required|string',
        ];
    
        $messages = [
            'required' => 'The :attribute field is required.',
            'exists' => 'The selected :attribute is invalid.',
            'image' => 'The :attribute must be an image.',
            'mimes' => 'The :attribute must be a file of type: :values.',
            'max' => 'The :attribute may not be greater than :max kilobytes.',
            'string' => 'The :attribute must be a string.',
        ];
    
        // Create a validator instance
        $validator = Validator::make($request->all(), $rules, $messages);
    
        // Check if validation fails
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        
        $locationId = $request->input('location_id');
        
        // Check if a new image has been provided
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('photos', $imageName, 'public');
    
            // Delete the old image from storage
            Storage::disk('public')->delete($photo->url);
    
            // Update the photo record
            $photo->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'location_id' => $locationId,
                'url' => 'photos/' . $imageName, // Update the image URL
            ]);
        } else {
            // If no new image is provided, update other fields
            $photo->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'location_id' => $locationId,
            ]);
        }
    
        return redirect()->route('photos')->with('success', 'Photo updated successfully.');
    }
    

    public function destroy(Photo $photo)
    {
        // Delete the photo file from storage
        Storage::disk('public')->delete($photo->url);
        
        $photo->delete();
    
        return redirect()->route('photos')->with('success', 'Photo deleted successfully.');
    }
}
