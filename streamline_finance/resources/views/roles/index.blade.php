@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>ROLES' TABLE</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('roles.create')}}"> Add Role</a>
                <a class="btn btn-success" href="">Deleted Roles</a>
                <a class="btn btn-success" href="">Back</a>
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
            <th width="25%">Name</th>
            <th width="25%">Permissions</th>
            <th width="30%">Action</th>
        </tr>
        @foreach ($roles as $role)
        <!-- @php 
        
        @endphp -->
        <tr>
            <td>{{'R-'}}{{$role->id}}</td>
            <td>{{ $role->name}}</td>
            <td></td> <!--concacting name -->
            <td>
                <form action="" method="POST">
   
                    <a class="btn btn-info" href="">Select</a>
    
                    <a class="btn btn-primary" href="">Edit</a>
   
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