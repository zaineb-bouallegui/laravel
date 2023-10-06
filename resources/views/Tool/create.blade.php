<!DOCTYPE html>
<html>
<head>
    <title>Formulaire de création d'art matériel</title>
</head>
<body>
    <h1>Créer un nouvel art matériel</h1>
    
    <form method="POST" action="{{ route('tools.store') }}">
        @csrf <!-- CSRF Token -->
        
        <!-- Champ pour le nom -->
        <div>
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom" required>
        </div>
        
        <!-- Champ pour la description -->
        <div>
            <label for="description">Description :</label>
            <textarea name="description" id="description" required></textarea>
        </div>
        
        <!-- Champ pour le prix -->
        <div>
            <label for="prix">Prix :</label>
            <input type="number" name="prix" id="prix" step="0.01" required>
        </div>
        
        <!-- Champ pour le stock -->
        <div>
            <label for="stock">Stock :</label>
            <input type="number" name="stock" id="stock" required>
        </div>
        
        <!-- Champ pour la catégorie -->
        <div>
            <label for="categorie">Catégorie :</label>
            <input type="text" name="categorie" id="categorie" required>
        </div>
        
        
        <!-- Bouton de soumission -->
        <div>
            <button type="submit">Créer</button>
        </div>
    </form>
</body>
</html>
