<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use EasyRdf\Sparql\Client;

class Art2SparqlController extends Controller
{
    public function querySparql(Request $request)
    {
        // Initialize the SPARQL client with the SPARQL endpoint URL
        $sparqlEndpoint = 'http://localhost:3030/my-dataset/query'; // Adjust this URL as needed
        $sparqlClient = new Client($sparqlEndpoint);

        // Define your SPARQL query
        $sparqlQuery = '
        PREFIX ns: <http://www.semanticweb.org/mega-pc/ontologies/2023/9/untitled-ontology-6#>
        PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
        SELECT ?annee (COUNT(?art) AS ?nombreOeuvres)
WHERE {
  ?art rdf:type ns:Art .
  ?art ns:Annee ?annee_original .
  BIND(IF(STRSTARTS(?annee_original, "2020\n"), "2020", ?annee_original) AS ?annee)
}
GROUP BY ?annee';

        // Execute the SPARQL query using the SPARQL client
        $results = $sparqlClient->query($sparqlQuery);

        // Pass the results to the view
        return view('Sparql.art2-sparql-results', ['results' => $results]);
    }
}
