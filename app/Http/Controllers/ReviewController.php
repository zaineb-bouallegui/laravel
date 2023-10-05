<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review; 


class ReviewController extends Controller
{
    //
    public function index(){
        $reviews = Review::all();
        return view('Review.index',['reviews' => $reviews]);
    }

    public function create(){
        return view('Review.create');
    }
    public function store(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'email' => 'required|string',
        'title' => 'required|string',
        'content' => 'required|string',
        'rating' => 'required|integer',
    ]);

    // Create a new review record in the database
    Review::create($validatedData);

    // Redirect to the reviews index page or a success page
    return redirect()->route('Review.index');
}


    public function delete(Review $review)
    {
        return view('Review.delete', compact('review'));
    }

    public function destroy(Review $review)
    {
        $review->delete();

        // Redirect to the reviews index page or a success page
        return redirect()->route('Review.index');
    }


// public function delete(){
//     return view('Review.delete');
// }
    
    // public function update(){
    //     return view('Review.update');
    // }

   
    
    public function show(Review $review)
{
    return view('Review.show', compact('review'));
}


    public function edit(Review $review)
{
    return view('Review.update', compact('review'));
}
public function update(Request $request, Review $review)
{
    $validatedData = $request->validate([
        'email' => 'required|string',
        'title' => 'required|string',
        'content' => 'required|string',
        'rating' => 'required|integer',
    ]);

    $review->update($validatedData);

    // Redirect to the reviews index page or a success page
    return redirect()->route('Review.index');
}


}
