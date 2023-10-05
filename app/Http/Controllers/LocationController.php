<?php

namespace App\Http\Controllers;

use App\Models\Location;

use Illuminate\Http\Request;

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



public function store(Request $request)
{
    $location = new Location;

    $location->name = $request->name; // Get the content of the 'name' field
    $location->address = $request->address; // Get the content of the 'address' field
    $location->latitude = $request->latitude; // Get the content of the 'latitude' field
    $location->longitude = $request->longitude; // Get the content of the 'longitude' field
    $location->city = $request->city; // Get the content of the 'city' field
    $location->description = $request->description; // Get the content of the 'description' field

    // Check if an image file was uploaded and handle it
    if ($request->hasFile('image')) {
        // Store the uploaded image and set the 'image' field in the Location model
        $imagePath = $request->file('image')->store('images');
        $location->image = $imagePath;
    }

    // Save the Location model to the database
    $location->save();

    // Redirect to the location list page or wherever you prefer
    return redirect()->route('locations.index')->with('success', 'Location added successfully!');
}





    public function destroy(Location $location)
    {
        $location->delete();
    
        return redirect()->route('locations.index')->with('success', 'Location deleted successfully!');
    }
    
}
