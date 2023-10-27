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
                    <h2>Participer à un évènement</h2>
                    <p>Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>

                </div>
            </div>
        </div>
    </div><!-- End Page Header -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">

            <div class="row gy-4 justify-content-center">
               


               

            </div>

            <div class="row justify-content-center mt-4">

                <div class="col-lg-9">
                <form action="{{ url('participation') }}" method="post" role="form" class="php-email-form">
                {!! csrf_field() !!}
    <div class="row">
        <div class="col-md-6 form-group">
            <input type="text" name="nom" class="form-control" id="nom" placeholder="Nom" required>
        </div>
        @error('nom')
        <div class="alert alert-danger" style="width: 20;">{{ $message }}</div>

@enderror
        <div class="col-md-6 form-group mt-3 mt-md-0">
            <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Nom" required>
            @error('prenom')
        <div class="alert alert-danger" style="width: 20;">{{ $message }}</div>
    @enderror
        </div>
    </div>
   
    </div>
    <div class="form-group mt-3">
    <label for="event">Sélectionnez un évènement :</label>
    <select class="form-control" name="event_id" id="event" required>
        <option value="">Choisissez un évènement</option>
        @foreach ($events as $event)
      
            <option value="{{ $event->id }}">{{ $event->nom }}</option>
         
        @endforeach
    </select>
    @error('event_id')
    <div class="alert alert-danger" style="width: 20;">{{ $message }}</div>
    @enderror
    </div>
    
    <div class="text-center">
        <button type="submit"class="btn btn-primary">Participer</button>
    </div>
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



<!-- Template Main JS File -->
@vite(['resources/assets/js/main.js'])

</body>

</html>
