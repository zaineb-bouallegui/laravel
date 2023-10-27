<!DOCTYPE html>
<html lang="en">

<head>
    @include('layoutsFront.head')
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
</head>

<body>

    @include('layoutsFront.header')


    <main id="main">

        <!-- ======= End Page Header ======= -->

        <div class="page-header d-flex align-items-center">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h1>{{ $location->name }}</h1>
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
                            @foreach ($location->photos as $photo)
                                <div class="swiper-slide">
                                    <img src="{{ asset('storage/' . $photo->url) }}" style="height: 800px;"
                                        alt="">
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>

                </div>

                <div class="row justify-content-between gy-4 mt-4">

                    <div class="col-lg-8">
                        <div class="portfolio-description">
                            <h2>{{ $location->name }}</h2>
                            <p>
                                {{ $location->description }}
                            </p>
                            <div id="map" style="height: 300px;"></div>

                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="portfolio-info">
                            <h3>Location information</h3>
                            <ul>
                                <li><strong>City</strong> <span>{{ $location->city }}</span></li>
                                <li><strong>Address</strong> <span>{{ $location->address }}</span></li>
                                <li><strong>Longitude </strong> <span>{{ $location->longitude }}</span></li>
                                <li><strong>Latitude</strong> <span>{{ $location->latitude }}</span></li>
                            </ul>
                        </div>

                    </div>

                    <!-- Call the initMap function after the map <div> -->
                    <script>
                        function initMap() {
                            const location = {
                                lat: {{ $location->latitude }},
                                lng: {{ $location->longitude }}
                            };

                            const map = L.map("map").setView(location, 15); // You can adjust the initial zoom level

                            L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
                                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                            }).addTo(map);

                            L.marker(location).addTo(map)
                                .bindPopup("{{ $location->city }}")
                                .openPopup();
                        }

                        // Call the initMap function after the DOM is ready
                        document.addEventListener('DOMContentLoaded', initMap);
                    </script>


<section id="gallery-single" class="gallery-single">
      <div class="container">

  <div class="row justify-content-between gy-4 mt-4">

    <div class="col-lg-8">
      <div class="portfolio-description">


      @foreach ($location->comments as $comment)
        <div class="testimonial-item">
          <p>
            <i class="bi bi-quote quote-icon-left"></i>
            {{ $comment->message }}
          </p>
          <div>
            <img src="{{Vite::asset('resources/assets/img/testimonials/testimonials-2.jpg')}}" class="testimonial-img" alt="">
            <h3>nadhir.benslema@</h3>

          </div>
        </div>
        @endforeach



      </div>
    </div>

    

  </div>
  </div>
</section>
        </section><!-- End Gallery Single Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('layoutsFront.footer')


    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

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
