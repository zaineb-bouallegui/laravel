<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events=Event::all();
        return view('events.index')->with('events',$events);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:30',
            'date' => 'required|date',
            'lieu' => 'required|string',
            'description' => 'required|string',
          
        ],[
            'required' => 'Le champ :attribute est requis.',
            'string' => 'Le champ :attribute doit être une chaîne de caractères.',
            'max' => 'Le champ :attribute ne peut pas dépasser 30 caractères .',
            'min' => 'Le champ :attribute ne peut pas etre moins que 3 caractères.',
           
        ]);
    
        Event::create($validatedData);
    
        return redirect('event')->with('flash_message', 'Événement ajouté avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event=Event::find($id);
        return view('events.show')->with('events',$event);
    }
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $event=Event::find($id);
       return view('events.edit')->with('events',$event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $event=Event::find($id);
      $input=$request->all();
      $event->update($input);
      return redirect('event')->with('flash_message','Evenement modifié ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Event::destroy($id);
       return redirect ('event')->with('flash_message','L\'événement a été supprimé avec succès.');
    }



     ////////Front
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexFront()
    {
        $events=Event::all();
        return view('front.event-list')->with('events',$events);

    }

   
    
}
