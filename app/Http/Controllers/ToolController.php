<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tool;
use App\Models\Stock;


class ToolController extends Controller
{


    

    public function index2()
    {
        $tools = Tool::all();
        $stocks = Stock::all();

   
        return view('Tool.toolsfront', [
        'tools' => $tools,
        'stocks' => $stocks,
    ]);

    }

    public function index()
    {
        $tools = Tool::all();
        $stocks = Stock::all();
   
           return view('Tool.index', [
        'tools' => $tools,
        'stocks' => $stocks,
    ]);

    }

    // Method to display the creation form
    public function create()    
    {        $stocks = Stock::all();


        return view('Tool.create',['stocks' => $stocks]);
    }

    // Method to handle the submission of the creation form
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'nom' => 'required|string',
            'description' => 'required|string',
            'prix' => 'required|numeric',
            'categorie' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'stock_id' => 'required|exists:stocks,id',
        ]);


        // Store the image in the 'public' disk in the 'images' directory
        $imagePath = $request->file('image')->store('images', 'public');
        // Create a new Tool record
        
        $tool = new Tool($validatedData);
        $tool->image = $imagePath;

        // Save the record to the database
        $tool->save();
            // Associate the Tool with the specified Stock
        $tool->stock_id = $validatedData['stock_id'];
        $tool->save();

        // Redirect the user to a confirmation or listing page
        return redirect()->route('Tool.index')->with('success', 'Tool créé avec succès.');
    }




    public function delete(Tool $tool)
    {
        return view('Tool.delete', compact('tool'));
    }

    public function destroy(Tool $tool)
    {
        $tool->delete();

        return redirect()->route('Tool.index');
    }




    public function edit(Tool $tool)
    {
        return view('Tool.update', compact('tool'));
    }
    public function update(Request $request, Tool $tool)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string',
            'description' => 'required|string',
            'prix' => 'required|numeric',
            'categorie' => 'required|string',
            
        ]);
    
        $tool->update($validatedData);
    
        // Redirect to the reviews index page or a success page
        return redirect()->route('Tool.index');
    }



}
