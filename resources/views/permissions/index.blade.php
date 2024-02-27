@extends('adminlte::page')

@section('title', 'Permissions')

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
            <h4 class="pull-left">Permission Management</h4>
            @if(Auth::user()->hasRole('admin'))
                    <a class="btn btn-success text-right" href="{{ route('permissions.create') }}"> Create New Permission</a>
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
             @foreach ($permissions as $key => $permit)
              <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $permit->name }}</td>
                <td>
                   
                   @if(Auth::user()->hasRole('admin'))
                    <a href="{{ route('permissions.edit',$permit->id) }}">
                    <button type="submit" class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                        <i class="fa fa-lg fa-fw fa-edit"></i>
                    </button>
                    </a>
                   @endif
                   
                    <form action="{{ route('permissions.destroy',$permit->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                        <i class="fa fa-lg fa-fw fa-trash"></i>
                    </button>
                </form>
                </td>
              </tr>
             @endforeach
            </table>
            @if($permissions->hasPages())
                <div class="clear:both;margin-left:12px;">
                    {{ $permissions->onEachSide(4)->links() }}
                </div>
            @endif
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