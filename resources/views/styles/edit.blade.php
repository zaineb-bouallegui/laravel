@extends('styles.layout')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Edit Style</div>
  <div class="card-body">
       
      <form action="{{ url('style/' .$styles->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$styles->id}}" id="id" />
        <label>name Style</label></br>
        <input type="text" name="nameStyle" id="nameStyle" value="{{$styles->nameStyle}}" class="form-control"></br>
        <label>Periode</label></br>
        <input type="text" name="periode" id="periode" value="{{$styles->periode}}" class="form-control"></br>
        <label>Artiste</label></br>
        <input type="text" name="artiste" id="artiste" value="{{$styles->artiste}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
    
  </div>
</div>
  
@stop