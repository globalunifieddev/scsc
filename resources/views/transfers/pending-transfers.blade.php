@extends('adminlte::page')

@section('title', 'Retirement')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 col-4">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3> {{count($approvedTransfers)}}</h3>
                    <p>Approved Transfers</p>
                </div>
                <div class="icon"><i class="ion ion-bag"></i></div><a href="" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a></div>
        </div>
        <div class="col-lg-4 col-4">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3> {{count($pendingTransfers)}}</h3>
                    <p>Pending Transfers</p>
                </div>
                <div class="icon"><i class="ion ion-stats-bars"></i></div><a href="#" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a></div>
        </div>
        <div class="col-lg-4 col-4">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3> {{count($deniedTransfers)}}</h3>
                    <p>Denied Trasnsfers</p>
                </div>
                <div class="icon"><i class="ion ion-stats-bars"></i></div><a href="#" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a></div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
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
        </div>
        <div class="col-lg-12">
            <div class="h3 text-center">PENDING TRANSFERS</div>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Application date</th>
                        <th>Transfer date</th>
                        <th>Employee MDA</th>
                        <th>Transfer MDA</th>
                        <th>Employee appoitment</th>
                        <th>Transfer status</th>
                        <th>View more</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pendingTransfers as $transfer)
                        <tr>
                            <td>{{$transfer->application_date}}</td>
                            <td>{{$transfer->transfer_date}}</td>
                            <td>{{$transfer->from_MDA}}</td>
                            <td>{{$transfer->to_MDA}}</td>
                            <td>{{$transfer->present_appointment}}</td>
                            <td>{{$transfer->status}}</td>
                            <td><a href="{{ url(route('transfers.manage', ['transfer-id' => $transfer->id])) }}">View more</a></td>
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
