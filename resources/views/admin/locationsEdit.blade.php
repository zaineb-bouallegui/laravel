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
        <div class="col-lg-4 col-md-6 mt-4 mb-4">
        <div class="card z-index-2">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Edit location</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">

                        <div class="card-body">
                        <form action="{{ route('locations.update', $location->id) }}" method="POST"  id="location-form">
    @csrf
    @method('PUT')

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control" name="name" value="{{ $location->name }}" required>
            <div class="error-feedback" id="name-error"></div>
                                        @if($errors->has('name'))
            <div class="error-feedback text-danger">{{ $errors->first('name') }}</div>
        @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

        <div class="col-md-6">
            <textarea id="description" class="form-control" rows="3" name="description">{{ $location->description }}</textarea>
            <div class="error-feedback" id="description-error"></div>
                                    @if($errors->has('description'))
            <div class="error-feedback text-danger">{{ $errors->first('description') }}</div>
        @endif 
        </div>
    </div>

    <div class="form-group row">
        <label for="city" class="col-md-4 col-form-label text-md-right">City</label>

        <div class="col-md-6">
            <input id="city" type="text" class="form-control" name="city" value="{{ $location->city }}" required>
            <div class="error-feedback" id="city-error"></div>
                                        @if($errors->has('city'))
            <div class="error-feedback text-danger">{{ $errors->first('city') }}</div>
        @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="longitude" class="col-md-4 col-form-label text-md-right">Longitude</label>

        <div class="col-md-6">
            <input id="longitude" type="text" class="form-control" name="longitude" value="{{ $location->longitude }}" required>
            <div class="error-feedback" id="longitude-error"></div>
                                        @if($errors->has('longitude'))
            <div class="error-feedback text-danger">{{ $errors->first('longitude') }}</div>
        @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="latitude" class="col-md-4 col-form-label text-md-right">Latitude</label>

        <div class="col-md-6">
            <input id="latitude" type="text" class="form-control" name="latitude" value="{{ $location->latitude }}" required>
            <div class="error-feedback" id="latitude-error"></div>
                                        @if($errors->has('latitude'))
            <div class="error-feedback text-danger">{{ $errors->first('latitude') }}</div>
        @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>

        <div class="col-md-6">
            <input id="address" type="text" class="form-control" name="address" value="{{ $location->address }}" required>
            <div class="error-feedback" id="address-error"></div>
                                        @if($errors->has('address'))
            <div class="error-feedback text-danger">{{ $errors->first('address') }}</div>
        @endif
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

        <script>
                        // Add an event listener for input fields to perform real-time validation
                        const form = document.getElementById('location-form');

                        form.addEventListener('input', function(event) {
                            if (event.target.tagName === 'INPUT' || event.target.tagName === 'TEXTAREA') {
                                const inputField = event.target;
                                const fieldName = inputField.name;
                                const errorFeedback = document.getElementById(`${fieldName}-error`);
                                let errorMessage = '';

                                // Custom validation logic based on field name
                                if (fieldName === 'name' || fieldName === 'address' || fieldName === 'city') {
                                    // Check if the input contains only digits
                                    if (/^\d+$/.test(inputField.value)) {
                                        errorMessage = 'Should not be a number';
                                    } else
                                    if (inputField.value.length >= 50) {
                                        errorMessage = 'No more than 50 caractere';
                                    }
                                }


                                if (fieldName === 'description') {
                                    // Check if the input contains only digits
                                    if (/^\d+$/.test(inputField.value)) {
                                        errorMessage = 'Should not be a number';
                                    }


                                }


                                if (fieldName === 'longitude' || fieldName === 'latitude') {
                                    // Check if the input contains only digits
                                    if (!/^\d+$/.test(inputField.value)) {
                                        errorMessage = 'Should only be a number';
                                    } else
                                    if (inputField.value.length >= 10) {
                                        errorMessage = 'No more than 50 caractere';
                                    }
                                }


                                // Example: Check if the input is empty
                                if (inputField.value.trim() === '') {
                                    errorMessage = 'This field is required';
                                }

                                // Update the errorFeedback
                                errorFeedback.textContent = errorMessage;
                            }
                        });
                    </script>
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
