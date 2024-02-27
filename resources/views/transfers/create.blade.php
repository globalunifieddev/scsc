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
                @include('employees.employee-details')

    {{-- employee documents --}}
    <hr>
    <h1 class="text-center">EMPLOYEE TRANSFERS</h1>
    @if($transfers->isEmpty())
      <p class="text-center alert alert-warning">No transfer history available for this employee.</p>
    @else
        <div class="row">
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
                    @foreach($transfers as $transfer)
                        <tr>
                            <td>{{$transfer->application_date}}</td>
                            <td>{{$transfer->transfer_date}}</td>
                            <td>{{$transfer->from_MDA}}</td>
                            <td>{{$transfer->to_MDA}}</td>
                            <td>{{$transfer->present_appointment}}</td>
                            <td>{{$transfer->status}}</td>
                            <td><a href="{{ url(route('transfers.manage', ['transfer-id' => $transfer->id])) }}">View more</a></td
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
        <h2 class="text-center">ADD TRANSFER</h2>
    <form method="post" action="{{ route('transfers.store') }}" >
        @csrf
        <div class="row">

            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>{{ __('Present Appointment') }}:</strong>
                    <input type="text" name="present_appointment" placeholder="{{ __('Current Rank') }}" class="form-control" value="{{ $employee->current_rank}}" required>
                </div>
            </div>


            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>{{ __('Employee MDA') }}:</strong>
                    <select name="from_MDA" class="form-control" required>
                        <option value="{{$employee->mda}}">{{$employee->name}}</option>
                        @foreach($mdas as $mdaId => $mdaName)
                            <option value="{{ $mdaId }}">{{ $mdaName }}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>{{ __('Transfer MDA') }}:</strong>
                    <select name="to_MDA" class="form-control" required>
                        <option value="" disabled selected>{{ __('Select MDA') }}</option>
                        @foreach($mdas as $mdaId => $mdaName)
                            <option value="{{ $mdaId }}">{{ $mdaName }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Present GL/Salary:</strong>
                    <input type="text" name="present_gl_salary" placeholder="Present GL/Salary" class="form-control" required>
                </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>{{ __('Education Qualification') }}:</strong>
                    <select name="education_qualification" class="form-control" required>
                        <option value="{{$employee->highest_qualification}}">{{$employee->highest_qualification}}</option>
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
                    <strong>Last promotion:</strong>
                    <input type="date" name="last_promotion" value="{{$employee->last_promotion_date}}" class="form-control" required>
                </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Transfer application date:</strong>
                    <input type="date" name="application_date" class="form-control" required>
                    {{-- TO-DO: default to current date but editable --}}
                </div>
            </div>


            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Gazette/Notice (if any):</strong>
                    <input type="text" name="gazette_or_notice" placeholder="Gazette" class="form-control">
                    <input type="hidden" value="{{$employee->id}}" name="employee_id">
                </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Comment (if any):</strong>
                    <textarea name="comment" placeholder="comment" class="form-control"></textarea>
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
@stop

@section('js')
    <script src="/js/lga.min.js"></script>
@stop
