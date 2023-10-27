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
                        <div class="card-header">Edit Art</div>

                        <div class="card-body">
                        <form action="{{ route('arts.update', $art->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control" name="name" value="{{ $art->name }}" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

        <div class="col-md-6">
        <input type="text" name="description" id="description" value="{{$art->description}}" class="form-control"></br>
        </div>
    </div>

    <div class="form-group row">
        <label for="longitude" class="col-md-4 col-form-label text-md-right">Style Id</label>

        <div class="col-md-6">
        <select id="style_id" name="style_id" class="form-control">
        <option value="">Style</option>
        @foreach ($styles as $style)
            <option value="{{ $style->id }}">{{ $style->nameStyle }}</option>
        @endforeach
    </select>
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
