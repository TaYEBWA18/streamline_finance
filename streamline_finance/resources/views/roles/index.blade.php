@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>ROLES' TABLE</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('roles.create')}}"> Add Role</a>
                <a class="btn btn-success" href="">Innactive Roles</a>
                <a class="btn btn-success" href="{{route('users.index')}}">Back</a>
            </div>
            
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <!-- table to return the inserted patients' data -->
        <tr>
            <th width="20%">Role ID</th>
            <th width="20%">Name</th>
            <th width="40%">Permissions</th>
            <th width="20%">Actions</th>

        @foreach ($roles as $role)
        <!-- @php 
        
        @endphp -->
        <tr>
            <td>{{'R-'}}{{$role->id}}</td>
            <td>{{ $role->name}}</td>
            <td  > @foreach ($role->permissions as $permission)
                <h6 style="background-color:#218380;
                        color: #ffffff;
                        padding: 5px;
                        border-radius: 10px;"
                        >
                {{ $permission->name }}</h6>
                @endforeach</td>
            <td>
                <form action="{{route('roles.destroy', $role->id)}}" method="POST">
                  
                    <a class="btn btn-primary" href="{{route('roles.edit', $role->id)}}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $roles->links() !!}
      
@endsection