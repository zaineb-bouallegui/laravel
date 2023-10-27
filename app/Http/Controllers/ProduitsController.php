<?php

namespace App\Http\Controllers;
use PDF;
use Illuminate\Support\ViewErrorBag;
use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Categorie;
class ProduitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
    $categories = Categorie::all();
    $produitsQuery = Produit::query();

    if ($request->has('categorie')) {
        $categorieId = $request->input('categorie');
        $produitsQuery->where('category_id', $categorieId);
    }
    $produits = $produitsQuery->get();

    return view('admin.produit.index', compact('produits', 'categories'));
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $categories = Categorie::all();
        return view('admin.produit.create', ['editMode' => false] , compact('categories'));
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
            'prix.required' => 'Le champ prix est obligatoire.',
            'quantite.required' => 'Le champ quantité est obligatoire.',
            'image.image' => 'Le fichier doit être une image.',
            'image.mimes' => 'Le fichier doit être au format jpeg, png, jpg, ou gif.',
            'image.max' => 'La taille de l\'image ne doit pas dépasser 2 Mo.',
            'category_id.required' => 'Le champ catégorie est obligatoire.',
            'prix.numeric' => 'Le champ prix doit être un nombre.',
            'prix.min' => 'Le champ prix doit être un nombre positif ou nul.',
            'quantite.numeric' => 'Le champ quantité doit être un nombre.',
            'quantite.min' => 'Le champ quantité doit être un nombre positif ou nul.',
        ];
        $validatedData = $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'prix' => ['required', 'numeric', 'min:0'],
            'quantite' => ['required', 'numeric', 'min:0'],
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required',
        ], $customMessages);

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
    $produit = Produit::find($id);

    if (!$produit) {
        return redirect()->route('admin.produit.index')->with('error', 'Produit non trouvé.');
    }

    return view('admin.produit.detail', compact('produit'));
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
    
        $categories = Categorie::all();
    
        return view('admin.produit.create', ['produit' => $produit, 'editMode' => true, 'categories' => $categories]);
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
        $customMessages = [
        'nom.required' => 'Le champ nom est obligatoire.',
        'description.required' => 'Le champ description est obligatoire.',
        'prix.required' => 'Le champ prix est obligatoire.',
        'quantite.required' => 'Le champ quantité est obligatoire.',
        'image.image' => 'Le fichier doit être une image.',
        'image.mimes' => 'Le fichier doit être au format jpeg, png, jpg, ou gif.',
        'image.max' => 'La taille de l\'image ne doit pas dépasser 2 Mo.',
        'category_id.required' => 'Le champ catégorie est obligatoire.',
        ];
        $validatedData = $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'prix' => 'required',
            'quantite'=>'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], $customMessages);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $validatedData['image'] = $imageName;
        }
    
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


public function generatePdf(Request $request)
{
    $categories = Categorie::all();
    $produitsQuery = Produit::query();

    if ($request->has('categorie')) {
        $categorieId = $request->input('categorie');
        $produitsQuery->where('category_id', $categorieId);
    }
    $produits = $produitsQuery->get();
    $pdf = PDF::loadView('admin.produit.pdf', compact('produits', 'categories'));
        return $pdf->download('liste_produits.pdf');
}




}
