<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png"> -->
  @vite(['resources/assets/img/apple-icon.png'])
  <!-- <link rel="icon" type="image/png" href="../assets/img/favicon.png"> -->
  @vite(['resources/assets/img/favicon.png'])
  <title>
    Material Dashboard 2 by Creative Tim
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
 @vite(['resources/assets/css/nucleo-icons.css'])
 @vite(['resources/assets/css/nucleo-svg.css'])
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <!-- <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" /> -->
  @vite(['resources/assets/css/material-dashboard.css?v=3.1.0'])
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>



<body>
<div class="container">
  <table>
  <tr>
  <td>
    <h1>Delete Tool</h1>
    <p>Are you sure you want to delete this tool?</p>
    <p><strong>Tool ID:</strong> {{ $tool->id }}</p>
    <p><strong>Name:</strong> {{ $tool->nom }}</p>
    <p><strong>Description:</strong> {{ $tool->description }}</p>
    <p><strong>Price:</strong> {{ $tool->prix }}</p>
    <p><strong>Stock:</strong> {{ $tool->stock }}</p>
    <p><strong>Category:</strong> {{ $tool->categorie }}</p>
    </td>
    <td>
    <img src="{{ asset('storage/' . $tool->image) }}" alt="Tool Image" width="300" height="300" >
</td>
</tr>
</table>


    <form method="POST" action="{{ route('tools.destroy', $tool) }}">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger">Confirm Delete</button>
    </form>

    
</div>
</body>
</html>