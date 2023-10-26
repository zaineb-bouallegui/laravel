<!DOCTYPE html>
<html lang="en">

<head>
@include('layoutsFront.head')
<style>
        .custom-lightbox {
            max-width: 300px;
            max-height: 200px;
        }
    </style>
</head>

<body>

@include('layoutsFront.header')

<main id="main">
    <!-- ======= End Page Header ======= -->
    <div class="page-header d-flex align-items-center">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 text-center">
                    <h2>{{ $art->name }}</h2>
                    <p>{{ $art->description }}</p>
                </div>
            </div>
        </div>
    </div><!-- End Page Header -->

    <!-- ======= Gallery Single Section ======= -->
   <section id="gallery-single" class="gallery-single">
    <div class="container">
        <div class="position-relative h-100">
            <div class="swiper-wrapper align-items-center">
                <div class="swiper-slide text-center"> 
                    <img src="{{ asset('images/' . $art->image) }}" alt="{{ $art->nom }}" style="max-width: 100%; height: auto;">
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-lg-8">
                <div class="portfolio-description">
                    <h2>{{ $art->name }}</h2>
                    <p>{{ $art->description }}</p>
                    <p><strong>Style :</strong> {{ $art->style->nameStyle }}</p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- End Gallery Single Section -->
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
