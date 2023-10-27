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
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
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

<body class="g-sidenav-show  bg-gray-200">
    @include('layouts.layout')

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!--  Navbar -->
        @include('layouts.nav')
        @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
        <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Location list</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Id</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Photos</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">City</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Address</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Longtitude</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Latitude</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Description</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
        @foreach($locations as $location)
        <tr>
                      <td>
                        <p class="text-sm font-weight-bold mb-0">{{ $location->id }}</p>
                      </td>
                      <td>
                        <p class="text-sm font-weight-bold mb-0">{{ $location->name }}</p>
                      </td>
                      <td>
                    <!-- Display the ID of the associated photo(s) -->
                    <p class="text-sm font-weight-bold mb-0">
                        @foreach($location->photos as $photo)
                          
                           <img class="avatar avatar-sm me-3 border-radius-lg" src="{{ asset('storage/' . $photo->url) }}" >
                        @endforeach
                    </p>
                </td>
                      <td>
                        <p class="text-sm font-weight-bold mb-0">{{ $location->city }}</p>
                      </td>
                      <td>
                        <p class="text-sm font-weight-bold mb-0">{{ $location->address }}</p>
                      </td>
                      <td>
                        <p class="text-sm font-weight-bold mb-0">{{ $location->longitude }}</p>
                      </td>
                      <td>
                        <p class="text-sm font-weight-bold mb-0">{{ $location->latitude }}</p>
                      </td>
                      <td>
    <textarea class="form-control" rows="4">{{ $location->description }}</textarea>
</td>
<td>
    <form action="{{ route('locations.destroy', $location->id) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
    </form>

    <a href="{{ route('locations.edit', $location->id) }}" class="btn btn-primary btn-sm">Modify</a>
</td>

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
                    <h6 class="text-white text-capitalize ps-3">Add location</h6>
                </div>
            </div>
        </div>
        <div class="card-body">
   

    <form action="{{ route('locations.store') }}" method="POST" enctype="multipart/form-data" id="location-form">
        @csrf
        <div class="row mb-3">
            <div class="col-md-4">
                <div class="input-group input-group-outline">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name">
                    <div class="error-feedback" id="name-error"></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group input-group-outline">
                    <label class="form-label">Address</label>
                    <input type="text" class="form-control" name="address" id="address">
                    <div class="error-feedback" id="address-error"></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group input-group-outline">
                    <label class="form-label">Latitude</label>
                    <input type="text" class="form-control" name="latitude" id="latitude">
                    <div class="error-feedback" id="latitude-error"></div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-4">
                <div class="input-group input-group-outline">
                    <label class="form-label">Longitude</label>
                    <input type="text" class="form-control" name="longitude" id="longitude">
                    <div class="error-feedback" id="longitude-error"></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group input-group-outline">
                    <label class="form-label">City</label>
                    <input type="text" class="form-control" name="city" id="city">
                    <div class="error-feedback" id="city-error"></div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="input-group input-group-outline">
                <label class="form-label">Description</label>
                <textarea class="form-control" rows="5" name="description" id="description"></textarea>
                <div class="error-feedback" id="description-error"></div>
            </div>
        </div>
        <button type="submit" class="btn btn-icon btn-3 btn-primary align-item-center" id="add-location-button">
            <span class="btn-inner--icon"><i class="material-icons">play_arrow</i></span>
            <span class="btn-inner--text">Add location</span>
        </button>
    </form>
</div>

