@extends('adminlte::page')

@section('title', 'Roles')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-edit"></i>
                            
                        </h3>
                    </div>
                    
                    <div class="card">
                    <div class="card-body">
                    
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
            <h2>Roles & Permission Update</h2>
            </div>
            
            <div class="modal-body">

    <form method="post" action="{{ route('roles.update', $role->id) }}" >
        @method('put')
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" placeholder="Name" class="form-control" value="{{ $role->name }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Permission:</strong>
                    <select class="custom-select custom-select-lg mb-3" name="permissions[]" multiple>
                      <option selected>Select Permission</option>
                      @foreach($permissions as $permission)
                        <option value="{{ $permission->id }}" @if(in_array($permission->id, $rolePermissions) ) selected @endif> {{ $permission->name }} </option>
                      @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Update</button>
                <a class="btn btn-success text-right" href="{{ route('roles.index') }}"> Back</a>
            </div>
            
        </div>
    </form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop