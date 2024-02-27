@extends('adminlte::page')

@section('title', 'Employee')

@section('content')
<script type="text/javascript" src={{asset("js/state.js")}}></script>
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

    <form method="post" action="{{ route('employees.store') }}" >
        @csrf
        <div class="row"><div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>{{ __('Staff ID') }}:</strong>
                <input type="text" name="staff_id" placeholder="{{ __('Staff id') }}" class="form-control" required>
            </div>
        </div>

        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>{{ __('First Name') }}:</strong>
                <input type="text" name="first_name" placeholder="{{ __('First Name') }}" class="form-control" required>
            </div>
        </div>
        
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>{{ __('Last Name') }}:</strong>
                <input type="text" name="last_name" placeholder="{{ __('Last Name') }}" class="form-control" required>
            </div>
        </div>
        
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>{{ __('File Number') }}:</strong>
                <input type="text" name="file_number" placeholder="{{ __('File Number') }}" class="form-control" required>
            </div>
        </div>
        
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>{{ __('Date of Birth') }}:</strong>
                <input type="date" name="dob" class="form-control" required>
            </div>
        </div>
        
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>{{ __('Gender') }}:</strong>
                <select name="gender" class="form-control" required>
                    <option value="male">{{ __('Male') }}</option>
                    <option value="female">{{ __('Female') }}</option>
                </select>
            </div>
        </div>

        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>{{ __('State') }}:</strong>
                <select name="state" class="form-control"  onchange="print_state('state',this.selectedIndex);" id="country" required>
                </select>
            </div>
        </div>
        
        
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>{{ __('Local Government Area') }}:</strong>
                <select  id="state"  name="lga"  class="form-control" required></select>
                <script language="javascript">
                    print_country("country");
                </script>
            </div>
        </div>
        
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>{{ __('MDA') }}:</strong>
                <select name="mda" class="form-control" required>
                    <option value="" disabled selected>{{ __('Select MDA') }}</option>
                    @foreach($mdas as $mdaId => $mdaName)
                        <option value="{{ $mdaId }}">{{ $mdaName }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
        
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>{{ __('Highest Qualification') }}:</strong>
                <select name="highest_qualification" class="form-control" required>
                    <option value="" disabled selected>{{ __('Select Qualification') }}</option>
                    <option value="Informal Education">{{ __('Informal Education') }}</option>
                    <option value="First School Leaving Certificate (FSLC)">{{ __('First School Leaving Certificate (FSLC)') }}</option>
                    <option value="Secondary School Certificate (SSCE)">{{ __('Secondary School Certificate (SSCE)') }}</option>
                    <option value="National Diploma (ND)">{{ __('National Diploma (ND)') }}</option>
                    <option value="Higher National Diploma (HND)">{{ __('Higher National Diploma (HND)') }}</option>
                    <option value="Bachelor's Degree (BSc/BA)">{{ __("Bachelor's Degree (BSc/BA)") }}</option>
                    <option value="Master's Degree (MSc/MA)">{{ __("Master's Degree (MSc/MA)") }}</option>
                    <option value="Doctorate (PhD)">{{ __('Doctorate (PhD)') }}</option>
                </select>
            </div>
        </div>
        
        
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>{{ __('Current Status') }}:</strong>
                <select name="status" class="form-control" required>
                    <option value="Active">Active</option>
                    <option value="Probation">Probation</option>
                    <option value="Retired">Retired</option>
                </select>
            </div>
        </div> 

        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>{{ __('Date of First Appointment') }}:</strong>
                <input type="date" name="first_appointment_date" class="form-control" required>
            </div>
        </div>
        
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>{{ __('Current Rank') }}:</strong>
                <input type="text" name="current_rank" placeholder="{{ __('Current Rank') }}" class="form-control" required>
            </div>
        </div>
        
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>{{ __('Date of Last Promotion') }}:</strong>
                <input type="date" name="last_promotion_date" class="form-control" required>
            </div>
        </div>
        

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">Create</button>
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
<script type="text/javascript" src="/js/state.js"></script>
@stop

@section('js')
    <script src="/js/lga.min.js"></script>
@stop