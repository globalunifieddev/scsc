@extends('adminlte::page')

@section('title', 'Employee')

@section('content_header')
    <h4>Employee</h4>
@stop

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-edit"></i>
                            
                        </h3>
                    </div>
                    
                    <div class="card">
                    <div class="card-body">
                    
            <div class="modal-body">
            <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">Employee Details</h4>
                            <a class="close" href=""> 
                                <span aria-hidden="true">&times;</span>
                            </a>
                            </div>
                            <div class="modal-body">

                            <div class="container mt-5">
                                <div class="card">
                                <img src="" class="card-img-top zoomable" data-zoom-src="" alt="User Image">
                                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Full Name</th>
                                    <td>Muhammad Bello Yahaya</td>
                                </tr>
                                <tr>
                                    <th>Staff ID</th>
                                    <td>003323</td>
                                </tr>
                               
                                <tr>
                                    <th>Email</th>
                                    <td>mby@gmail.com</td>
                                </tr>
                                
                                <tr>
                                    <th>MDA</th>
                                    <td>ICT</td>
                                </tr>
                                <tr>
                                    <th>Department</th>
                                    <td>BICT</td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            </div>

            </div>

            </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
 
      <!-- /.modal -->
      <br/><br/>                 
                 
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