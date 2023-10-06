<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
class ProduitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produits = Produit::all();
        return view('admin.produit.index')->with('produits', $produits);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.produit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { $validatedData = $request->validate([
        'nom' => 'required',
        'description' => 'required',
        'prix' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
    ]);

    // Gestion de l'image
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        $validatedData['image'] = $imageName;
    }

    Produit::create($validatedData);

    return redirect('/admin/produit')->with('flash_message', 'Produit Ajouté!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    $produit = Produit::find($id);

    if (!$produit) {
        return redirect('/admin/produit')->with('error', 'Produit non trouvé.');
    }

    return view('admin.produit.create', ['produit' => $produit, 'editMode' => true]);

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
        $produit = Produit::find($id);

        if (!$produit) {
            return redirect('/admin/produit')->with('error', 'Produit non trouvé.');
        }
    
        $validatedData = $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'prix' => 'required',
        ]);
    
        $produit->update($validatedData);
    
        return redirect('/admin/produit')->with('success', 'Produit mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produit = Produit::find($id);

        if (!$produit) {
            return redirect('/admin/produit')->with('error', 'Produit non trouvé.');
        }
    
        $produit->delete();
    
        return redirect('/admin/produit')->with('success', 'Produit supprimé avec succès.');
    }
}
