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
            <h2 class="pull-left">Roles Management</h2>
            @if(Auth::user()->hasRole('admin'))
                    <a class="btn btn-success text-right" href="{{ route('roles.create') }}"> Create New Role</a>
                @endif
            </div>
            <div class="modal-body">

    <div class="row">
        <div class="col-lg-12 margin-tb">
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
              <p>{{ $message }}</p>
            </div>
            @endif
            <table class="table table-bordered">
             <tr>
               <th></th>
               <th>Name</th>
               <th>Action</th>
             </tr>
             @foreach ($roles as $key => $role)
              <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ strtoupper($role->name) }}</td>
                <td>
                   <a href="{{ route('roles.show',$role->id) }}">
                   <button type="submit" class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                        <i class="fa fa-lg fa-fw fa-eye"></i>
                    </button>
                   </a>
                   @if(Auth::user()->hasRole('admin'))
                    <a href="{{ route('roles.edit',$role->id) }}">
                    <button type="submit" class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                        <i class="fa fa-lg fa-fw fa-edit"></i>
                    </button>
                    </a>
                   @endif
                   @if(Auth::user()->hasRole('admin'))
                    <a href="#">
                    <button type="submit" class="btn btn-xs btn-danger text-teal mx-1 shadow" title="Details">
                        <i class="fa fa-lg fa-fw fa-trash"></i>
                    </button>
                    </a>
                   @endif
                   
                </td>
              </tr>
             @endforeach
            </table>
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