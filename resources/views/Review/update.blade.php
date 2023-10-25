<!-- 
<div class="container">
    <h1>Edit Review</h1>
    <form method="POST" action="{{ route('Review.update', $review) }}">
        @csrf
        @method('PATCH') {{-- Use PATCH method for updating --}}

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" class="form-control" value="{{ $review->email }}" required>
        </div>

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $review->title }}" required>
        </div>

        <div class="form-group">
            <label for="content">Review Content:</label>
            <textarea name="content" id="content" class="form-control" required>{{ $review->content }}</textarea>
        </div>

        <div class="form-group">
            <label for="rating">Rating:</label>
            <input type="number" name="rating" id="rating" class="form-control" value="{{ $review->rating }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Review</button>
    </form>
</div> -->




<head>
@include('layoutsFront.head')
</head>

<body>

<!-- ======= Header ======= -->
@include('layoutsFront.header')


<!-- End Header -->

<main id="main">

    <!-- ======= End Page Header ======= -->
    <div class="page-header d-flex align-items-center">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 text-center">
                    <h2>Review</h2>
                    <p>Here is the space where you can update your review :
                        <b>Your opinion matters !<b>
                    </p>

                </div>
            </div>
        </div>
    </div><!-- End Page Header -->

    <section id="review" class="contact">
        <div class="container">

            <div class="row justify-content-center mt-4">

                <div class="col-lg-9">
                    <form method="POST" action="{{ route('Review.update', $review) }}" role="form" class="php-email-form">
                        @csrf
                        @method('PATCH')

                        <div class="form-group mt-3">
                            <input type="email" class="form-control" name="email" id="email" value="{{ $review->email }}" required>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="subject" id="subject" value="{{ $review->subject }}" required>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" rows="5" id="message" value="{{ $review->message }}" required></textarea>
                        </div>
                        <div class="form-group mt-3">
                            <input type="number" name="rating" id="rating" class="form-control" value="{{ $review->rating }}" required>
                        </div>

                        <div class="my-3">
                            <div class="loading">Loading</div>
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                        </div>
                        <div class="text-center"><button type="submit">Update Review</button></div>
                    </form>
                </div>

            </div>

        </div>
    </section>

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

