












<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>
    <h1>Tools Report</h1>

    <table id="customers">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Category</th>
                <th>Stock Location</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tools as $tool)
            <tr>
                <td>{{ $tool->id }}</td>
                <td>{{ $tool->nom }}</td>
                <td>{{ $tool->description }}</td>
                <td>{{ $tool->prix }}</td>
                <td>{{ $tool->categorie }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
