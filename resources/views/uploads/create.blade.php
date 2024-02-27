@extends('adminlte::page')

@section('title', 'Uploads')

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
    <h1 class="text-center">EMPLOYEE DOCUMENTS</h1>
    @if($uploads->isEmpty())
      <p class="text-center alert alert-warning">No uploads available for this employee.</p>
    @else
        <div class="row">
            @foreach($uploads as $upload)
                    <div class="col-md-4 border border-sm p-3">
                        @if (strtoupper($upload->file_type) === 'JPEG' || strtoupper($upload->file_type) === 'JPG' || strtoupper($upload->file_type) === 'PNG')
                            <img src="{{ asset('storage/' . $upload->file_name) }}" alt="{{$upload->description}}" title="{{$upload->description}}" style="max-width: 100%;">
                            <p>{{$upload->description}}</p>
                            {{-- TODO: symlink files properly --}}
                        @else
                            <!-- Display a Font Awesome icon based on the document type -->
                            @if ($upload->file_type === 'pdf')
                                <i class="text-danger fas fa-file-pdf fa-4x"></i>
                                <p>{{$upload->description}}</p>
                                <a href="{{ asset('storage/' . $upload->file_name) }}" target="_blank" class="btn btn-sm btn-success">Preview</a>
                            @elseif ($upload->file_type === 'doc' || $upload->file_type === 'docx')
                                <i class="text-primary fas fa-file-word fa-4x"></i>
                                <p>{{$upload->description}}</p>
                                <a href="{{ asset('storage/' . $upload->file_name) }}" target="_blank" class="btn btn-sm btn-success">Preview</a>
                            @elseif ($upload->file_type === 'xls' || $upload->file_type === 'xlsx')
                                <i class="text-success fas fa-file-excel fa-4x"></i>
                                <p>{{$upload->description}}</p>
                                <a href="{{ asset('storage/' . $upload->file_name) }}" target="_blank" class="btn btn-sm btn-success">Preview</a>
                            @else
                                <i class="fas fa-file fa-4x"></i>
                                <p>{{$upload->description}}</p>
                                <a href="{{ asset('storage/' . $upload->file_name) }}" target="_blank" class="btn btn-sm btn-success">Preview</a>
                            @endif
                        @endif
                    </div>
            @endforeach
            </div>
    @endif

    <form action="{{ route('uploads.store', $employee->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row"><div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>{{ __('Document') }}:</strong>
                <input type="file" name="file" placeholder="{{ __('Document') }}" class="form-control" required>
            </div>
        </div>

        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>{{ __('Description') }}:</strong>
                <textarea name="description" class="form-control"></textarea>
            </div>
        </div>

        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>{{ __('Type') }}:</strong>
                <select class="form-control" name="document_type" required>
                    <option value="">--Select type--</option>
                    <option value="Passport">Passport</option>
                    <option value="First School Leaving Certificate (FSLC)">{{ __('First School Leaving Certificate (FSLC)') }}</option>
                    <option value="Secondary School Certificate (SSCE)">{{ __('Secondary School Certificate (SSCE)') }}</option>
                    <option value="National Diploma (ND)">{{ __('National Diploma (ND)') }}</option>
                    <option value="Higher National Diploma (HND)">{{ __('Higher National Diploma (HND)') }}</option>
                    <option value="Bachelor's Degree (BSc/BA)">{{ __("Bachelor's Degree (BSc/BA)") }}</option>
                    <option value="Master's Degree (MSc/MA)">{{ __("Master's Degree (MSc/MA)") }}</option>
                    <option value="Doctorate (PhD)">{{ __('Doctorate (PhD)') }}</option>
                    <option value="Worshop Certificate">Workshop Certificate</option>
                    <option value="Seminar Certificate">Seminar Certificate</option>
                    <option value="Award">Award</option>
                    <option value="Letter of recognition">Letter of recognition</option>
                    <option value="Posting letter">Posting letter</option>
                    <option value="Certificate">Certificate</option>
                    <option value="Other">Other</option>
                </select>
            </div>
        </div>

        <input type="hidden" value="{{$employee->id}}" name="employee_id">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group text-center">
                <button class="btn btn-success" type="submit">Upload</button>
            </div>
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
