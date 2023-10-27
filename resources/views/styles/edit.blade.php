<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit Location</title>
    <!-- Add your stylesheets and scripts here -->
    @vite(['resources/assets/img/apple-icon.png'])
    @vite(['resources/assets/img/favicon.png'])
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    @vite(['resources/assets/css/nucleo-icons.css'])
    @vite(['resources/assets/css/nucleo-svg.css'])
    @vite(['resources/assets/css/material-dashboard.css?v=3.1.0'])
</head>

<body class="g-sidenav-show bg-gray-200">
    @include('layouts.layout')

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        @include('layouts.nav')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Edit Style</div>

                        <div class="card-body">
                        <form action="{{ route('style.update', $styles->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group row">
        <label for="nameStyle" class="col-md-4 col-form-label text-md-right">nameStyle</label>

        <div class="col-md-6">
            <input id="nameStyle" type="text" class="form-control" name="nameStyle" value="{{ $styles->nameStyle }}" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="periode" class="col-md-4 col-form-label text-md-right">Periode</label>

        <div class="col-md-6">
        <input type="text" name="periode" id="periode" value="{{$styles->periode}}" class="form-control"></br>
        </div>
    </div>
    <div class="form-group row">
        <label for="artiste" class="col-md-4 col-form-label text-md-right">Artiste</label>

        <div class="col-md-6">
        <input type="text" name="artiste" id="artiste" value="{{$styles->artiste}}" class="form-control"></br>
        </div>
    </div>
   
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                Confirm Edit
            </button>
        </div>
    </div>
</form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footer')
    </main>
    <div class="fixed-plugin">
        <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
            <i class="material-icons py-2">settings</i>
        </a>
        <!-- Add your fixed plugins here -->
    </div>

    <!-- Add your scripts here -->
    @vite(['resources/assets/js/core/popper.min.js'])
    @vite(['resources/assets/js/core/bootstrap.min.js'])
    @vite(['resources/assets/js/plugins/perfect-scrollbar.min.js'])
    @vite(['resources/assets/js/plugins/smooth-scrollbar.min.js'])
    @vite(['resources/assets/js/material-dashboard.min.js?v=3.1.0'])
</body>

</html>
