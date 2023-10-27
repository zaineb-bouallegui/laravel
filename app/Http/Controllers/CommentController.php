<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment; 


class CommentController extends Controller
{
    //
    public function index(){
        $comments = Comment::all();
        return view('front.locations',['comments' => $comments]);
    }

    public function create(){
        return view('Comment.create');
    }
    public function store(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'user_id' => 'required|integer',
        'message' => 'required|string',
        
    ]);

    // Create a new comment record in the database
    Comment::create($validatedData);

    // Redirect to the comments index page or a success page
    return redirect()->route('Comment.index');
}


    public function delete(Comment $comment)
    {
        return view('Comment.delete', compact('comment'));
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        // Redirect to the comments index page or a success page
        return redirect()->route('Comment.index');
    }


// public function delete(){
//     return view('Comment.delete');
// }
    
    // public function update(){
    //     return view('Comment.update');
    // }

   
    
    public function show(Comment $comment)
{
    return view('Comment.show', compact('comment'));
}


    public function edit(Comment $comment)
{
    return view('Comment.update', compact('comment'));
}
public function update(Request $request, Comment $comment)
{
    $validatedData = $request->validate([
        'user_id' => 'required|integer',
        'message' => 'required|string',
       
    ]);

    $comment->update($validatedData);

    // Redirect to the comments index page or a success page
    return redirect()->route('Comment.index');
}
}