@extends('arts.layout')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Arts Page</div>
  <div class="card-body">
        <div class="card-body">
        <div class="chart">
              <img src="{{ asset('images/' . $arts->image) }}" alt="{{ $arts->nom }}" class="img-fluid rounded" style="max-width: 100%;">
            </div>
        <h5 class="card-title">Name : {{ $arts->name }}</h5>
        <p class="card-text">Description : {{ $arts->description }}</p>
        
        <p class="text-sm mb-0">Style: {{ $arts->style->nameStyle }}</p>
  </div>
    </hr>
  </div>
</div>