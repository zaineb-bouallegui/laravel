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
