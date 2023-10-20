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

    <!-- ======= End Page Header ======= -->
    <div class="page-header d-flex align-items-center">
      <div class="container position-relative">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6 text-center">
            <h2>About</h2>
            <p>Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>

            <a class="cta-btn" href="contact.html">Available for hire</a>

          </div>
        </div>
      </div>
    </div><!-- End Page Header -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row gy-4 justify-content-center">
          <div class="col-lg-4">
            <img src="{{Vite::asset('resources/assets/img/profile-img.jpg')}}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-5 content">
            <h2>Professional Photographer from New York</h2>
            <p class="fst-italic py-3">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
            </p>
            <div class="row">
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span>1 May 1995</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Website:</strong> <span>www.example.com</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span>+123 456 7890</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span>New York, USA</span></li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span>30</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong> <span>Master</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>PhEmailone:</strong> <span>email@example.com</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Freelance:</strong> <span>Available</span></li>
                </ul>
              </div>
            </div>
            <p class="py-3">
              Officiis eligendi itaque labore et dolorum mollitia officiis optio vero. Quisquam sunt adipisci omnis et ut. Nulla accusantium dolor incidunt officia tempore. Et eius omnis.
              Cupiditate ut dicta maxime officiis quidem quia. Sed et consectetur qui quia repellendus itaque neque. Aliquid amet quidem ut quaerat cupiditate. Ab et eum qui repellendus omnis culpa magni laudantium dolores.
            </p>
            <p class="m-0">
              Recusandae est praesentium consequatur eos voluptatem. Vitae dolores aliquam itaque odio nihil. Neque ut neque ut quae voluptas. Maxime corporis aut ut ipsum consequatur. Repudiandae sunt sequi minus qui et. Doloribus molestiae officiis.
              Soluta eligendi fugiat omnis enim. Numquam alias sint possimus eveniet ad. Ratione in earum eum magni totam.
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

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
                    <p>{{ $review->content }}</p>
                    <div class="profile mt-auto">
                        <img src="{{Vite::asset('resources/assets/img/testimonials/testimonials-1.jpg')}}" class="testimonial-img" alt="">
                        <h6>{{ $review->email }}</h6>
                        <h4>{{ $review->title }}</h4>
                    </div>
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