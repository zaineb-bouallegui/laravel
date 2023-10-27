<!DOCTYPE html>
<html lang="en">

<head>
@include('layoutsFront.head')
</head>

<body>

@include('layoutsFront.header')


<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex flex-column justify-content-center align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <h2>Découvrez nos <span>Produits Artisanaux</span></h2>
                <p>Découvrez une sélection unique de produits artisanaux, fabriqués avec passion et créativité. Faites l'expérience de l'authenticité dans chaque pièce.</p>
            </div>
        </div>
    </div>
</section><!-- End Hero Section -->

<main id="main">

<!-- ======= Gallery Section ======= -->
<section id="gallery" class="gallery">
    <div class="container-fluid">
        <div class="row gy-4 justify-content-center">
            @foreach($produits as $produit) 
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="gallery-item h-100">
                    <img src="{{ asset('images/' . $produit->image) }}" class="img-fluid" alt="{{ $produit->nom }}">
                    <div class="gallery-links d-flex align-items-center justify-content-center">
                        <a href="{{ asset('images/' . $produit->image) }}" title="{{ $produit->nom }}" class="glightbox preview-link custom-lightbox" ><i class="bi bi-arrows-angle-expand"></i></a>
                        <a href="{{ route('front.produit.details', $produit->id) }}" class="details-link"><i class="bi bi-link-45deg"></i></a>
                    </div>
                </div>
            </div><!-- End Gallery Item -->
            @endforeach
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
