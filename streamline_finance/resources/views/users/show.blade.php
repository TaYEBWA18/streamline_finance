@extends('layouts.app')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{$user->name}}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('users.index')}}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Staff ID:</strong>
                {{'SL-F-'}}{{ $user->id }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Phone number:</strong>
                {{ $user->phone }}
            </div>
            <div class="form-group">
                <strong>Gender:</strong>
                {{ $user->gender=='1'? 'Male': 'Female' }}
            </div>
            <div class="form-group">
                <strong>Last Updated:</strong>
                {{ $user->updated_at }}
            </div>
            <div class="form-group">
                <!-- <strong>Registered at:</strong> -->
                
            </div>
    
        </div>
    </div>
@endsection