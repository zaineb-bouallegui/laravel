<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participation;
use App\Models\Event;
use App\Http\Controllers\EventController;
use Illuminate\Http\Response;
class ParticipationController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $events = Event::all();
        $participationsQuery = Participation::query();
    
        if ($request->has('event')) {
            $eventId = $request->input('event');
            $participationsQuery->where('event_id', $eventId);
        }
    
        $participations = $participationsQuery->get();
    
        return view('front.event-list', compact('participations', 'events'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $events = Event::all();
        return view('participations.create', compact('events'));
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
            'nom' => 'required|string|min:3|max:15', // Exemple de validation supplémentaire (longueur maximale de 255 caractères)
            'prenom' => 'required|string|min:3|max:15', // Exemple de validation supplémentaire (longueur maximale de 255 caractères)
            'event_id' => 'required', // Exemple de validation supplémentaire (doit être un entier)
        ], [
            'required' => 'Le champ :attribute est requis.',
            'string' => 'Le champ :attribute doit être une chaîne de caractères.',
            'max' => 'Le champ :attribute ne peut pas dépasser 15 caractères.',
            'min' => 'Le champ :attribute ne peut pas etre moins que 3 caractères.',
           
        ]);
    
        // Si la validation échoue, Laravel redirigera automatiquement avec les erreurs de validation
        // Si la validation réussit, le code suivant sera exécuté
    
        Participation::create($validatedData);
    
        return redirect('/event-list')->with('flash_message', 'Participation ajoutée avec succès!');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $participations = Participation::find($id);

    if (!$participations) {
        return redirect()->route('indexBack')->with('error', 'Participation not found');
    }

    // Check if the associated event exists
    $event = Event::find($participations->event_id);

    if (!$event) {
        return redirect()->route('indexBack')->with('error', 'Associated event not found');
    }

    return view('participations.show', compact('participations', 'event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $participation=Participation::find($id);
       return view('participations.edit')->with('participations',$participation);
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
        $participation=Participation::find($id);
        $input=$request->all();
        $participation->update($input);
        return redirect('indexBack')->with('flash_message','Participation modifiée ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Participation::destroy($id);
        return redirect ('indexBack')->with('flash_message','La participation a été supprimé avec succès.');
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
    public function participate(Event $event)
    {
        // Add the participation record to the database
        Participation::create([
            'event_id' => $event->id,
            // 'status' => 'pending', // You can set an initial status as needed
        ]);
    
        // Optionally, you can redirect the user to a confirmation page or back to the event listing.
        return redirect()->route('front.event-list')->with('success', 'You have successfully participated in the event.');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexBack(Request $request)
    {
        $participations=Participation::all();
     
        $events = Event::all();
        $participationsQuery = Participation::query();
    
        if ($request->has('event')) {
            $eventId = $request->input('event');
            $participationsQuery->where('event_id', $eventId);
        }
    
        $participations = $participationsQuery->get();
    
        return view('participations.index', compact('participations', 'events'));


    }
    public function filterByLocation(Request $request)
    {
        $lieu = $request->input('lieu');
    
        // Query the events table to filter events by lieu
        $events = Event::where('lieu', $lieu)->get();
    
        return view('events.index')->with('events', $events);
    }

    public function exportToCSV()
    {
        // Retrieve all participation records from the database
        $participations = Participation::all();
    
        // Define the CSV file's headers
        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=participations.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0",
        );
    
        // Create a stream to write CSV data
        $handle = fopen('php://temp', 'w');
        
        // Add CSV header row
        fputcsv($handle, ["ID", "Nom", "Prénom","Status" ,"Event ID"]);
    
        // Add data for each participation record
        foreach ($participations as $participation) {
            fputcsv($handle, [$participation->nom, $participation->prenom,$participation->status, $participation->event_id]);
        }
    
        // Rewind the file pointer
        rewind($handle);
    
        // Generate the CSV file response
        $csvContent = stream_get_contents($handle);
        fclose($handle);
    
        // Use the response() function to create a response
        return response($csvContent, 200, $headers);
    }
    
}
