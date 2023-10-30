<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use EasyRdf\Sparql\Client;

class NourSparqlController extends Controller
{
    public function querySparql(Request $request)
    {
        // Initialize the SPARQL client with the SPARQL endpoint URL
        $sparqlEndpoint = 'http://localhost:3030/my-dataset/query'; // Adjust this URL as needed
        $sparqlClient = new Client($sparqlEndpoint);

        // Define your SPARQL query
        $sparqlQuery = '
        PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
        PREFIX ns: <http://www.semanticweb.org/mega-pc/ontologies/2023/9/untitled-ontology-6#>
        
        SELECT ?nom ?description ?image (STR(?prix) AS ?prixValeur)
        (STR(?quantite) AS ?quantiteValeur) ?nomCategorie ?endroit
       WHERE {
        ?produit ns:Nom ?nom .
        ?produit ns:Description ?description .
        ?produit ns:Image ?image .
        ?produit ns:Prix ?prix .
        ?produit ns:Quantite ?quantite .
        OPTIONAL {
        ?produit ns:contient ?categorie.
        ?categorie ns:NomCategorie ?nomCategorie.
        }
        OPTIONAL {
        ?produit ns:seTrouve ?endroit.
        }
       }
        
        ';

        // Execute the SPARQL query using the SPARQL client
        $results = $sparqlClient->query($sparqlQuery);

        // Pass the results to the view
        return view('Sparql.produit', ['results' => $results]);
    }

    public function categorie(Request $request)
    {
        // Initialize the SPARQL client with the SPARQL endpoint URL
        $sparqlEndpoint = 'http://localhost:3030/my-dataset/query'; // Adjust this URL as needed
        $sparqlClient = new Client($sparqlEndpoint);

        // Define your SPARQL query
        $sparqlQuery = '
        PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
        PREFIX ns: <http://www.semanticweb.org/mega-pc/ontologies/2023/9/untitled-ontology-6#>
        
        SELECT ?nom ?description
WHERE {
 ?categorie ns:NomCategorie ?nom .
 ?categorie ns:Description ?description 
}

        
        ';

        // Execute the SPARQL query using the SPARQL client
        $results = $sparqlClient->query($sparqlQuery);

        // Pass the results to the view
        return view('Sparql.categorie1', ['results' => $results]);
    }


    public function nbProduit(Request $request)
    {
        // Initialize the SPARQL client with the SPARQL endpoint URL
        $sparqlEndpoint = 'http://localhost:3030/my-dataset/query'; // Adjust this URL as needed
        $sparqlClient = new Client($sparqlEndpoint);

        // Define your SPARQL query
        $sparqlQuery = '
        PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
        PREFIX ns: <http://www.semanticweb.org/mega-pc/ontologies/2023/9/untitled-ontology-6#>
        
        SELECT ?nomCategorie (COUNT(?produit) AS ?nombreProduits)
        WHERE {
         ?categorie ns:NomCategorie ?nomCategorie.
        OPTIONAL {
        ?produit ns:contient ?categorie.
        }
        }
        GROUP BY ?nomCategorie
        
        ';

        // Execute the SPARQL query using the SPARQL client
        $results = $sparqlClient->query($sparqlQuery);

        // Pass the results to the view
        return view('Sparql.produit2', ['results' => $results]);
    }


    public function maxPrix(Request $request)
    {
        // Initialize the SPARQL client with the SPARQL endpoint URL
        $sparqlEndpoint = 'http://localhost:3030/my-dataset/query'; // Adjust this URL as needed
        $sparqlClient = new Client($sparqlEndpoint);

        // Define your SPARQL query
        $sparqlQuery = '
        PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
        PREFIX ns: <http://www.semanticweb.org/mega-pc/ontologies/2023/9/untitled-ontology-6#>
        
        SELECT ?nomCategorie ?nomProduit ?prixMax
WHERE {
 {
 SELECT ?nomCategorie (MAX(?prix) AS ?prixMax)
 WHERE {
 ?categorie ns:NomCategorie ?nomCategorie.
 ?produit ns:contient ?categorie.
 ?produit ns:Prix ?prix.
 }
 GROUP BY ?nomCategorie
 }
 ?categorie ns:NomCategorie ?nomCategorie.
 ?produit ns:contient ?categorie.
 ?produit ns:Nom ?nomProduit.
 ?produit ns:Prix ?prixMax.
}
        ';

        // Execute the SPARQL query using the SPARQL client
        $results = $sparqlClient->query($sparqlQuery);

        // Pass the results to the view
        return view('Sparql.produit3', ['results' => $results]);
    }
}