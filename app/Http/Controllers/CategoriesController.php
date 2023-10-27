<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categorie::all();
        return view('admin.categorie.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('admin.categorie.create', ['editMode' => false]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customMessages = [
            'nom.required' => 'Le champ nom est obligatoire.',
            'description.required' => 'Le champ description est obligatoire.',
            ];
            $validatedData = $request->validate([
                'nom' => 'required',
                'description' => 'required',
            ], $customMessages);
    
        Categorie::create($validatedData);
    
        return redirect('/admin/categorie')->with('flash_message', 'Categorie Ajouté!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
{
    $categorie = Categorie::find($id);

    if (!$categorie) {
        return redirect('/admin/categorie')->with('error', 'Catégorie non trouvée.');
    }

    $produits = $categorie->produits; 

    return view('admin.categorie.detail', compact('categorie', 'produits'));
}

    


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorie = Categorie::find($id);
        if (!$categorie) {

            return redirect('/admin/categorie')->with('error', 'Categorie non trouvé.');
        }
    
        return view('admin.categorie.create', ['categorie' => $categorie, 'editMode' => true]);
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
        $customMessages = [
            'nom.required' => 'Le champ nom est obligatoire.',
            'description.required' => 'Le champ description est obligatoire.',
            ];
            $validatedData = $request->validate([
                'nom' => 'required',
                'description' => 'required',
            ], $customMessages);

        $categorie = Categorie::find($id);
        $categorie->update($validatedData);

        return redirect('/admin/categorie')->with('flash_message', 'Catégorie mise à jour !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorie = Categorie::find($id);
    
        if (!$categorie) {
            session()->flash('flash_message', 'Catégorie non trouvée.');
            return redirect('/admin/categorie');
        }
    
        $produits = $categorie->produits;
    
        if ($produits->count() > 0) {
            session()->flash('flash_message', 'Impossible de supprimer une catégorie associée à des produits.');
            return redirect('/admin/categorie');
        } else {
            $categorie->delete();
            return redirect('/admin/categorie');
        }
    }
    

}
