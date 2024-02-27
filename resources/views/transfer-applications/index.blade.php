@extends('adminlte::page')

@section('title', 'Transfer Applications')

@section('content_header')
    <h1>Applications for Transfer</h1>
@stop

@section('content')
    <p>Manage Transfer.</p>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-edit"></i>
                            <table>
                                <tr>
                                    <td><a class="btn btn-success text-right" href="{{ url('transfer-applications/create') }}"> Create New Transfer</a></td>
                                </tr>
                                <tr>
                                    <td>Search Employee (s): </td>
                                    <td>
                                    <select class="custom-select form-control" name="" required>
                                        <option selected>Select MDA</option>
                                            <option value=""> BICT </option>
                                        </select>
                                    </td>
                                    <td><input type="text" placeholder="Staff ID" name="" class="form-control"></td>
                                    <td><button type="submit" name="search" class="btn btn-success form-control">Search</button></td>
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
                                    <th>SN</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Organization</th>
                                    <th>Department</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>Muhammad Bello</td>
                                <td>mby@gmail.com</td>
                                <td>07036896412</td>
                                <td>Ministry </td>
                                <td>Department</td>
                                <td>
                                    <a href="#">
                                    <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                        <i class="fa fa-lg fa-fw fa-pen"></i>
                                    </button>
                                    </a>
                                                                                
                                    <a href="#">   
                                    <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                                        <i class="fa fa-lg fa-fw fa-eye"></i>
                                    </button>
                                    </a>
                                    
                                    <form action="#" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                                            <i class="fa fa-lg fa-fw fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
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
    <script> console.log('Hi!'); </script>
@stop