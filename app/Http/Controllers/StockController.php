<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;

class StockController extends Controller
{
 


    public function index()
    {
        $stocks = Stock::all();
   
        return view('Stock.index', ['stocks' => $stocks]);

    }

    // Method to display the creation form
    public function create()    
    {
        return view('Stock.create');
    }

    // Method to handle the submission of the creation form
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'string',
            'quantity' => 'integer',
            'location' => 'string',
        ]);
        


        // Create a new Tool record
        
        $stock = new Stock($validatedData);

        // Save the record to the database
        $stock->save();

        // Redirect the user to a confirmation or listing page
        return redirect()->route('Stock.index')->with('success', 'Stock créé avec succès.');
    }




    public function delete(Stock $stock)
    {
        return view('Stock.delete', compact('stock'));
    }

    public function destroy(Stock $stock)
    {
        $stock->delete();

        return redirect()->route('Stock.index');
    }




    public function edit(Stock $stock)
    {
        return view('Stock.update', compact('stock'));
    }
    public function update(Request $request, Stock $stock)
    {
        $validatedData = $request->validate([
            'name' => 'string',
            'quantity' => 'integer',
            'location' => 'string',
        ]);

        $stock->update($validatedData);
    
        // Redirect to the reviews index page or a success page
        return redirect()->route('Stock.index');
    }



}
