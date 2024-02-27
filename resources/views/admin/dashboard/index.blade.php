@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="row">
    <div class="col-md-12">
        <img src="vendor/adminlte/dist/img/bread.png" alt="bread" style="max-width:100%; width:100%;heigth: 50px;">
    </div>
</div>
<div style="text-align: center;">
    <span style="font-size: 30px; font-weight: none; text-transform: uppercase; color: #28A745;">
        Super Admin Dashboard
    </span>
</div>
@stop

@section('content')
    <p>Welcome, {{ auth()->user()->first_name .' '.  auth()->user()->sur_name }}.</p>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <!-- small box -->
                    <div class="small-box bg-white">
                        <div class="inner">
                            <p><i class="fas fa-tag"></i>Add Employee <br>
                            this feature let you add a staff to the civil service of the state.</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <!-- small box -->
                    <div class="small-box bg-white">
                        <div class="inner">
                            <p><i class="fas fa-user"></i>Total Number of Civil Servants
                              
                        </p>
                            <div class="counter">123,000</div>
                            
                            As at 1st January, 2024.
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <!-- small box -->
                    <div class="small-box bg-white">
                        <div class="inner">
                            
                            <p><i class="fas fa-list"></i>Due for Retirement</p>
                            <div class="counter" id="totalSomething">3,000</div>
                            as at 1st January, 2024.
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                
            </div>
            <!-- /.row -->

            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <!-- small box -->
                    <div class="small-box bg-white">
                        <div class="inner">
                            <p><i class="fas fa-users"></i>Total Number of Commissioners 
                            </p><br>
                            <div class="counter">123</div>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <!-- small box -->
                    <div class="small-box bg-white">
                        <div class="inner">
                            <p><i class="fas fa-flag"></i>Total Number of Retirees
                              
                        </p>
                            <div class="counter">433</div>
                            
                            As at 1st January, 2024.
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <!-- small box -->
                    <div class="small-box bg-white">
                        <div class="inner">
                            
                            <p><i class="fas fa-trash"></i>Remove Employee
                            this feature let you remove a staff to the civil service of the state
                            </p> 
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                
            </div>
            <!-- /.row -->
            <div class="card bg-gradient-info">
                <div class="card-header border-0">
                    <h3 class="card-title">
                        <i class="fas fa-th mr-1"></i>
                        State Civil Service Growth
                    </h3>
                <div class="card-tools">
                    <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                </div>
                <div class="card-body">
                    <canvas class="chart" id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
        </div>
        <!-- /.container-fluid -->
    </section>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')

@stop
