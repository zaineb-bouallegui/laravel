<!DOCTYPE html>
<html lang="en">

<head>
@include('layoutsFront.head')

</head>
@php
function displayStars($rating) {
    $stars = '';
    for ($i = 1; $i <= 5; $i++) {
        if ($i <= $rating) {
            $stars .= '<i class="bi bi-star text-warning"></i>';
        } else {
            $stars .= '<i class="bi bi-star text-secondary"></i>';
        }
    }
    return $stars;
}
@endphp


<body>

  <!-- ======= Header ======= -->
  @include('layoutsFront.header')
<!-- End Header -->

  <main id="main" >

 

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container">

        <div class="section-header">
          <h2>Testimonials</h2>
          <p>What they are saying</p>
          <a href="{{('create')}}"><p class="bg-success text-white px-2 py-1 rounded">click to give a review !</p></a>

        </div>

        <div class="slides-3 swiper">
    <div class="swiper-wrapper">
        @foreach($reviews as $review)
            <div class="swiper-slide">
                <div class="testimonial-item">
                    <div class="stars">
                        {!! displayStars($review->rating) !!}
                    </div>
                    <p>{{ $review->message }}</p>
                    <div class="profile mt-auto">
                        <img src="{{Vite::asset('resources/assets/img/testimonials/testimonials-1.jpg')}}" class="testimonial-img" alt="">
                        <h6>{{ $review->email }}</h6>
                        <h4>{{ $review->subject }}</h4>
                    </div>
                    <a class="cta-btn"  href="{{ route('Review.edit', $review) }}">Edit</a>
                </div>
            </div><!-- End testimonial item -->
        @endforeach
    </div>
    <div class="swiper-pagination"></div>
</div>




      </div>
    </section><!-- End Testimonials Section -->

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