<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Material Dashboard 2 by Creative Tim</title>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700">
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link id="pagestyle" href="{{ mix('css/material-dashboard.css') }}" rel="stylesheet">
</head>

<body class="g-sidenav-show bg-gray-200">
    @include('layouts.layout')
    @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        @include('layouts.nav')
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Photo list</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center justify-content-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Id</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Title</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Image</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Description</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"> Associated Location</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($photos as $photo)
                                    <tr>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ $photo->id }}</p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ $photo->title }}</p>
                                        </td>
                                        <td>
                                            <img src="{{ asset('storage/' . $photo->url) }}" alt="Photo" width="100">
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ $photo->description }}</p>
                                        </td>
                                        <td>
                                            <!-- Access the location data for the current photo -->
                                            <p class="text-sm font-weight-bold mb-0">
                                                Location: {{ $photo->location->name }} (ID: {{ $photo->location->id }})
                                            </p>
                                        </td>
                                        <td>
                                            <form action="{{ route('photos.destroy', $photo->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                            <a href="{{ route('photos.edit', $photo->id) }}" class="btn btn-primary btn-sm">Modify</a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-lg-4 col-md-6 mt-4 mb-4">
                <div class="card z-index-2">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Add Photo</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('photos.store') }}" method="POST" enctype="multipart/form-data" id="photo-form">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <div class="input-group input-group-outline">
                                        <label class="form-label">Title</label>
                                        <input type="text" class="form-control" name="title">
                                        @if($errors->has('title'))
            <div class="error-feedback text-danger">{{ $errors->first('title') }}</div>
        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-outline">
                                        <label class="form-label">Image</label>
                                        <input type="file" class="form-control" name="image" accept="image/*">
                                        @if($errors->has('image'))
            <div class="error-feedback text-danger">{{ $errors->first('image') }}</div>
        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="input-group input-group-outline">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" rows="5" name="description"></textarea>
                                    @if($errors->has('description'))
            <div class="error-feedback text-danger">{{ $errors->first('description') }}</div>
        @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-group-outline">
                                <label class="form-label">Location</label>
                                <select class="form-select" name="location_id">
                                    <option value="">Select a location</option>
                                    @foreach ($locations as $location)
                                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                                    @endforeach
                                    
                                </select>
                                @if($errors->has('location_id'))
            <div class="error-feedback text-danger">{{ $errors->first('location_id') }}</div>
        @endif
                            </div>
    </div>
                            <button type="submit" class="btn btn-icon btn-3 btn-primary align-item-center" id="add-photo-button">
                                <span class="btn-inner--icon"><i class="material-icons">play_arrow</i></span>
                                <span class="btn-inner--text">Add Photo</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Add an event listener for form submission
            document.getElementById('photo-form').addEventListener('submit', function (event) {
                // Prevent the default form submission to inspect the data before sending
                event.preventDefault();

                // Log form data to the console
                console.log('Form Data:', new FormData(this));

                // Optionally, you can also log specific fields like this:
                console.log('Title:', this.elements['title'].value);

                // Now you can continue with the form submission
                this.submit();
            });
        </script>

        @include('layouts.footer')
    </main>
    <div class="fixed-plugin">
        <!-- Add any fixed plugins here -->
    </div>

    @vite(['resources/assets/js/core/popper.min.js'])
    @vite(['resources/assets/js/core/bootstrap.min.js'])
    @vite(['resources/assets/js/plugins/perfect-scrollbar.min.js'])
    @vite(['resources/assets/js/plugins/smooth-scrollbar.min.js'])
    @vite(['resources/assets/js/material-dashboard.min.js?v=3.1.0'])
</body>

</html>
