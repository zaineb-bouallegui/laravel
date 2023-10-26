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

    public function indexFront(){
        $reviews = Review::all();
        return view('front.about',['reviews' => $reviews]);
    }


    public function create(){
        return view('Review.create');
    }
    public function store(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'email' => 'required|email',
        'subject' => 'required|string',
        'message' => 'required|string',
        'rating' => 'required|integer|min:1|max:5',
    ]);

    // Create a new review record in the database
    Review::create($validatedData);

    // Redirect to the reviews index page or a success page
    return redirect()->route('Review.index')->with('success', 'Review submitted successfully!');
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
        'email' => 'required|email',
        'subject' => 'required|string',
        'message' => 'required|string',
        'rating' => 'required|integer|min:1|max:5',
    ]);

    $review->update($validatedData);

    // Redirect to the reviews index page or a success page
    return redirect()->route('Review.about');
}


}