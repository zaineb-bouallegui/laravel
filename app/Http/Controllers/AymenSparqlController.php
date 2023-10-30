<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use EasyRdf\Sparql\Client;

class AymenSparqlController extends Controller
{
    public function monumentQuery(Request $request)
    {
        // Initialize the SPARQL client with the SPARQL endpoint URL
        $sparqlEndpoint = 'http://localhost:3030/my-dataset/query'; // Adjust this URL as needed
        $sparqlClient = new Client($sparqlEndpoint);

        // Define your SPARQL query
        $sparqlQuery = '
        PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
        PREFIX ns: <http://www.semanticweb.org/mega-pc/ontologies/2023/9/untitled-ontology-6#>
        
        SELECT (strafter(str(?endroit), "#") as ?localEndroit) ?nom ?longitude ?latitude ?adresse ?ville
        WHERE {
          ?endroit rdf:type ns:Monument .
          ?endroit ns:Nom ?nom .
  ?endroit ns:Longitude ?longitude .
  ?endroit ns:Latitude ?latitude .
  ?endroit ns:Adresse ?adresse .
  ?endroit ns:Ville ?ville .
  
        }
        
        
        ';

        // Execute the SPARQL query using the SPARQL client
        $results = $sparqlClient->query($sparqlQuery);

        // Pass the results to the view
        return view('Sparql.endroitMonument', ['results' => $results]);
    }





