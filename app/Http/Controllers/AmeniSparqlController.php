<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use EasyRdf\Sparql\Client;

class AmeniSparqlController extends Controller
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
        SELECT ?evenement ?titre ?lieu ?description ?date
        WHERE {
          ?evenement rdf:type ns:Evenement .
          ?evenement ns:Titre ?titre .
          ?evenement ns:Lieu ?lieu .
          ?evenement ns:Description ?description .
          ?evenement ns:Date ?dateLiteral .
        
          BIND(STR(?dateLiteral) AS ?date)
        }
        ';

        // Execute the SPARQL query using the SPARQL client
        $results = $sparqlClient->query($sparqlQuery);

        // Pass the results to the view
        return view('Sparql.event1-sparql-results', ['results' => $results]);
    }
    public function querySparql1(Request $request)
    {
        // Initialize the SPARQL client with the SPARQL endpoint URL
        $sparqlEndpoint = 'http://localhost:3030/my-dataset/query'; // Adjust this URL as needed
        $sparqlClient = new Client($sparqlEndpoint);

        // Define your SPARQL query
        $sparqlQuery = '
        PREFIX ns: <http://www.semanticweb.org/mega-pc/ontologies/2023/9/untitled-ontology-6#>
        PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
        SELECT ?evenement ?titre ?lieu ?description ?date ?message
        WHERE {
          ?evenement rdf:type ns:Evenement .
          ?evenement ns:Titre ?titre .
          ?evenement ns:Lieu ?lieu .
          ?evenement ns:Description ?description .
          ?evenement ns:Date ?dateLiteral .
          BIND(STR(?dateLiteral) AS ?date)
          BIND(IF(?lieu = "Carthage", "This event is in Carthage", "") AS ?message)
        }
        ORDER BY ASC(?titre)
        
        
        ';

        // Execute the SPARQL query using the SPARQL client
        $results = $sparqlClient->query($sparqlQuery);

        // Pass the results to the view
        return view('Sparql.event2-sparql-results', ['results' => $results]);
    }
    public function querySparql2(Request $request)
    {
        // Initialize the SPARQL client with the SPARQL endpoint URL
        $sparqlEndpoint = 'http://localhost:3030/my-dataset/query'; // Adjust this URL as needed
        $sparqlClient = new Client($sparqlEndpoint);

        // Define your SPARQL query
        $sparqlQuery = '
        PREFIX ns: <http://www.semanticweb.org/mega-pc/ontologies/2023/9/untitled-ontology-6#>
        PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
        SELECT ?evenement ?titre ?lieu ?description ?date
        WHERE {
          ?evenement rdf:type ns:Evenement .
          ?evenement ns:Titre ?titre .
          ?evenement ns:Lieu ?lieu .
          ?evenement ns:Description ?description .
          ?evenement ns:Date ?dateLiteral .
        
          BIND(STR(?dateLiteral) AS ?date)
        

          FILTER (?lieu = "Carthage")
        }
        
        
        ';

        // Execute the SPARQL query using the SPARQL client
        $results = $sparqlClient->query($sparqlQuery);

        // Pass the results to the view
        return view('Sparql.event3-sparql-results', ['results' => $results]);
    }
    public function querySparql4(Request $request)
    {
        // Initialize the SPARQL client with the SPARQL endpoint URL
        $sparqlEndpoint = 'http://localhost:3030/my-dataset/query'; // Adjust this URL as needed
        $sparqlClient = new Client($sparqlEndpoint);

        // Define your SPARQL query
        $sparqlQuery = '
        PREFIX ns: <http://www.semanticweb.org/mega-pc/ontologies/2023/9/untitled-ontology-6#>
PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
SELECT ?evenement ?titre ?lieu ?description ?date
WHERE {
  ?evenement rdf:type ns:Evenement .
  ?evenement ns:Titre ?titre .
  ?evenement ns:Lieu ?lieu .
  ?evenement ns:Description ?description .
  ?evenement ns:Date ?dateLiteral .
  BIND(STR(?dateLiteral) AS ?date)
  FILTER (CONTAINS(?lieu, "eu"))
}

        
        
        
        ';

        // Execute the SPARQL query using the SPARQL client
        $results = $sparqlClient->query($sparqlQuery);

        // Pass the results to the view
        return view('event4-sparql-results', ['results' => $results]);
    }
    public function querySparql5(Request $request)
    {
        // Initialize the SPARQL client with the SPARQL endpoint URL
        $sparqlEndpoint = 'http://localhost:3030/my-dataset/query'; // Adjust this URL as needed
        $sparqlClient = new Client($sparqlEndpoint);

        // Define your SPARQL query
        $sparqlQuery = '
        PREFIX ns: <http://www.semanticweb.org/mega-pc/ontologies/2023/9/untitled-ontology-6#>
        PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
        
        SELECT ?participation ?status ?nombre
        WHERE {
          ?participation rdf:type ns:Participation .
          ?participation ns:Status ?status .
          ?participation ns:Nombre ?nombreRaw.
          BIND(STR(?nombreRaw) AS ?nombre)
        }
        
        
        
        ';

        // Execute the SPARQL query using the SPARQL client
        $results = $sparqlClient->query($sparqlQuery);

        // Pass the results to the view
        return view('Sparql.part1-sparql-results', ['results' => $results]);
    }
    public function querySparql6(Request $request)
    {
        // Initialize the SPARQL client with the SPARQL endpoint URL
        $sparqlEndpoint = 'http://localhost:3030/my-dataset/query'; // Adjust this URL as needed
        $sparqlClient = new Client($sparqlEndpoint);

        // Define your SPARQL query
        $sparqlQuery = '
        PREFIX ns: <http://www.semanticweb.org/mega-pc/ontologies/2023/9/untitled-ontology-6#>
        PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
        PREFIX xsd: <http://www.w3.org/2001/XMLSchema#>
        
        SELECT ?participation ?status ?nombre
        WHERE {
          ?participation rdf:type ns:Participation .
          ?participation ns:Status ?status .
          ?participation ns:Nombre ?nombreRaw .
          BIND(xsd:integer(?nombreRaw) AS ?nombre)
          FILTER (?nombre > 50)
        }
        ORDER BY ASC(?nombre)
        
        
        
        ';

        // Execute the SPARQL query using the SPARQL client
        $results = $sparqlClient->query($sparqlQuery);

        // Pass the results to the view
        return view('Sparql.part2-sparql-results', ['results' => $results]);
    }
    public function querySparql7(Request $request)
    {
        // Initialize the SPARQL client with the SPARQL endpoint URL
        $sparqlEndpoint = 'http://localhost:3030/my-dataset/query'; // Adjust this URL as needed
        $sparqlClient = new Client($sparqlEndpoint);

        // Define your SPARQL query
        $sparqlQuery = '
        PREFIX ns: <http://www.semanticweb.org/mega-pc/ontologies/2023/9/untitled-ontology-6#>
        PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
        PREFIX xsd: <http://www.w3.org/2001/XMLSchema#>
        
        SELECT ?participation ?status ?nombre ?message
        WHERE {
          ?participation rdf:type ns:Participation .
          ?participation ns:Status ?statusRaw .
          ?participation ns:Nombre ?nombreRaw .
          BIND(xsd:integer(?nombreRaw) AS ?nombre)
           FILTER (?nombre > 50)
          BIND(UCASE(?statusRaw) AS ?status)
          BIND(IF(?status = "REFUSER", "Evenement refuse", 
                   IF(?status = "ACCEPTER", "Evenement accepte", "Pas encore traite")) AS ?message)
        }
        ORDER BY ASC(?nombre)
        
        
        
        
        ';

        // Execute the SPARQL query using the SPARQL client
        $results = $sparqlClient->query($sparqlQuery);

        // Pass the results to the view
        return view('Sparql.part3-sparql-results', ['results' => $results]);
    }
    public function querySparql8(Request $request)
    {
        // Initialize the SPARQL client with the SPARQL endpoint URL
        $sparqlEndpoint = 'http://localhost:3030/my-dataset/query'; // Adjust this URL as needed
        $sparqlClient = new Client($sparqlEndpoint);

        // Define your SPARQL query
        $sparqlQuery = '
        PREFIX ns: <http://www.semanticweb.org/mega-pc/ontologies/2023/9/untitled-ontology-6#>
        PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
        
        SELECT ?evenement ?titre ?lieu ?description ?date ?participation ?status ?nombre
        WHERE {
          ?evenement rdf:type ns:Evenement .
          ?evenement ns:Titre ?titre .
          ?evenement ns:Lieu ?lieu .
          ?evenement ns:Description ?description .
          ?evenement ns:Date ?dateLiteral .
          
          ?participation rdf:type ns:Participation .
          ?participation ns:Status ?status .
          ?participation ns:Nombre ?nombreRaw.
          ?participation ns:faitPartieDe ?evenement .
        
          BIND(STR(?dateLiteral) AS ?date)
          BIND(STR(?nombreRaw) AS ?nombre)
        }
        
        
        
        
        
        ';

        // Execute the SPARQL query using the SPARQL client
        $results = $sparqlClient->query($sparqlQuery);

        // Pass the results to the view
        return view('Sparql.partevent-sparql-results', ['results' => $results]);
    }
}
