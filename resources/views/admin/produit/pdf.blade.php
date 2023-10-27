<!DOCTYPE html>
<html>
<head>
    <title>Liste de Produits</title>
    <style>
        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #000;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Liste de Produits</h1>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Catégorie</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produits as $produit)
            <tr>
                <td>{{ $produit->nom }}</td>
                <td>{{ $produit->description }}</td>
                <td>{{ $produit->prix }}</td>
                <td>{{ $produit->quantite }}</td>
                <td>{{ $produit->categorie->nom }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
