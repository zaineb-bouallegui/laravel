<!DOCTYPE html>
<html>
<head>
    <title>Formulaire de mise à jour d'art matériel</title>
</head>
<body>
    <h1>Mettre à jour un art matériel</h1>
    
    <form method="POST" action="{{ route('tools.update', ['tool' => $tool->id]) }}">
        @csrf <!-- CSRF Token -->
        @method('PATCH') <!-- Utilisez la méthode HTTP PUT pour la mise à jour -->

        <!-- Champ pour le nom -->
        <div>
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom" value="{{ $tool->nom }}" required>
        </div>
        
        <!-- Champ pour la description -->
        <div>
            <label for="description">Description :</label>
            <textarea name="description" id="description" required>{{ $tool->description }}</textarea>
        </div>
        
        <!-- Champ pour le prix -->
        <div>
            <label for="prix">Prix :</label>
            <input type="number" name="prix" id="prix" step="0.01" value="{{ $tool->prix }}" required>
        </div>
        
        <!-- Champ pour le stock -->
        <div>
            <label for="stock">Stock :</label>
            <input type="number" name="stock" id="stock" value="{{ $tool->stock }}" required>
        </div>
        
        <!-- Champ pour la catégorie -->
        <div>
            <label for="categorie">Catégorie :</label>
            <input type="text" name="categorie" id="categorie" value="{{ $tool->categorie }}" required>
        </div>
        
        <!-- Bouton de soumission -->
        <div>
            <button type="submit">Mettre à jour</button>
        </div>
    </form>
</body>
</html>
