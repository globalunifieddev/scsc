@extends('adminlte::page')

@section('title', 'Employees')
@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3> {{$employeeCount}}</h3>
                    <p>All Employees</p>
                    <br>
                </div>
            </div>
        </div>
    
        <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3> {{count($employees)}}</h3>
                    <p>Employees {{ isset($selectedMda->name) ? ' in ' . $selectedMda->name : ' currently displayed' }}</p>
                </div>
        </div>
    </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="h3 text-center">{{$selectedMda->name ?? 'ALL EMPLOYEES'}}</div>
            <div class="float-right m-2">
                <form action="">
                    <select id="mdaSelect" name="mda" class="form-control" required>
                        <option value="" disabled selected>{{ __('--Filter by MDA--') }}</option>
                        <option value="">All</option>
                        @foreach($mdas as $mdaId => $mdaName)
                            <option value="{{ $mdaId }}">{{ $mdaName }}</option>
                        @endforeach
                    </select>
                </form>
            </div>
        </div>

        

    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="h3 text-center">Employees</div>
            <div class="table-responsive">
              <table id="scsc" class="table table-sm">
                <thead>
                    <tr>
                        <th>Staff ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>File Number</th>
                        <th>DOB</th>
                        <th>Gender</th>
                        <th>State/LGA</th>
                        <th>First Appointment Date</th>
                        <th>Current Rank</th>
                        <th>More</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <td>{{ $employee->staff_id }}</td>
                            <td>{{ $employee->first_name }}</td>
                            <td>{{ $employee->last_name }}</td>
                            <td>{{ $employee->file_number }}</td>
                            <td>{{ $employee->dob }}</td>
                            <td>{{ $employee->gender }}</td>
                            <td>{{ $employee->state_lga }}</td>
                            <td>{{ $employee->first_appointment_date }}</td>
                            <td>{{ $employee->current_rank }}</td>
                            <td>
                                <a href="{{ url(route('uploads.create', ['employee' => $employee->id])) }}">View</a>                                            
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('mdaSelect').addEventListener('change', function () {
        var selectedValue = this.value;
        var currentUrl = "{{ route('employees-export.show') }}";
        var newUrl = currentUrl.split('?')[0] + '/' + selectedValue;
        window.location.href = newUrl;
    });
</script>

@section('plugins.Chartjs', true)

@endsection

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