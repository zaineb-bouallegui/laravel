@extends('styles.layout')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Styles Page</div>
  <div class="card-body">
        <div class="card-body">
        <h5 class="card-title">name Style : {{ $styles->nameStyle }}</h5>
        <p class="card-text">Periode : {{ $styles->periode }}</p>
        <p class="card-text">Image : {{ $styles->artiste }}</p>
  </div>
    </hr>
  </div>
</div>