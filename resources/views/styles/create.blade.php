@extends('styles.layout')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Create New Style</div>
  <div class="card-body">
       
      <form action="{{ url('style') }}" method="post">
        {!! csrf_field() !!}
        <label>nameStyle</label></br>
        <input type="text" name="nameStyle" id="nameStyle" class="form-control"></br>
        <label>Periode</label></br>
        <input type="text" name="periode" id="periode" class="form-control"></br>
        <label>artiste</label></br>
        <input type="text" name="artiste" id="artiste" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
    
  </div>
</div>
  
@stop