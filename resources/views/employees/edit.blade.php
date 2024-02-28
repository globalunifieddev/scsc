@extends('adminlte::page')

@section('title', 'Edit Employee')

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


    <form method="post" action="{{ route('employees.update', ['employee' => $employee->id]) }}">
        @csrf
        @method('PATCH')

        <div class="row"><div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>{{ __('Staff ID') }}:</strong>
                <input type="text" value="{{ __($employee->staff_id) }}" name="staff_id" placeholder="{{ __('Staff id') }}" class="form-control" required>
            </div>
        </div>

        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>{{ __('First Name') }}:</strong>
                <input type="text" value="{{ __($employee->first_name) }}" name="first_name" placeholder="{{ __('First Name') }}" class="form-control" required>
            </div>
        </div>

        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>{{ __('Last Name') }}:</strong>
                <input type="text" value="{{ __($employee->last_name) }}" name="last_name" placeholder="{{ __('Last Name') }}" class="form-control" required>
            </div>
        </div>

        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>{{ __('File Number') }}:</strong>
                <input type="text" value="{{ __($employee->file_number) }}" name="file_number" placeholder="{{ __('File Number') }}" class="form-control" required>
            </div>
        </div>

        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>{{ __('Date of Birth') }}:</strong>
                <input type="date" value="{{ __($employee->dob) }}" name="dob" class="form-control" required>
            </div>
        </div>

        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>{{ __('Gender') }}:</strong>
                <select value="{{ __($employee->gender) }}" name="gender" class="form-control" required>
                    <option value="male">{{ __('Male') }}</option>
                    <option value="female">{{ __('Female') }}</option>
                </select>
            </div>
        </div>

        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>{{ __('State') }}:</strong>
                <select name="state" class="form-control" required>
                    <option value="{{ __($employee->state) }}">{{ __($employee->state) }}</option>
                    <option value="Adamawa">{{ __('Adamawa') }}</option>
                    <option value="Akwa Ibom">{{ __('Akwa Ibom') }}</option>
                    <option value="Anambra">{{ __('Anambra') }}</option>
                    <option value="Bauchi">{{ __('Bauchi') }}</option>
                    <option value="Bayelsa">{{ __('Bayelsa') }}</option>
                    <option value="Benue">{{ __('Benue') }}</option>
                    <option value="Borno">{{ __('Borno') }}</option>
                    <option value="Cross River">{{ __('Cross River') }}</option>
                    <option value="Delta">{{ __('Delta') }}</option>
                    <option value="Ebonyi">{{ __('Ebonyi') }}</option>
                    <option value="Edo">{{ __('Edo') }}</option>
                    <option value="Ekiti">{{ __('Ekiti') }}</option>
                    <option value="Enugu">{{ __('Enugu') }}</option>
                    <option value="FCT-Abuja">{{ __('FCT-Abuja') }}</option>
                    <option value="Gombe">{{ __('Gombe') }}</option>
                    <option value="Imo">{{ __('Imo') }}</option>
                    <option value="Jigawa">{{ __('Jigawa') }}</option>
                    <option value="Kaduna">{{ __('Kaduna') }}</option>
                    <option value="Kano">{{ __('Kano') }}</option>
                    <option value="Katsina">{{ __('Katsina') }}</option>
                    <option value="Kebbi">{{ __('Kebbi') }}</option>
                    <option value="Kogi">{{ __('Kogi') }}</option>
                    <option value="Kwara">{{ __('Kwara') }}</option>
                    <option value="Lagos">{{ __('Lagos') }}</option>
                    <option value="Nasarawa">{{ __('Nasarawa') }}</option>
                    <option value="Niger">{{ __('Niger') }}</option>
                    <option value="Ogun">{{ __('Ogun') }}</option>
                    <option value="Ondo">{{ __('Ondo') }}</option>
                    <option value="Osun">{{ __('Osun') }}</option>
                    <option value="Oyo">{{ __('Oyo') }}</option>
                    <option value="Plateau">{{ __('Plateau') }}</option>
                    <option value="Rivers">{{ __('Rivers') }}</option>
                    <option value="Sokoto">{{ __('Sokoto') }}</option>
                    <option value="Taraba">{{ __('Taraba') }}</option>
                    <option value="Yobe">{{ __('Yobe') }}</option>
                    <option value="Zamfara">{{ __('Zamfara') }}</option>
                </select>
            </div>
        </div>


        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>{{ __('Local Government Area') }}:</strong>
                <input type="text" value="{{ __($employee->lga) }}" name="lga" value="Lafia" placeholder="{{ __('Local Government Area') }}" class="form-control" required>
            </div>
        </div>

        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>{{ __('MDA') }}:</strong>
                <select name="mda" class="form-control" required>
                    <option value="{{ __($employeeMda->id) }}" >{{ __($employeeMda->name) }}</option>
                    @foreach($mdas as $mda)
                        <option value="{{ $mda->id }}">{{ $mda->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>


        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>{{ __('Highest Qualification') }}:</strong>
                <select name="highest_qualification" class="form-control" required>
                    <option value="{{ __($employee->highest_qualification) }}">{{ __($employee->highest_qualification) }}</option>
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
                    <option value="{{ __($employee->status) }}">{{ __($employee->status) }}</option>
                    <option value="Active">Active</option>
                    <option value="Probation">Probation</option>
                    <option value="Retired">Retired</option>
                    <option value="Deceased">Deceased</option>
                </select>
            </div>
        </div>

        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>{{ __('Date of First Appointment') }}:</strong>
                <input type="date" value="{{ __($employee->first_appointment_date) }}" name="first_appointment_date" class="form-control" required>
            </div>
        </div>

        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>{{ __('Current Rank') }}:</strong>
                <input type="text" value="{{ __($employee->current_rank) }}" name="current_rank" placeholder="{{ __('Current Rank') }}" class="form-control" required>
            </div>
        </div>

        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>{{ __('Date of Last Promotion') }}:</strong>
                <input type="date" value="{{ __($employee->last_promotion_date) }}" name="last_promotion_date" class="form-control" required>
            </div>
        </div>


            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">Edit</button>
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
