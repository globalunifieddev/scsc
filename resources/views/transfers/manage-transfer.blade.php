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
                            <a class="btn btn-success text-right" href="{{ route('transfers.show') }}"> Back</a>
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


                @if(!isset($transfer->employee_id))
                <p class="text-center alert alert-warning">An error occured. Go back and start again</p>
                @else
                  @include('employees.employee-details')
                  <hr>
                  <h3 class="text-center">APPROVE/DENY EMPLOYEE TRANSFER REQUEST</h3>
                  
                  <form 
                    method="post" 
                    action="{{ route('transfers.manage.edit', ['employeeID' => $employee->id, 'transferID'=>$transfer->id, 'toMda'=>$transfer->to_MDA]) }}">
                    @csrf
                    @method('PATCH')

                    <div class="row">
            
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                                <strong>{{ __('Present Appointment') }}:</strong>
                                <input type="text" placeholder="{{ __('Current Rank') }}" class="form-control" value="{{ $employee->current_rank}}" readonly >
                            </div>
                        </div>
            
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                                <strong>{{ __('Transfer MDA') }}:</strong>
                                <input type="text" class="form-control" value="{{ $transfer->to_MDA}}" readonly>
                            </div>
                        </div>
            
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                                <strong>Present GL/Salary:</strong>
                                <input type="text" value="{{$transfer->present_gl_salary}}" class="form-control" readonly>
                            </div>
                        </div>
        
            
            
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                                <strong>Gazette/Notice (if any):</strong>
                                <input type="text" value="{{$transfer->gazette_or_notice}}" placeholder="Gazette" class="form-control" readonly>
                            </div>
                        </div>
            
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                                <strong>Comment (if any):</strong>
                                <textarea name="comment" placeholder="comment" class="form-control">{{$transfer->comment}}</textarea>
                            </div>
                        </div>

                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                                <label for="action">Action:</label>
                                <select name="action" id="action" class="form-control" required>
                                    <option value="">--Select action to take --</option>
                                    <option value="Approve">Approve</option>
                                    <option value="Deny">Deny</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                                <p>
                                I confirm to proceed:
                                <input title="Accept to proceed with action" type="checkbox" id="confirm" class="input-" required/>
                                </p>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>

                @endif

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
