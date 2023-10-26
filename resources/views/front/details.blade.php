<!DOCTYPE html>
<html lang="en">

<head>
@include('layoutsFront.head')

</head>

<body>

@include('layoutsFront.header')


  <main id="main" >

    <!-- ======= End Page Header ======= -->
    <div class="page-header d-flex align-items-center">
      <div class="container position-relative">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6 text-center">
            <h2>Gallery Single</h2>
            <p>Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>

            <a class="cta-btn" href="contact.html">Available for hire</a>

          </div>
        </div>
      </div>
    </div><!-- End Page Header -->

    <!-- ======= Gallery Single Section ======= -->
    <section id="gallery-single" class="gallery-single">
      <div class="container">

        <div class="position-relative h-100">
          <div class="slides-1 portfolio-details-slider swiper">
            <div class="swiper-wrapper align-items-center">

              <div class="swiper-slide">
                <img src="{{Vite::asset('resources/assets/img/gallery/gallery-8.jpg')}}">
              </div>
              <div class="swiper-slide">
                <img src="{{Vite::asset('resources/assets/img/gallery/gallery-9.jpg')}}">
              </div>
              <div class="swiper-slide">
                <img src="{{Vite::asset('resources/assets/img/gallery/gallery-10.jpg')}}">
              </div>
              <div class="swiper-slide">
                <img src="{{Vite::asset('resources/assets/img/gallery/gallery-11.jpg')}}">
              </div>
              <div class="swiper-slide">
                <img src="{{Vite::asset('resources/assets/img/gallery/gallery-12.jpg')}}">
              </div>
              <div class="swiper-slide">
                <img src="{{Vite::asset('resources/assets/img/gallery/gallery-13.jpg')}}">
              </div>

            </div>
            <div class="swiper-pagination"></div>
          </div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>

        </div>

        <div class="row justify-content-between gy-4 mt-4">

          <div class="col-lg-8">
            <div class="portfolio-description">
              

              <div class="testimonial-item">
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
                <div>
                  <img src="{{Vite::asset('resources/assets/img/testimonials/testimonials-2.jpg')}}" class="testimonial-img" alt="">
                  <h3>Sara Wilsson</h3>
                  <h4>Designer</h4>
                </div>
              </div>

             
            </div>
          </div>

          <div class="col-lg-3">
            <div class="portfolio-info">
              <h3>Project information</h3>
              <ul>
                <li><strong>Category</strong> <span>Nature Photography</span></li>
                <li><strong>Client</strong> <span>ASU Company</span></li>
                <li><strong>Project date</strong> <span>01 March, 2022</span></li>
                <li><strong>Project URL</strong> <a href="#">www.example.com</a></li>
                <li><a href="#" class="btn-visit align-self-start">Visit Website</a></li>
              </ul>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Gallery Single Section -->

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