<script>
    // Add an event listener for input fields to perform real-time validation
    const form = document.getElementById('location-form');

    form.addEventListener('input', function (event) {
        if (event.target.tagName === 'INPUT' || event.target.tagName === 'TEXTAREA') {
            const inputField = event.target;
            const fieldName = inputField.name;
            const errorFeedback = document.getElementById(`${fieldName}-error`);
            let errorMessage = '';

            // Custom validation logic based on field name
            if (fieldName === 'name'  || fieldName === 'address' || fieldName === 'city') {
                // Check if the input contains only digits
                if (/^\d+$/.test(inputField.value)) {
                    errorMessage = 'Should not be a number';
                }
                else
            if(inputField.value.length >= 50)
            {
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
                }
            else
            if(inputField.value.length >= 10)
            {
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



 
       
<script>
    // Add an event listener for form submission
    document.getElementById('location-form').addEventListener('submit', function (event) {
        // Prevent the default form submission to inspect the data before sending
        event.preventDefault();

        // Log form data to the console
        console.log('Form Data:', new FormData(this));

        // Optionally, you can also log specific fields like this:
        console.log('Name:', this.elements['name'].value);
        console.log('Address:', this.elements['address'].value);

        // Now you can continue with the form submission
        this.submit();
    });
</script>

                
              

            @include('layouts.footer')
    </main>
    <div class="fixed-plugin">
        <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
            <i class="material-icons py-2">settings</i>
        </a>
        <div class="card shadow-lg">
            <div class="card-header pb-0 pt-3">
                <div class="float-start">
                    <h5 class="mt-3 mb-0">Material UI Configurator</h5>
                    <p>See our dashboard options.</p>
                </div>
                <div class="float-end mt-4">
                    <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                        <i class="material-icons">clear</i>
                    </button>
                </div>
                <!-- End Toggle Button -->
            </div>
            <hr class="horizontal dark my-1">
            <div class="card-body pt-sm-3 pt-0">
                <!-- Sidebar Backgrounds -->
                <div>
                    <h6 class="mb-0">Sidebar Colors</h6>
                </div>
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <div class="badge-colors my-2 text-start">
                        <span class="badge filter bg-gradient-primary active" data-color="primary"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-dark" data-color="dark"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-info" data-color="info"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-success" data-color="success"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-warning" data-color="warning"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-danger" data-color="danger"
                            onclick="sidebarColor(this)"></span>
                    </div>
                </a>
                <!-- Sidenav Type -->
                <div class="mt-3">
                    <h6 class="mb-0">Sidenav Type</h6>
                    <p class="text-sm">Choose between 2 different sidenav types.</p>
                </div>
                <div class="d-flex">
                    <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark"
                        onclick="sidebarType(this)">Dark</button>
                    <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent"
                        onclick="sidebarType(this)">Transparent</button>
                    <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white"
                        onclick="sidebarType(this)">White</button>
                </div>
                <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
                <!-- Navbar Fixed -->
                <div class="mt-3 d-flex">
                    <h6 class="mb-0">Navbar Fixed</h6>
                    <div class="form-check form-switch ps-0 ms-auto my-auto">
                        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed"
                            onclick="navbarFixed(this)">
                    </div>
                </div>
                <hr class="horizontal dark my-3">
                <div class="mt-2 d-flex">
                    <h6 class="mb-0">Light / Dark</h6>
                    <div class="form-check form-switch ps-0 ms-auto my-auto">
                        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version"
                            onclick="darkMode(this)">
                    </div>
                </div>
                <hr class="horizontal dark my-sm-4">
                <a class="btn bg-gradient-info w-100"
                    href="https://www.creative-tim.com/product/material-dashboard-pro">Free Download</a>
                <a class="btn btn-outline-dark w-100"
                    href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard">View
                    documentation</a>
                <div class="w-100 text-center">
                    <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard"
                        data-icon="octicon-star" data-size="large" data-show-count="true"
                        aria-label="Star creativetimofficial/material-dashboard on GitHub">Star</a>
                    <h6 class="mt-3">Thank you for sharing!</h6>
                    <a href="https://twitter.com/intent/tweet?text=Check%20Material%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard"
                        class="btn btn-dark mb-0 me-2" target="_blank">
                        <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/material-dashboard"
                        class="btn btn-dark mb-0 me-2" target="_blank">
                        <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!--   Core JS Files   -->
    @vite(['resources/assets/js/core/popper.min.js'])
    @vite(['resources/assets/js/core/bootstrap.min.js'])
    @vite(['resources/assets/js/plugins/perfect-scrollbar.min.js'])
    @vite(['resources/assets/js/plugins/smooth-scrollbar.min.js'])
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <!-- <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script> -->
    @vite(['resources/assets/js/material-dashboard.min.js?v=3.1.0'])

</body>

</html>
