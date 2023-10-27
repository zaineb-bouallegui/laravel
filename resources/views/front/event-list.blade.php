<!DOCTYPE html>
<html lang="en">

<head>
@include('layoutsFront.head')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    // Wait for the document to be ready
    $(document).ready(function () {
        $('#location-filter-form').submit(function (e) {
            e.preventDefault(); // Prevent form submission

            var location = $('#lieu').val().toLowerCase();

            $('.service-item').each(function () {
                var itemLocation = $(this).find('.location').text().toLowerCase();

                if (itemLocation.includes(location)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
</script>

</head>

<body>

  <!-- ======= Header ======= -->
  @include('layoutsFront.header')
<!-- End Header -->

  <main id="main" data-aos="fade" data-aos-delay="1500">

    <!-- ======= End Page Header ======= -->
    <div class="page-header d-flex align-items-center">
      <div class="container position-relative">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6 text-center">
            <h2> Liste d'évènement</h2>
            <p>Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>

            <a href="{{ url('/participation/create') }}" class="cta-btn" title="participer">
    <span class="text-white text-capitalize ps-3">Participer maintenant</span>
</a>
           
          </div>
        </div>
      </div>
      
    </div><!-- End Page Header -->
   
    <!-- ======= Services Section ======= -->
    <div class="container">
    <div class="row gy-4">
        <div class="col-md-9">
            <div class="row gy-4">
                <!-- Your event items go here -->
            </div>
        </div>
        <div class="col-md-3">
            <form id="location-filter-form">
                <div class="form-group">
                    <label for="lieu">Filter par lieu:</label>
                    <input type="text" class="form-control" id="lieu" name="lieu">
                </div>
            </form>
        </div>
    </div>
</div>

    <section id="services" class="services">
   

  <div class="container">
    <div class="row gy-4">
      @foreach($events as $item)
      <div class="col-xl-3 col-md-6 d-flex mb-4">
        <div class="service-item position-relative" style="height: 300px;width: 350px;"> <!-- Set a fixed width -->
          <i class="bi bi-activity"></i>{{ $item->date }}
          <h4>{{ $item->nom }}</h4>
          <p class="location">{{ $item->lieu }}</p>  <!-- Add the location here -->
          <p>{{ $item->description }}</p>
          
         
          
          
        </div>
      </div>
      @if($loop->iteration % 4 == 0)
      </div> <!-- Close the current row after every 4 items -->
      <div class="row gy-4"> <!-- Start a new row for the next 4 items -->
      @endif
      @endforeach
    </div>
  </div>
</section>


   
    <!-- ======= Pricing Section ======= -->
   
   

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('layoutsFront.footer')
<!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader">
    <div class="line"></div>
  </div>

  <!-- Vendor JS Files -->
 
    @vite(['resources/assets/vendor/bootstrap/js/bootstrap.bundle.min.js'])
    @vite(['resources/assets/vendor/swiper/swiper-bundle.min.js'])
    @vite(['resources/assets/vendor/glightbox/js/glightbox.min.js'])
    @vite(['resources/assets/vendor/php-email-form/validate.js'])

  <!-- Template Main JS File -->
  @vite(['resources/assets/js/main.js'])

</body>

</html>
<style>

  
  </style>