    public function villeQuery(Request $request)
    {
        // Initialize the SPARQL client with the SPARQL endpoint URL
        $sparqlEndpoint = 'http://localhost:3030/my-dataset/query'; // Adjust this URL as needed
        $sparqlClient = new Client($sparqlEndpoint);

        // Define your SPARQL query
        $sparqlQuery = '
        PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
        PREFIX ns: <http://www.semanticweb.org/mega-pc/ontologies/2023/9/untitled-ontology-6#>
        
        SELECT (strafter(str(?endroit), "#") as ?localEndroit) ?nom ?longitude ?latitude ?adresse ?ville
        WHERE {
          ?endroit rdf:type ns:Ville .
          ?endroit ns:Nom ?nom .
  ?endroit ns:Longitude ?longitude .
  ?endroit ns:Latitude ?latitude .
  ?endroit ns:Adresse ?adresse .
  ?endroit ns:Ville ?ville .
  
        }
        
        
        ';

        // Execute the SPARQL query using the SPARQL client
        $results = $sparqlClient->query($sparqlQuery);

        // Pass the results to the view
        return view('Sparql.endroitVille', ['results' => $results]);
    }


public function trieParCategEndroit(Request $request)
{
    // Initialize the SPARQL client with the SPARQL endpoint URL
    $sparqlEndpoint = 'http://localhost:3030/my-dataset/query'; // Adjust this URL as needed
    $sparqlClient = new Client($sparqlEndpoint);

    // Define your SPARQL query
    $sparqlQuery = '
    PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
    PREFIX ns: <http://www.semanticweb.org/mega-pc/ontologies/2023/9/untitled-ontology-6#>
    
    SELECT ?endroit ?nom ?categorie
    WHERE {
      ?endroit rdf:type ?categorie .
      ?endroit ns:Nom ?nom .
      FILTER (?categorie = ns:Ville || ?categorie = ns:Monument)
    }
    ORDER BY ?categorie ?nom
    
    
    ';

    // Execute the SPARQL query using the SPARQL client
    $results = $sparqlClient->query($sparqlQuery);

    // Pass the results to the view
    return view('Sparql.triParCateg', ['results' => $results]);
}



public function listPhotos(Request $request)
{
    // Initialize the SPARQL client with the SPARQL endpoint URL
    $sparqlEndpoint = 'http://localhost:3030/my-dataset/query'; // Adjust this URL as needed
    $sparqlClient = new Client($sparqlEndpoint);

    // Define your SPARQL query
    $sparqlQuery = '
    PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
    PREFIX ns: <http://www.semanticweb.org/mega-pc/ontologies/2023/9/untitled-ontology-6#>
    
    SELECT ?photo ?titre ?auteur ?imagePath ?type
    WHERE {
    
      ?photo ns:Titre ?titre .
      ?photo ns:Auteur ?auteur .
      ?photo ns:imagePath ?imagePath .
      ?photo ns:Type ?type
    
    }
    
    
    ';

    // Execute the SPARQL query using the SPARQL client
    $results = $sparqlClient->query($sparqlQuery);

    // Pass the results to the view
    return view('Sparql.listPhoto', ['results' => $results]);
}



public function endroitEvenement(Request $request)
{
    // Initialize the SPARQL client with the SPARQL endpoint URL
    $sparqlEndpoint = 'http://localhost:3030/my-dataset/query'; // Adjust this URL as needed
    $sparqlClient = new Client($sparqlEndpoint);

    // Define your SPARQL query
    $sparqlQuery = '
    PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
PREFIX ns: <http://www.semanticweb.org/mega-pc/ontologies/2023/9/untitled-ontology-6#>

SELECT ?nom ?adresse (STR(?latitude) AS ?latitudeValue) (STR(?longitude) AS ?longitudeValue) ?ville ?evenementTitre
WHERE {
  ?endroit rdf:type ns:Ville ;
           ns:organiseA ?evenement ;
           ns:Adresse ?adresse ;
           ns:Latitude ?latitude ;
           ns:Longitude ?longitude ;
           ns:Nom ?nom ;
           ns:Ville ?ville .
    ?evenement rdf:type ns:Evenement ;
            ns:Titre ?evenementTitre .
}

    
    ';

    // Execute the SPARQL query using the SPARQL client
    $results = $sparqlClient->query($sparqlQuery);

    // Pass the results to the view
    return view('Sparql.endroitEvenement', ['results' => $results]);
}


public function endroitPhotos(Request $request)
{
    // Initialize the SPARQL client with the SPARQL endpoint URL
    $sparqlEndpoint = 'http://localhost:3030/my-dataset/query'; // Adjust this URL as needed
    $sparqlClient = new Client($sparqlEndpoint);

    // Define your SPARQL query
    $sparqlQuery = '
    PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
    PREFIX ns: <http://www.semanticweb.org/mega-pc/ontologies/2023/9/untitled-ontology-6#>
    
    SELECT ?photo ?auteur ?titre ?type ?imagePath ?endroit ?NomEndroit
    WHERE {
      ?photo ns:appartientA ?endroit .
      ?photo ns:Auteur ?auteur .
      ?photo ns:Titre ?titre .
      ?photo ns:Type ?type .
      ?photo ns:imagePath ?imagePath .
       ?endroit        ns:Nom ?NomEndroit .
    }
    
    
    ';

    // Execute the SPARQL query using the SPARQL client
    $results = $sparqlClient->query($sparqlQuery);

    // Pass the results to the view
    return view('Sparql.endroitPhotos', ['results' => $results]);
}


public function allEndroits(Request $request)
{
    // Initialize the SPARQL client with the SPARQL endpoint URL
    $sparqlEndpoint = 'http://localhost:3030/my-dataset/query'; // Adjust this URL as needed
    $sparqlClient = new Client($sparqlEndpoint);

    // Define your SPARQL query
    $sparqlQuery = '
    PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
    PREFIX ns: <http://www.semanticweb.org/mega-pc/ontologies/2023/9/untitled-ontology-6#>
    SELECT ?endroit ?nom ?adresse (STR(?latitude) AS ?latitudeValue) (STR(?longitude) AS ?longitudeValue) ?ville
    WHERE {
      ?endroit ns:Nom ?nom .
      ?endroit ns:Adresse ?adresse .
      ?endroit ns:Latitude ?latitude .
      ?endroit ns:Longitude ?longitude .
      ?endroit ns:Ville ?ville .
    }
    

    
    
    ';

    // Execute the SPARQL query using the SPARQL client
    $results = $sparqlClient->query($sparqlQuery);

    // Pass the results to the view
    return view('Sparql.endroitAll', ['results' => $results]);
}

}


