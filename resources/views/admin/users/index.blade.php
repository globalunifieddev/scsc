@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
    <h1>Users</h1>
@stop

@section('content')
    <p>Manage users.</p>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-edit"></i>
                            
                            {{-- <a class="btn btn-success text-right" href="{{ route('users.create') }}"> Create New User</a> --}}
                        </h3>
                    </div>
                    
                    <div class="card">
                    <div class="card-body">
  
                        
                        @php
                        $heads = [
                            'SN',
                            'Full Name',
                            'Email',
                            'Phone',
                            'Role',
                            'Organization',
                            'Department',
                            'Action',
                            
                        ];
                        
                        @endphp 
                        
                        {{-- Minimal example / fill data using the component slot --}}
                        <x-adminlte-datatable id="table1" :heads="$heads" striped hoverable with-buttons>
                        @php $n = 1; @endphp
                        @foreach($users as $user)
                                <tr>
                                    
                                        <td>{{ $n++ }}</td>
                                        <td>{{strtoupper($user->name)}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td>
                                          @if(!empty($user->getRoleNames()))
                                            @foreach($user->getRoleNames() as $role)
                                              <label class="badge badge-success">{{ $role }}</label>
                                            @endforeach
                                          @endif
                                        </td>
                                        <td>{{$user->location_name}}</td>
                                        <td>{{$user->department_name}}</td>
                                        <td>
                                            <a href="{{ route('users.edit',$user->id) }}">
                                            <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                                <i class="fa fa-lg fa-fw fa-pen"></i>
                                            </button>
                                            </a>
                                                                                       
                                            <a href="{{ route('users.show',$user->id) }}">   
                                            <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                                                <i class="fa fa-lg fa-fw fa-eye"></i>
                                            </button>
                                            </a>
                                            
                                            <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                                                    <i class="fa fa-lg fa-fw fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    
                                </tr>
                                @endforeach
                        </x-adminlte-datatable>
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