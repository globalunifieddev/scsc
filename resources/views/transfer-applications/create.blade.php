@extends('adminlte::page')

@section('title', 'Transfer')

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
                    <div style="text-align: center;">
                        <img src="/vendor/adminlte/dist/img/ns.png" style="width: 200px; height: auto;" alt="Logo">
                        <h4 style="color:#006029;">NASARAWA STATE CIVIL SERVICE COMMISSION</h4>
                        <h5>APPLICATION FOR TRANSFER OF SERVICE</h5>
                        <div class="rounded-rectangle">
                            <p>CSC Form 17</p>
                        </div>
                        <div class="">
                            <p>Part i <br> To be completed by Applicant</p>
                        </div>
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

            <form method="post" action="{{ route('users.store') }}" >
                @csrf
                <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <strong>First Name:</strong>
                            <input type="text" name="first_name" placeholder="First Name" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <strong>Middle Name:</strong>
                            <input type="text" name="last_name" placeholder="Middle Name" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <strong>Last Name:</strong>
                            <input type="text" name="sur_name" placeholder="Surname" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <strong>Staff ID:</strong>
                            <input type="text" name="staff_id" placeholder="Enter staff ID" class="form-control" required>
                        </div>
                    </div>
                    
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <strong>Present Appointment:</strong>
                            <input type="text" name="present_app" placeholder="Present Appointment" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <strong>Email:</strong>
                            <input type="email" name="email" placeholder="Email" class="form-control" required>
                        </div>
                    </div>
                    
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <strong>MDA:</strong>
                            <select class="custom-select custom-select-md mb-3" name="location_id" required>
                            <option selected>Select MDA</option>
                            
                                <option value=""> BICT </option>
                            
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <strong>Present GL/Salary:</strong>
                            <input type="text" name="gl" placeholder="Present GL/Salary" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <strong>Education Qualification:</strong>
                            <input type="text" name="qualification" placeholder="Education Qualification" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <strong>Date of Appointment:</strong>
                            <input type="date" name="date_of_appointment" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <strong>Last promotion:</strong>
                            <input type="date" name="last_promotion" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <strong>Gazette/Notice (if any):</strong>
                            <input type="text" name="gazette" palceholder="Gazette" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
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
    <style>
    .rounded-rectangle {
    background-color: #006029;
    border-radius: 10px;
    padding: 5px;
    width: 150px;
    margin: 0 auto;
    }

    .rounded-rectangle p {
        margin: 0;
        font-size: 14px;
        color: white;
    }

    </style>
@stop

@section('js')
    <script src="/js/lga.min.js"></script>
@stop