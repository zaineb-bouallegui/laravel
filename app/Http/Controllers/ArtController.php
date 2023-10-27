<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Models\Art;
use App\Models\Style;

class ArtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $styles = Style::all();
        $artQuery = Art::query();
    
        if ($request->has('style')) {
            $styleId = $request->input('style');
            $artQuery->where('style_id', $styleId);
        }
    
        $arts = $artQuery->get();
    
        return view('arts.index', compact('arts', 'styles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $styles = Style::all();
        return view('arts.create' , compact('styles'));
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
            'name' => 'required|string|max:10',
            'description' => 'required|string|max:225',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'style_id' => 'required', // Include style_id in the validation
        ]);
       
    
        // Gestion de l'image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $validatedData['image'] = $imageName;
        
    }
    Art::create($validatedData);

    return redirect('/art')->with('flash_message', 'Art Ajouté!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $arts = Art::find($id); // Remplacez "Art" par le nom de votre modèle
        return view('arts.show', ['arts' => $arts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    
     public function edit(Art $art)
     {
         $styles = Style::all();
         return view('arts.edit', compact('art', 'styles'));
     }
     
     
     
     public function update(Request $request, $id)
     {
         
         $data = $request->except('_token','_method');
     
         Art::where('id', $id)->update($data);
     
         return redirect('/art');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $art = Art::find($id);

        if (!$art) {
            return redirect('/art')->with('error', 'Art non trouvé.');
        }
    
        $art->delete();
    
        return redirect('/art')->with('success', 'Art supprimé avec succès.');
    }

    
    public function indexFront()
    {
        $art=Art::all();
        return view('front.art.art-list')->with('art',$art);

    }
    public function detailFront($id)
    {
        $art = Art::find($id);
        if (!$art) {
            return redirect()->route('arts.index')->with('error', 'Art non trouvé.');
        }
    
        return view('front.art.art-detail', compact('art'));
    }
}
