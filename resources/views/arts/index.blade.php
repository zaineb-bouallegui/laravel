@extends('arts.layout')
@section('content')
    <div class="container">
        <div class="row" style="margin:20px;">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Art & Culture</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/art/create') }}" class="btn btn-success btn-sm" title="Ajouter une piece ">
                            Add New
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th>#</th>
                                        <th>name</th>
                                        <th>description</th>
                                        <th>image</th>
                                        <th>Style</th>
                                        
                                        
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($arts as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td><div class="chart">
              <img src="{{ asset('images/' . $item->image) }}" alt="{{ $item->nom }}" class="img-fluid rounded" style="max-width: 100%;">
            </div></td>
            <td>{{ $item->style->nameStyle }}</td>
                                        
                                        
  
                                        <td>
                                            <a href="{{ url('/art/' . $item->id) }}" title="View Event"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/art/' . $item->id . '/edit') }}" title="Edit Art"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
  
                                            <form method="POST" action="{{ url('/art' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Art" onclick="return confirm("Confirm delete?")"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
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
    </div>
@endsection

