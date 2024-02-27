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
                        <h5>APPLICATION FOR EMPLOYMENT INTO CIVIL SERVICE OF NASARAWA STATE</h5>
                        <div class="rounded-rectangle">
                            <p>CSC (NA) Form 1</p>
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
                <div class="container">
                <div class="row justify-content-center">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img id="profile-image" class="profile-user-img img-fluid img-circle" src="{{ asset('storage/uploads/profile/' ) }}" alt="User profile picture">
                            </div>
                            <label for="profile-picture" class="btn btn-success btn-block">
                                <b>Upload</b>
                                <input type="file" id="profile-picture" name="image" value="" style="display: none;" required>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
  
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
                    <strong>Sex:</strong>
                    <select class="custom-select custom-select-md mb-3" name="sex" required>
                      <option selected>Select Sex</option>
                      
                        <option value="1"> Male </option>
                        <option value="2">Female</option>
                      
                    </select>
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Date of Birth:</strong>
                    <input type="date" name="date_of_birth" class="form-control" required>
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Phone:</strong>
                    <input type="phone" name="phone" placeholder="Phone Number" class="form-control" >
                </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="email" name="email" placeholder="Email" class="form-control" require>
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>State: <b style="color:red;">*</b></strong>
                <select onchange="toggleLGA(this);" name="state" id="state" class="form-control" required >
                <option value=""> Select</option>
                <option value="Abia">Abia</option>
                <option value="Adamawa">Adamawa</option>
                <option value="AkwaIbom">AkwaIbom</option>
                <option value="Anambra">Anambra</option>
                <option value="Bauchi">Bauchi</option>
                <option value="Bayelsa">Bayelsa</option>
                <option value="Benue">Benue</option>
                <option value="Borno">Borno</option>
                <option value="Cross River">Cross River</option>
                <option value="Delta">Delta</option>
                <option value="Ebonyi">Ebonyi</option>
                <option value="Edo">Edo</option>
                <option value="Ekiti">Ekiti</option>
                <option value="Enugu">Enugu</option>
                <option value="FCT">FCT</option>
                <option value="Gombe">Gombe</option>
                <option value="Imo">Imo</option>
                <option value="Jigawa">Jigawa</option>
                <option value="Kaduna">Kaduna</option>
                <option value="Kano">Kano</option>
                <option value="Katsina">Katsina</option>
                <option value="Kebbi">Kebbi</option>
                <option value="Kogi">Kogi</option>
                <option value="Kwara">Kwara</option>
                <option value="Lagos">Lagos</option>
                <option value="Nasarawa">Nasarawa</option>
                <option value="Niger">Niger</option>
                <option value="Ogun">Ogun</option>
                <option value="Ondo">Ondo</option>
                <option value="Osun">Osun</option>
                <option value="Oyo">Oyo</option>
                <option value="Plateau">Plateau</option>
                <option value="Rivers">Rivers</option>
                <option value="Sokoto">Sokoto</option>
                <option value="Taraba">Taraba</option>
                <option value="Yobe">Yobe</option>
                <option value="Zamfara">Zamfara</option>
                </select>
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Local Government: <b style="color:red;">*</b></strong>
                    <select
                    name="lga"
                    id="lga"
                    class="form-control select-lga"
                    
                    required
                    >
                    <option value="">
                        ---Select---
                    </option>
                    </select>
                </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>District/Ward:</strong>
                    <select class="custom-select custom-select-md mb-3" name="ward" required>
                      <option value="">Select District/Ward</option>
                      
                        <option value="1"> Kokona </option>
                      
                    </select>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Home Address: <b style="color:red;">*</b></strong>
                    <textarea autocomplete="on" autofocus name="home_address" rows="3" cols="30" placeholder="Home Address..." class="form-control" required>Address</textarea>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Contact Address: <b style="color:red;">*</b></strong>
                    <textarea autocomplete="on" autofocus name="contact_address" rows="3" cols="30" placeholder="Contact Address..." class="form-control" required>Contact Address</textarea>
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Languages Understand and Spoken well:</strong>
                    <input type="text" name="language" placeholder="Languages Understand and Spoken well " class="form-control" required>
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Physical Challenge or Disability (if any):</strong>
                    <input type="text" name="disability" placeholder="Physical Challenge or Disability (if any) " class="form-control" required>
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Post(s) applying for in order of preference:</strong>
                    <input type="text" name="post" placeholder="Post(s) applying for in order of preference" class="form-control" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>INSTITUTION ATTENDED WITH DATE:</strong>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Institution FSLC:</strong>
                    <input type="text" name="fslc" placeholder="First School leaving certificate" class="form-control" required>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Date:</strong>
                    <input type="date" name="fslc_date" class="form-control" required>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Institution Olevel:</strong>
                    <input type="text" name="olevel" placeholder="SS certificate" class="form-control" required>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Date:</strong>
                    <input type="date" name="olevel_date" class="form-control" required>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Institution Tertiary:</strong>
                    <input type="text" name="tertiary" placeholder="Tertiry institution" class="form-control" required>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Date:</strong>
                    <input type="date" name="tertiary_date" class="form-control" required>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Institution Post Graduate:</strong>
                    <input type="text" name="pg" placeholder="Post graduate" class="form-control">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Date:</strong>
                    <input type="date" name="pg_date" class="form-control" >
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>CERTIFICATE OBTAINED WITH DATE:</strong>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Institution FSLC:</strong>
                    <input type="text" name="fslc_cert" placeholder="First School leaving certificate" class="form-control" required>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Date:</strong>
                    <input type="date" name="fslc_cert_date" class="form-control" required>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Institution Olevel:</strong>
                    <input type="text" name="olevel_cert" placeholder="SS certificate" class="form-control" required>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Date:</strong>
                    <input type="date" name="olevel_cert_date" class="form-control" required>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Institution Tertiary:</strong>
                    <input type="text" name="tertiary_cert" placeholder="Tertiry institution" class="form-control" required>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Date:</strong>
                    <input type="date" name="tertiary_cert_date" class="form-control" required>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Institution Post Graduate:</strong>
                    <input type="text" name="pg_cert" placeholder="Post graduate" class="form-control">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Date:</strong>
                    <input type="date" name="pg_cert_date" class="form-control" >
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Present Employer’s Name, Nature of Employment, Salary:</strong>
                    <input type="text" name="emp_history" placeholder="(give detail of terms of present employment, i.e Contract, Temporary, Pensionable or Bond)" class="form-control">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Have you ever been fined or imprisoned by any Court:</strong>
                    <input type="text" name="emp_history" placeholder="(give detail of terms of present employment, i.e Contract, Temporary, Pensionable or Bond)" class="form-control">
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
    <script src="js/lga.js"></script>
    <script>
    $(document).ready(function() {
        // Listen for changes in the file input
        $('#profile-picture').on('change', function() {
            // Get the selected file
            var file = this.files[0];
            
            if (file) {
                // Create a URL for the selected image
                var imageUrl = URL.createObjectURL(file);
                
                // Display the selected image in the img tag
                $('#profile-image').attr('src', imageUrl);
            }
        });
    });
    </script>
@stop