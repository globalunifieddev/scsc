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
                            <p><i class="fas fa-tag"></i>All Employees <br>
                                {{$allEmployeesCount}}
                            </p>
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
                            <p><i class="fas fa-tag"></i>Active Employees <br>
                                {{$activeEmployeesCount}}
                            </p>
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
                            <p><i class="fas fa-tag"></i>Retired employees <br>
                                {{$retiredEmployeesCount}}
                            </p>
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
                            <p><i class="fas fa-tag"></i>Employees on probation<br>
                                {{$probationEmployeesCount}}
                            </p>
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
                            <p><i class="fas fa-tag"></i>Male employees (active) <br>
                                {{$activeMaleEmployeesCount}}
                            </p>
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
                            <p><i class="fas fa-tag"></i>Female employees (active) <br>
                                {{$activeFemaleEmployeesCount}}
                            </p>
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
                            <p><i class="fas fa-tag"></i>Total MDA <br>
                                {{$mdaCount}}
                            </p>
                        </div>

                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>


            </div>
            <!-- /.row -->

            <!--div class="card bg-gradient-info">
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
        </div-->
        <!-- /.container-fluid -->
    </section>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')

@stop
