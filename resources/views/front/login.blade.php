<!DOCTYPE html>
<html lang="en">

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
                    <h2>Login</h2>
                    <p>Don't have an account ? <a href="{{'register'}}">Click here</a></p>

                </div>
            </div>
        </div>
    </div><!-- End Page Header -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">


            <div class="row justify-content-center mt-4">

                <div class="col-lg-3">
                    <form action="forms/contact.php" method="post" role="form" class="php-email-form">

                        <div class="row">
                            <div class="col-md-12 form-group">
                                <p>Username:</p>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Username" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <p>Password:</p>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Password" required>
                            </div>
                        </div>
                        <div><br><br><br></div>
                        <div class="text-center"><button type="submit">Login</button></div>
                    </form>
                </div><!-- End Contact Form -->

            </div>

        </div>
    </section><!-- End Contact Section -->

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
