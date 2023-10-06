<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tool;

class ToolController extends Controller
{
    public function index()
    {
        $tools = Tool::all();
        return view('Tool.index', ['tools' => $tools]);
    }

    // Method to display the creation form
    public function create()    
    {
        return view('Tool.create');
    }

    // Method to handle the submission of the creation form
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'nom' => 'required|string',
            'description' => 'required|string',
            'prix' => 'required|numeric',
            'stock' => 'required|integer',
            'categorie' => 'required|string',
        ]);

        // Create a new Tool record
        $tool = new Tool($validatedData);

        // Save the record to the database
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
            'stock' => 'required|integer',
            'categorie' => 'required|string',
        ]);
    
        $tool->update($validatedData);
    
        // Redirect to the reviews index page or a success page
        return redirect()->route('Tool.index');
    }



}
