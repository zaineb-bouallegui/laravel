<!DOCTYPE html>
<html lang="en">

<head>
@include('layoutsFront.head')

    

</head>

<body>

@include('layoutsFront.header')


<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex flex-column justify-content-center align-items-center" >
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 text-center">
            <h2>This is<span>the best</span> locations in Tunisia</h2>
            <p>Discover more about them by clicling</p>
           
        </div>
    </div>
</div>
</section><!-- End Hero Section -->

<main id="main" >

<!-- ======= Gallery Section ======= -->
<section id="gallery" class="gallery">
    <div class="container-fluid">

        <div class="row gy-4 justify-content-center">
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="gallery-item h-100">

                    <img src={{Vite::asset('resources/assets/img/gallery/gallery-1.jpg')}} class="img-fluid" alt="">
                    <div class="gallery-links d-flex align-items-center justify-content-center">
                        <a href='{{Vite::asset('resources/assets/img/gallery/gallery-1.jpg')}}' title="Gallery 1" class="glightbox preview-link"><i class="bi bi-arrows-angle-expand"></i></a>
                        <a href="{{('details')}}" class="details-link"><i class="bi bi-link-45deg"></i></a>
                    </div>
                </div>
            </div><!-- End Gallery Item -->
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="gallery-item h-100">

                    <img src={{Vite::asset('resources/assets/img/gallery/gallery-2.jpg')}} class="img-fluid" alt="">
                    <div class="gallery-links d-flex align-items-center justify-content-center">
                        <a href="assets/img/gallery/gallery-2.jpg" title="Gallery 2" class="glightbox preview-link"><i class="bi bi-arrows-angle-expand"></i></a>
                        <a href="{{('details')}}" class="details-link"><i class="bi bi-link-45deg"></i></a>
                    </div>
                </div>
            </div><!-- End Gallery Item -->
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="gallery-item h-100">

                    <img src={{Vite::asset('resources/assets/img/gallery/gallery-3.jpg')}} class="img-fluid" alt="">
                    <div class="gallery-links d-flex align-items-center justify-content-center">
                        <a href="assets/img/gallery/gallery-3.jpg" title="Gallery 3" class="glightbox preview-link"><i class="bi bi-arrows-angle-expand"></i></a>
                        <a href="{{('details')}}" class="details-link"><i class="bi bi-link-45deg"></i></a>
                    </div>
                </div>
            </div><!-- End Gallery Item -->
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="gallery-item h-100">
                    <img src={{Vite::asset('resources/assets/img/gallery/gallery-4.jpg')}} class="img-fluid" alt="">
                    <div class="gallery-links d-flex align-items-center justify-content-center">
                        <a href="assets/img/gallery/gallery-4.jpg" title="Gallery 4" class="glightbox preview-link"><i class="bi bi-arrows-angle-expand"></i></a>
                        <a href="{{('details')}}" class="details-link"><i class="bi bi-link-45deg"></i></a>
                    </div>
                </div>
            </div><!-- End Gallery Item -->
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="gallery-item h-100">
                    <img src={{Vite::asset('resources/assets/img/gallery/gallery-5.jpg')}} class="img-fluid" alt="">
                    <div class="gallery-links d-flex align-items-center justify-content-center">
                        <a href="assets/img/gallery/gallery-5.jpg" title="Gallery 5" class="glightbox preview-link"><i class="bi bi-arrows-angle-expand"></i></a>
                        <a href="{{('details')}}" class="details-link"><i class="bi bi-link-45deg"></i></a>
                    </div>
                </div>
            </div><!-- End Gallery Item -->
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="gallery-item h-100">
                    <img src={{Vite::asset('resources/assets/img/gallery/gallery-6.jpg')}} class="img-fluid" alt="">
                    <div class="gallery-links d-flex align-items-center justify-content-center">
                        <a href="assets/img/gallery/gallery-6.jpg" title="Gallery 6" class="glightbox preview-link"><i class="bi bi-arrows-angle-expand"></i></a>
                        <a href="{{('details')}}" class="details-link"><i class="bi bi-link-45deg"></i></a>
                    </div>
                </div>
            </div><!-- End Gallery Item -->
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="gallery-item h-100">
                    <img src={{Vite::asset('resources/assets/img/gallery/gallery-7/.jpg')}} class="img-fluid" alt="">
                    <div class="gallery-links d-flex align-items-center justify-content-center">
                        <a href="assets/img/gallery/gallery-7.jpg" title="Gallery 7" class="glightbox preview-link"><i class="bi bi-arrows-angle-expand"></i></a>
                        <a href="{{('details')}}" class="details-link"><i class="bi bi-link-45deg"></i></a>
                    </div>
                </div>
            </div><!-- End Gallery Item -->
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="gallery-item h-100">
                    <img src={{Vite::asset('resources/assets/img/gallery/gallery-8.jpg')}} class="img-fluid" alt="">
                    <div class="gallery-links d-flex align-items-center justify-content-center">
                        <a href="assets/img/gallery/gallery-8.jpg" title="Gallery 8" class="glightbox preview-link"><i class="bi bi-arrows-angle-expand"></i></a>
                        <a href="{{('details')}}" class="details-link"><i class="bi bi-link-45deg"></i></a>
                    </div>
                </div>
            </div><!-- End Gallery Item -->
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="gallery-item h-100">
                    <img src={{Vite::asset('resources/assets/img/gallery/gallery-9.jpg')}} class="img-fluid" alt="">
                    <div class="gallery-links d-flex align-items-center justify-content-center">
                        <a href="assets/img/gallery/gallery-9.jpg" title="Gallery 9" class="glightbox preview-link"><i class="bi bi-arrows-angle-expand"></i></a>
                        <a href="{{('details')}}" class="details-link"><i class="bi bi-link-45deg"></i></a>
                    </div>
                </div>
            </div><!-- End Gallery Item -->
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="gallery-item h-100">
                    <img src={{Vite::asset('resources/assets/img/gallery/gallery-10.jpg')}} class="img-fluid" alt="">
                    <div class="gallery-links d-flex align-items-center justify-content-center">
                        <a href="assets/img/gallery/gallery-10.jpg" title="Gallery 10" class="glightbox preview-link"><i class="bi bi-arrows-angle-expand"></i></a>
                        <a href="{{('details')}}" class="details-link"><i class="bi bi-link-45deg"></i></a>
                    </div>
                </div>
            </div><!-- End Gallery Item -->
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="gallery-item h-100">
                    <img src={{Vite::asset('resources/assets/img/gallery/gallery-11.jpg')}} class="img-fluid" alt="">
                    <div class="gallery-links d-flex align-items-center justify-content-center">
                        <a href="assets/img/gallery/gallery-11.jpg" title="Gallery 11" class="glightbox preview-link"><i class="bi bi-arrows-angle-expand"></i></a>
                        <a href="{{('details')}}" class="details-link"><i class="bi bi-link-45deg"></i></a>
                    </div>
                </div>
            </div><!-- End Gallery Item -->
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="gallery-item h-100">
                    <img src={{Vite::asset('resources/assets/img/gallery/gallery-12.jpg')}} class="img-fluid" alt="">
                    <div class="gallery-links d-flex align-items-center justify-content-center">
                        <a href="assets/img/gallery/gallery-12.jpg" title="Gallery 12" class="glightbox preview-link"><i class="bi bi-arrows-angle-expand"></i></a>
                        <a href="{{('details')}}" class="details-link"><i class="bi bi-link-45deg"></i></a>
                    </div>
                </div>
            </div><!-- End Gallery Item -->
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="gallery-item h-100">
                    <img src={{Vite::asset('resources/assets/img/gallery/gallery-13.jpg')}} class="img-fluid" alt="">
                    <div class="gallery-links d-flex align-items-center justify-content-center">
                        <a href="assets/img/gallery/gallery-13.jpg" title="Gallery 13" class="glightbox preview-link"><i class="bi bi-arrows-angle-expand"></i></a>
                        <a href="{{('details')}}" class="details-link"><i class="bi bi-link-45deg"></i></a>
                    </div>
                </div>
            </div><!-- End Gallery Item -->
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="gallery-item h-100">
                    <img src={{Vite::asset('resources/assets/img/gallery/gallery-14.jpg')}} class="img-fluid" alt="">
                    <div class="gallery-links d-flex align-items-center justify-content-center">
                        <a href="assets/img/gallery/gallery-14.jpg" title="Gallery 14" class="glightbox preview-link"><i class="bi bi-arrows-angle-expand"></i></a>
                        <a href="{{('details')}}" class="details-link"><i class="bi bi-link-45deg"></i></a>
                    </div>
                </div>
            </div><!-- End Gallery Item -->
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="gallery-item h-100">
                    <img src={{Vite::asset('resources/assets/img/gallery/gallery-15.jpg')}} class="img-fluid" alt="">
                    <div class="gallery-links d-flex align-items-center justify-content-center">
                        <a href="assets/img/gallery/gallery-15.jpg" title="Gallery 15" class="glightbox preview-link"><i class="bi bi-arrows-angle-expand"></i></a>
                        <a href="{{('details')}}" class="details-link"><i class="bi bi-link-45deg"></i></a>
                    </div>
                </div>
            </div><!-- End Gallery Item -->
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="gallery-item h-100">
                    <img src={{Vite::asset('resources/assets/img/gallery/gallery-16.jpg')}} class="img-fluid" alt="">
                    <div class="gallery-links d-flex align-items-center justify-content-center">
                        <a href="assets/img/gallery/gallery-16.jpg" title="Gallery 16" class="glightbox preview-link"><i class="bi bi-arrows-angle-expand"></i></a>
                        <a href="{{('details')}}" class="details-link"><i class="bi bi-link-45deg"></i></a>
                    </div>
                </div>
            </div><!-- End Gallery Item -->

        </div>

    </div>
</section><!-- End Gallery Section -->

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
