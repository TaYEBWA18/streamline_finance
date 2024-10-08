@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>INACTIVE USERS' TABLE</h2>
            </div>
            <div class="pull-right">
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
            <th>UerID</th>
            <th>User name</th>
            <th>Phone number</th>
            <th>Gender</th>
            <th>Email</th>

            
           
            @can('delete_users')<th width="280px">Action</th>@endcan
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{"SL-F-"}}{{$user->id}}</td>
            <td>{{ $user->name}}</td> <!--concacting name -->
            <td>{{ $user->phone}}</td>
            <td>{{ ($user->gender =='M')? 'Male':'Female'}}</td>
            <td>{{ $user->email}}</td>
            @can('delete_users')
            <td style="display: flex; gap: 10px; align-items: center;">
                <form action="{{ route('user.restore',$user->id) }}" method="POST">
                
                <button class="btn btn-info" type="submit"><i class="fas fa-undo"></i> Restore</button>
                    <!-- the restore button -->
   
                    @csrf 
                </form><br>
                <form action="{{ route('deleteUser',$user->id) }}" method="POST">
                
                <button class="btn btn-info" type="submit"><i class="fas fa-trash"></i> Delete Permanently</button>
                
                    <!-- the restore button -->
   
                    @csrf 
                </form>
            </td>@endcan
        </tr>
        @endforeach
    </div>
    </table>
    
  
    {!! $users->links() !!}
@endsection