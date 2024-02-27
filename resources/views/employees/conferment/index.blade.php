@extends('adminlte::page')

@section('title', 'Retirement')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3> {{count($employeesOnProbation)}}</h3>
                    <p>Employees on probabtion</p>
                </div>
                <div class="icon"><i class="ion ion-bag"></i></div><a href="{{route('conferment.category.show')}}?category=probation&mda={{$selectedMda->id ?? ''}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a></div>
        </div>
        <div class="col-lg-6 col-6">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3> {{count($dueForConferment)}}</h3>
                    <p>Due for conferment</p>
                </div>
                <div class="icon"><i class="ion ion-stats-bars"></i></div><a href="{{route('conferment.category.show')}}?category=overdue&mda={{$selectedMda->id ?? ''}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a></div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="h3 text-center">{{$selectedMda->name ?? 'ALL EMPLOYEES ON PROBATION'}}</div>
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

        <div class="col-lg-6 connectedSortable">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-chart-pie mr-1"></i>Gender variation </h3>
                </div>
                
                <div class="card-body">
                    <div class="tab-content p-0">
                        <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"><canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas></div>
                        <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"><canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 connectedSortable">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-chart-pie mr-1"></i>variation based on status</h3>
                </div>
                
                <div class="card-body">
                    <div class="tab-content p-0">
                        <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"><canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas></div>
                        <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"><canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="h3 text-center">EMPLOYEES ON PROBABTION</div>
            <table class="table">
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
                    @foreach ($employeesOnProbation as $employee)
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

<script>
    document.getElementById('mdaSelect').addEventListener('change', function () {
        //probabtion
        //overdue
        
        var selectedValue = this.value;
        var currentUrl = "{{ route('conferment.show') }}";
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
  <script src="/js/lga.min.js"></script>
@stop
