@extends('adminlte::page')

@section('title', 'Manage MDA')

@section('content_header')
    <h1>Ministries, Department and Agancies (MDA)</h1>
@stop

@section('content')
    <p>Manage MDA</p>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            
                            <table>
                                <tr>
                                    <td><a class="btn btn-success text-right" href="{{ route('mda.create') }}"> Create New MDA</a></td>
                                </tr>
                            </table>
                            
                            
                        </h3>
                    </div>
                    
                    <div class="card">
                    <div class="card-body">
  
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>MDA ID</th>
                                    <th>Name</th>
                                    <th>MDA Alias</th>
                                    <th>MDA Level</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($mdas as $mda)
                                    <tr>
                                        <td>{{ $mda->id }}</td>
                                        <td>{{ $mda->name }}</td>
                                        <td>{{ $mda->mda_alias }}</td>
                                        <td>{{ $mda->mda_level }}</td>
                                        <td>{{ $mda->mda_category }}</td>
                                        {{-- <td> --}}

                                            {{-- <a href="{{ route('mda.show', $mda->id) }}">View</a> --}}
                                            {{-- <a href="{{ route('mda.edit', $mda->id) }}">Edit</a> --}}
                                            
                                        {{-- </td> --}}
                                        <td>
                                            <a href="{{ route('mda.show', $mda->id) }}">
                                            <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                                <i class="fa fa-lg fa-fw fa-pen"></i>
                                            </button>
                                            </a>
                                                                                        
                                            <a href="{{ route('mda.show', $mda->id) }}">   
                                            <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                                                <i class="fa fa-lg fa-fw fa-eye"></i>
                                            </button>
                                            </a>
                                            
                                            <a href="{{ route('mda.show', $mda->id) }}">   
                                                <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                                                    <i class="fa fa-lg fa-fw fa-trash"></i>
                                                </button>
                                            </a>
                                           
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
    </div>
@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    $(document).ready(function() {
        $('#scsc').DataTable();
    });
</script>
@stop