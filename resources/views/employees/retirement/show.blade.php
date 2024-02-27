@extends('adminlte::page')

@section('title', 'View Retirees')

@section('content_header')
    <h1>{{$selectedMda->name ?? 'ALL MDA'}}</h1>
@stop

@section('content')
    <p>{{$subTitle}}</p>
    <div class="card-header">
        <h3 class="card-title">
            <a class="btn btn-success text-right" href="{{ route('retirement.show') }}/{{$selectedMda->id ?? ''}}"> Back</a>
        </h3>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{-- TO-DO: Use tablecdn to export tables --}}
                            
                        </h3>
                    </div>
                    
                    <div class="card">
                    <div class="card-body">
  
                    <div class="table-responsive">
                        @if($retirees->isEmpty())
                            <p>No retiree available.</p>
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
                                        <th>Rank</th>
                                        <th>DOFA</th>
                                        <th>DOB</th>
                                        <th>More</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($retirees as $retiree)
                                        <tr>
                                            <td>{{ $retiree->staff_id }}</td>
                                            <td>{{ $retiree->first_name }}</td>
                                            <td>{{ $retiree->last_name }}</td>
                                            <td>{{ $retiree->gender }}</td>
                                            <td>{{ $retiree->state }}</td>
                                            <td>{{ optional($retiree->mda)->mda_name }}</td>
                                            <td>{{ $retiree->current_rank }}</td>
                                            <td>{{ $retiree->first_appointment_date }}</td>
                                            <td>{{ $retiree->dob }}</td>
                                            <td>
                                              <a href="{{ url(route('uploads.create', ['employee' => $retiree->id])) }}">View</a>                                            
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