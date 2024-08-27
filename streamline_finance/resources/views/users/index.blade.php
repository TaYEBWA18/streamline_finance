@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>USERS' TABLE</h2>
            </div>
            <div class="pull-right">
                @can('create_users')
                <a class="btn btn-success" href="{{route('users.create')}}"><i class="fa fa-add"></i> ADD USER</a>
                @endcan
                @can('create_roles')
                <a class="btn btn-success" href="{{route('roles.index')}}">Roles</a>
                @endcan
                @can('delete_users')
                <a class="btn btn-success" href="{{route('inactive.users')}}">INACTIVE USERS</a>
                @endcan

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
            <th>UerID</th>
            <th>User name</th>
            <th>Phone number</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Role</th>

            
           
            <th width="280px">Action</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{"SL-F-"}}{{$user->id}}</td>
            <td>{{ $user->name}}</td> <!--concacting name -->
            <td>{{ $user->phone}}</td>
            <td>{{ ($user->gender =='M')? 'Male':'Female'}}</td>
            <td>{{ $user->email}}</td>
            <td> @foreach ($user->roles as $role)
                {{ $role->name }}
                @endforeach</td>
            <td>
                <form action="{{ route('users.destroy',$user->id) }}" method="POST">
   
                <a class="btn btn-info" href="{{route('users.show', $user->id)}}"><i class="fas fa-eye"></i>Show</a>
                    @can('edit_users')
                    <a class="btn btn-primary" href="{{route('users.edit', $user->id)}}"><i class="fas fa-edit"></i>Edit</a>
                    @endcan 
                    @csrf
                    @method('DELETE')
                    @can('delete_users')
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>Delete</button>
                    @endcan
                </form>
            </td>
        </tr>
        @endforeach
    </div>
    </table>
    
  
    {!! $users->links() !!}
      
@endsection