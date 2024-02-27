@extends('adminlte::page')

@section('title', 'Employees')

@section('content_header')
    <h1>Employees</h1>
@stop

@section('content')
    <p>Upload Employee.</p>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            
                                
                                @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                @if(session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif

                            <table>
                                
                                <tr>
                                    <form action="{{ route('employees.upload') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                            
                                        <!-- Select MDA Dropdown -->
                                        <div class="form-group">
                                            <label for="mda">Select MDA</label>
                                            
                                            <select name="mda" class="form-control" required>
                                                <option value="" disabled selected>Select MDA</option>
                                                @foreach($mdas as $mda)
                                                    <option value="{{ $mda->id }}">{{ $mda->name }}({{$mda->mda_alias}})</option>
                                                @endforeach
                                            </select>
                                        </div>
                            
                                        <!-- Upload File Input -->
                                        <div class="form-group">
                                            <label for="file">Select Excel File</label>
                                            <small><a href="{{asset('/template/sample.xlsx')}}">Click to download template</a></small>
                                            <input type="file" accept=".csv, .xls, .xlsx" name="file" class="form-control-file" required>
                                        </div>
                            
                                        <!-- File Preview (Optional) -->
                                        <!-- Add a JavaScript-based preview if needed -->
                            
                                        <!-- Submit Button -->
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Finish Upload</button>
                                        </div>
                                    </form>
                                </tr>
                            </table>
                            
                            
                        </h3>
                    </div>
                    
                    <div class="card">
                        
                        <div class="card-body">
  
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