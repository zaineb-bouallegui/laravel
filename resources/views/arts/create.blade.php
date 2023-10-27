@extends('arts.layout')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Create New Arts</div>
  <div class="card-body">
       
  <form action="{{ url('art') }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        @error('name')

<div class="alert alert-danger">{{ $message }}</div>

@enderror
        <label>Description</label></br>
        <input type="text" name="description" id="description" class="form-control"></br>
        @error('name')

<div class="alert alert-danger">{{ $message }}</div>

@enderror
        <label>Image</label></br>
        <input type="file" name="image" id="image" class="form-control"></br>
        <div class="input-group input-group-outline my-3">
    <label class="form-label">Style</label>
    <select id="style_id" name="style_id" class="form-control">
        <option value="">Style</option>
        @foreach ($styles as $style)
            <option value="{{ $style->id }}">{{ $style->nameStyle }}</option>
        @endforeach
    </select>
</div>
@error('name')

<div class="alert alert-danger">{{ $message }}</div>

@enderror
<input type="submit" value="Save" class="btn btn-success">
</form>
    
  </div>
</div>
  
@stop