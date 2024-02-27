@extends('adminlte::page')

@section('title', 'Manage Employees')

@section('content_header')
    <h1>Employees</h1>
@stop

@section('content')
    <p>Manage Employee.</p>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{-- TO-DO: Use tablecdn to export tables --}}
                            <table>
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
                        @if($employees->isEmpty())
                            <p>No employees available.</p>
                        @else
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Staff ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Gender</th>
                                        <th>State</th>
                                        <th>MDA</th>
                                        <th>Current Rank</th>
                                        <th>More</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($employees as $employee)
                                        <tr>
                                            <td>{{ $employee->staff_id }}</td>
                                            <td>{{ $employee->first_name }}</td>
                                            <td>{{ $employee->last_name }}</td>
                                            <td>{{ $employee->gender }}</td>
                                            <td>{{ $employee->state }}</td>
                                            <td>{{ optional($employee->mda)->mda_name }}</td>
                                            <td>{{ $employee->current_rank }}</td>
                                            <td>
                                              <a href="{{ url(route('uploads.create', ['employee' => $employee->id])) }}">View</a>                                            
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif                         
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