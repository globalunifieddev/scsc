@extends('adminlte::page')

@section('title', 'Promotion')

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

    
    <hr>
    <h1 class="text-center">EMPLOYEE PROMOTIONS</h1>
    @if($promotions->isEmpty())
      <p class="text-center alert alert-warning">No promotion history for this employee.</p>
    @else
        <div class="row">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Employee ID</th>
                            <th>Promotion Date</th>
                            <th>Previous Rank</th>
                            <th>New Rank</th>
                            {{-- <th>Status</th> --}}
                            {{-- <th>Actions</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($promotions as $promotion)
                            <tr>
                                <td>{{ $promotion->employee_id }}</td>
                                <td>{{ $promotion->promotion_date }}</td>
                                <td>{{ $promotion->previous_rank }}</td>
                                <td>{{ $promotion->new_rank }}</td>
                                <!--td>{{ $promotion->status }}</td-->
                                <!--td>
                                    <a href="#">Edit</a> |
                                    <a href="#">Delete</a>
                                </td-->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
        <h2 class="text-center">ADD EMPLOYEE PROMOTION</h2>
    <form method="post" action="{{ route('promotions.store') }}" >
        @csrf
        <div class="row">            

            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>{{ __('Promotion Date:') }} </strong>
                    <input type="date" name="promotion_date" class="form-control" required>
                </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>{{ __('Previous Rank:') }} </strong>
                    <input type="text" name="previous_rank" placeholder="{{ __('Enter Previous Rank') }}" class="form-control" required>
                </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>{{ __('New Rank:') }} </strong>
                    <input type="text" name="new_rank" placeholder="{{ __('Enter New Rank') }}" class="form-control" required>
                </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>{{ __('Reason for promotion(optional):') }} </strong>
                    <textarea name="reason" placeholder="{{ __('Enter Reason') }}" class="form-control"></textarea>
                </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>{{ __('Comment (optional):') }} </strong>
                    <textarea name="comment" placeholder="{{ __('Enter Comment') }}" class="form-control"></textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <input type="hidden" value="{{$employee->id}}" name="employee_id">
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