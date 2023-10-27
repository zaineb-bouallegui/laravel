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
    <h1>UPDATE</h1>
    
    <form method="POST" action="{{ route('stocks.update', $stock) }}">
        @csrf <!-- CSRF Token -->
        @method('PATCH')
    
        <!-- Champ pour le nom -->
        <div class="input-group input-group-outline mb-3">
                      <label     for="name">Name</label>
                      <input type="text" class="form-control" value="{{$stock->name}}" name="name" id="name" >
        </div>
        
          
        <!-- Champ pour le quantity -->
        <div class="input-group input-group-outline mb-3">
                      <label  for="quantity">Quantity</label>
                      <input type="number" name="quantity" id="quantity" value="{{$stock->quantity}}" class="form-control" >
                    </div>
        

        <!-- Champ pour la catégorie -->
        <div class="input-group input-group-outline mb-3">
                      <label  for="location">Location</label>
                      <input type="text" name="location" id="location" value="{{$stock->location}}"  class="form-control" >
                    </div>



        
        
        <!-- Bouton de soumission -->
        <div class="text-center"> 
            <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Update</button>
        </div>
    </form>
</body>
</html>













