
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png"> -->
  @vite(['resources/assets/img/apple-icon.png'])
  <!-- <link rel="icon" type="image/png" href="../assets/img/favicon.png"> -->
  @vite(['resources/assets/img/favicon.png'])
  <title>
    Material Dashboard 2 by Creative Tim
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
 @vite(['resources/assets/css/nucleo-icons.css'])
 @vite(['resources/assets/css/nucleo-svg.css'])
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <!-- <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" /> -->
  @vite(['resources/assets/css/material-dashboard.css?v=3.1.0'])
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="g-sidenav-show  bg-gray-200">
@include('layouts.layout')

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!--  Navbar -->
    @include('layouts.nav')

    <!-- End Navbar -->
@extends('events.layout')
@section('content')
  
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <a href="{{ url('/indexBack') }}" class="btn btn-dark" title="Ajouter un évenement">
    <span class="text-white text-capitalize ps-3">Voir les participations</span>
</a>
  
</div>
              
              </div>
            
              <div class="card-body px-0 pb-2">
             
  <div class="card-body px-4 pt-4 pb-2">
    <div class="card-text">
        <h6 class="card-title mb-4">Prénom</h6>
        <p class="card-text">{{ $participations->prenom }}</p>
    </div>
    
    <div class="card-text">
        <h6 class="card-title mb-4">Nom</h6>
        <p class="card-text">{{ $participations->nom }}</p>
    </div>
    <div class="card-text">
        <h6 class="card-title mb-4">Evènement</h6>
    @if ($event)
    <p class="card-text" value="{{ $event->id }}">{{ $event->nom }}</p>
@else
    <p class="card-text">Event not found</p>
@endif
</div>
    <div class="card-text">
        <h6 class="card-title mb-4">Status</h6>
        <p class="card-text">{{ $participations->status }}</p>
    </div>
</div>


    </hr>
  </div>
</div>