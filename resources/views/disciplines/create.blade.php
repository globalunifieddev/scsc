@extends('adminlte::page')

@section('title', 'Disciplinary cases')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-edit"></i>
                            <a class="btn btn-success text-right" href="{{ url('employees') }}"> Back</a>
                        </h3>
                    </div>
                    
                    <div class="card">
                    <div class="card-body">
                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @include('employees.employee-nav')
                @include('employees.employee-details')

    
    <hr>
    <h1 class="text-center">EMPLOYEE DISCIPLINARY CASES</h1>
    @if($disciplines->isEmpty())
      <p class="text-center alert alert-warning">No disciplinary incidents for this employee.</p>
    @else
        <div class="row">
            <div class="table-responsive">
                <table class="table table-sm table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Incident Date</th>
                            <th>Description</th>
                            <th>Status of Incident</th>
                            <th>Reported By</th>
                            <th>Date created</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($disciplines as $discipline)
                            <tr>
                                <td>{{ $discipline->incident_date }}</td>
                                <td>{{ $discipline->description }}</td>
                                <td>{{ $discipline->status_of_incident }}</td>
                                <td>{{ $discipline->reported_by }}</td>
                                <td>{{ $discipline->created_at }}</td>
                                <td><a href="#">View more</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
        <h2 class="text-center">ADD DISCIPLINARY CASE</h2>
    <form method="post" action="{{ route('disciplines.store') }}" >
        @csrf
        <div class="row">            

            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Incident date:</strong>
                    <input type="date" name="incident_date" placeholder="DD/MM/YYYY" class="form-control" required>
                </div>
            </div>
           
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>{{ __('Status of incident') }}:</strong>
                    <select name="status_of_incident" class="form-control" required>
                        <option value="Pending">{{ __('Pending') }}</option>
                        <option value="Dismissed">{{ __('Dismissed') }}</option>
                        <option value="Retired">{{ __('Retired') }}</option>
                        <option value="Terminated">{{ __('Terminated') }}</option>
                        <option value="Demoted">{{ __('Demoted') }}</option>
                        <option value="Suspended">{{ __('Suspended') }}</option>
                        <option value="Rejected">{{ __('Rejected') }}</option>
                        <option value="Other">{{ __('Other') }}</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Reported by:</strong>
                    <input type="text" name="reported_by"  class="form-control">
                </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Discription:</strong>
                    <textarea name="description" placeholder="comment" class="form-control"></textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <input type="hidden" value="{{$employee->id}}" name="employee_id">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>
    
    </div>
    </div>
    </div>

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="/js/lga.min.js"></script>
@stop