@extends('adminlte::page')

@section('title', 'Add MDA')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-edit"></i>
                            <a class="btn btn-success text-right" href="{{ url('mda') }}"> Back</a>
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

    <form action="{{ route('mda.update', $mda->id) }}" method="post">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Name</strong>
                    <input type="text" name="name" placeholder="Name of MDA" class="form-control" value="{{ $mda->name }}" required>
                </div>
            </div>
            
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Address</strong>
                    <textarea name="address" placeholder="Address" class="form-control">{{ $mda->address }}</textarea>
                </div>
            </div>
            
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Contact phone</strong>
                    <input type="tel" name="phone" placeholder="080xxxx" minlength="11" maxlength="11" class="form-control" value="{{ $mda->phone }}" required>
                </div>
            </div>
            
            
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Contact email</strong>
                    <input type="email" name="email" placeholder="email@mail.com" class="form-control" value="{{ $mda->email }}" required>
                </div>
            </div>
            
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>MDA Alias</strong>
                    <input type="text" name="mda_alias" placeholder="E.g NSCSC" class="form-control" value="{{ $mda->mda_alias }}" required>
                </div>
            </div>
            
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>MDA Level</strong>
                    <select name="mda_level" class="form-control" required>
                        <option value="{{ $mda->mda_level }}">{{ $mda->mda_level === 'SG' ? 'State Government' : ($mda->mda_level === 'FG' ? 'Federal Government' : ($mda->mda_level === 'LG' ? 'Local Government' : 'Other')) }}
                        </option>
                        <option value="FG">Federal Level</option>
                        <option value="SG">State level</option>
                        <option value="LG">Local Government level</option>
                    </select>
                </div>
            </div>
            
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Category</strong>
                    <select name="mda_category" class="form-control" required>
                        <option value="{{ $mda->mda_category }}">{{ $mda->mda_category }}</option>
                        <option value="Ministry">Ministry</option>
                        <option value="Department">Department</option>
                        <option value="Agency">Agency</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                <button type="submit" class="btn btn-success">Update record</button>
            </div>
        </div>
    </form>
    
    <form action="{{ route('mda.destroy', $mda->id) }}" method="post">
        @csrf
        @method('DELETE')
        <div class="col-xs-12 col-sm-12 col-md-12 text-right">
            <button type="submit" class="btn btn-danger">Delete this MDA</button>
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