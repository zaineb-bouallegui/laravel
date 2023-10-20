<!-- 
<div class="container">
    <h1>Delete Review</h1>
    <p>Are you sure you want to delete this review?</p>
    <p><strong>Review ID:</strong> {{ $review->id }}</p>
    <p><strong>Email:</strong> {{ $review->email }}</p>
    <p><strong>Title:</strong> {{ $review->title }}</p>
    <p><strong>Content:</strong> {{ $review->content }}</p>
    <p><strong>Rating:</strong> {{ $review->rating }}</p>

    <form method="POST" action="{{ route('Review.destroy', $review) }}">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger">Confirm Delete</button>
    </form>

    <a href="{{ route('Review.index') }}" class="btn btn-secondary">Cancel</a>
</div> -->



<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')

</head>

<body class="g-sidenav-show  bg-gray-200">
    @include('layouts.layout')

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    @include('layouts.nav')

    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
           <div > <!-- class="card mt-4 " -->
            <div class="card-header p-3">
            </div>
            <div class="card-body p-3 pb-0">
            
              <div class="alert alert-danger alert-dismissible text-white" role="alert">
                <span class="text-sm">Are you sure you want to delete this review ? </span>
              </div>
              
            </div>
          </div>
          
            
          </div>
        </div>
      </div>

      <div class="container-fluid py-4" >
                  
        <ul class="col-lg-6 col-md-6 mx-auto">
            <li class="list-group-item border-0 ps-0 pt-0 text-sm my-2"><strong class="text-dark">ID Review:</strong> {{ $review->id }}</li>
            <li class="list-group-item border-0 ps-0 text-sm my-2"><strong class="text-dark">Email:</strong> {{ $review->email }}</li>
            <li class="list-group-item border-0 ps-0 text-sm my-2"><strong class="text-dark">Message:</strong> {{ $review->message }}</li>
            <li class="list-group-item border-0 ps-0 text-sm my-2"><strong class="text-dark">Rating:</strong> {{ $review->rating }}</li>
        </ul>

        <form method="POST" action="{{ route('Review.destroy', $review) }}" class="col-lg-4 col-md-6 mx-auto">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">Confirm</button>
            <a href="{{ route('Review.index') }}" class="btn btn-info">Cancel</a>

        </form>

        </div>

       

        

     
      @include('layouts.footer')

    </div>
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
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark" onclick="sidebarType(this)">Dark</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="mt-3 d-flex">
          <h6 class="mb-0">Navbar Fixed</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
          </div>
        </div>
        <hr class="horizontal dark my-3">
        <div class="mt-2 d-flex">
          <h6 class="mb-0">Light / Dark</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
          </div>
        </div>
        <hr class="horizontal dark my-sm-4">
        <a class="btn bg-gradient-info w-100" href="https://www.creative-tim.com/product/material-dashboard-pro">Free Download</a>
        <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard">View documentation</a>
        <div class="w-100 text-center">
          <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/material-dashboard on GitHub">Star</a>
          <h6 class="mt-3">Thank you for sharing!</h6>
          <a href="https://twitter.com/intent/tweet?text=Check%20Material%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
          </a>
          <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/material-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
          </a>
        </div>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <!-- <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script> -->
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
