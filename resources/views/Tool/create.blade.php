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
    <h1>Créer un nouvel art matériel</h1>
    

    
    <form method="POST" action="{{ route('tools.store') }}" enctype="multipart/form-data">
        @csrf <!-- CSRF Token -->
        
        <!-- Champ pour le nom -->
        <div class="input-group input-group-outline mb-3">
                      <label class="form-label" for="nom">nom</label>
                      <input type="text" class="form-control" name="nom" id="nom" required>
        </div>
        
        <!-- Champ pour la description -->
        <div class="input-group input-group-outline mb-3">
                      <label class="form-label" for="description" >Description</label>
                      <textarea name="description" id="description"  class="form-control" required></textarea>
        </div>
        
        <!-- Champ pour le prix -->
        <div class="input-group input-group-outline mb-3">
                      <label class="form-label" for="prix">Price</label>
                      <input type="number" name="prix" id="prix" step="0.01" class="form-control" required>
                    </div>
        
        <!-- Champ pour le stock -->
        <div class="input-group input-group-outline mb-3">
        <label for="stock_id">Select Stock:</label>
           <select id="stock_id" name="stock_id" required>
        @foreach($stocks as $stock)
            <option value="{{ $stock->id }}">{{ $stock->location }}</option>
            @endforeach

    </select>

                    </div>
        <!-- Champ pour la catégorie -->
        <div class="input-group input-group-outline mb-3">
                      <label class="form-label" for="categorie">Category</label>
                      <input type="text" name="categorie" id="categorie"  class="form-control" required>
                    </div>


                    <div class="input-group input-group-outline mb-3">
                    <label class="form-label" for="image">Image</label>
                      <input type="file" name="image" id="image"  class="form-control" required>
                    </div>
        
        
        <!-- Bouton de soumission -->
        <div class="text-center"> 
            <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Créer</button>
        </div>
    </form>
</body>
</html>
