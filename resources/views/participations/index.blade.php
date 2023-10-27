
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
              <!-- <a href="{{ url('/participation/create') }}" class="btn btn-dark" title="Ajouter un évenement">
    <span class="text-white text-capitalize ps-3">Ajouter une participation</span>
</a> -->

               
              </div>
              
            </div>
            <div class="card-body px-0 pb-2">
            <a href="{{ route('participations.export') }}" class="btn btn-primary" title="Export to CSV">
    Export to CSV
</a>
              <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                    <th class="align-middle text-center font-weight-bolder opacity-7">Numéro</th>
                    <th class="align-middle text-center font-weight-bolder opacity-7">Nom participant</th>
                    <th class="align-middle text-center font-weight-bolder opacity-7">Prènom participant</th>
                                    <th class="align-middle text-center font-weight-bolder opacity-7">évenement</th>
                                   
                                    <th class="align-middle text-center font-weight-bolder opacity-7">status</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                               
                                @foreach($participations as $item)
                                    <tr>
                                    <td class="align-middle text-center"> <p class="text-secondary text-xs font-weight-bold">{{ $loop->iteration }}</p>
                                    <td class="align-middle text-center"> <p class="text-secondary text-xs font-weight-bold">{{ $item->nom }}</p></td>
                                <td class="align-middle text-center"> <p class="text-secondary text-xs font-weight-bold">{{ $item->prenom }}</p></td>
                                    @foreach ($events as $event)
                                    @if ($event->id == $item->event_id)
                                        <td class="align-middle text-center"> <p class="text-secondary text-xs font-weight-bold" value="{{ $event->id }}">{{ $event->nom }}</p></td>
                                        @endif
                                        @endforeach
                                        <td class="align-middle text-center"> <p class="text-secondary text-xs font-weight-bold">{{ $item->status }}</p></td>
                                      

                                        <td class="align-middle">
    <a href="{{ url('/participation/' . $item->id) }}" data-original-title="View Participation" class="text font-weight-bold text-xs" data-toggle="tooltip">
        <i class="fa fa-eye" style="font-size: 15px;"></i> <!-- Font Awesome show icon -->
    </a>
</td>
<td class="align-middle">
    <a href="{{ url('/participation/' . $item->id . '/edit') }}" data-original-title="Edit participation" class="text-blue font-weight-bold text-xs" data-toggle="tooltip">
        <i class="fa fa-pencil" style="font-size: 15px;"></i> <!-- Adjust the font-size as needed -->
    </a>
</td>


  
                                            <td class="align-middle"> <form method="POST" action="{{ url('/participation' . '/' . $item->id) }}" accept-charset="UTF-8" data-original-title="Delete Event"class="text-secondary font-weight-bold text-xs"data-toggle="tooltip">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                         

                                                <button type="submit" onclick="return confirm('Confirmer la suppression?')" class="icon-button red-button">
  <i class="fa fa-trash"></i>
</button>
                                            </form>
                                        </td>
                                        
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
  
                    </div>
                </div>
            </div>
        </div>
    </div></div>
@endsection
<style>
  
  .icon-button {
  background: none;
  border: none;
  cursor: pointer;
  font-size: 16px; /* Adjust the size as needed */
  color: #ff0000; /* Adjust the color as needed */
  padding: 0;
  margin: 0;
}
  .text-pink {
        color: pink;
    }

    .text-blue {
        color: green;}
        .btn-custom {
        background-color: #ff5733; /* Custom background color */
        border-radius: 5px; /* Rounded corners */
        padding: 8px 16px; /* Adjust padding */
        color: #fff; /* Text color */
    }
</style>

