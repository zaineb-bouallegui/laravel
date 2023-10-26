@extends('arts.layout')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Edit Art</div>
  <div class="card-body">
       
      <form action="{{ url('art/' .$arts->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$arts->id}}" id="id" />
        <label>Name</label></br>
        <input type="text" name="name" id="name" value="{{$arts->name}}" class="form-control"></br>
        <label>Description</label></br>
        <input type="text" name="description" id="description" value="{{$arts->description}}" class="form-control"></br>
        <label>Image</label></br>
        <input type="file" name="image" id="image" value="{{$arts->image}}" class="form-control"></br>
        <div class="input-group input-group-outline my-3">
    <label class="form-label">Style</label>
    <select id="style_id" name="style_id" class="form-control">
        <option value="">Style</option>
        @foreach ($styles as $style)
            <option value="{{ $style->id }}">{{ $style->nameStyle }}</option>
        @endforeach
    </select>
</div>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
    
  </div>
</div>
  
@stop