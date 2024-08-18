@extends('layouts.authlayout')
  
@section('content')
<div class="container">
  <form action="{{route('users.update', $user->id)}}" method="PUT">
  @csrf
  
    <h4>EDIT USER DETAILS HERE </h4>

    <div class="row">
      <h4>Account</h4>
      <div class="input-group input-group-icon ">
        <input class="@error('name') invalid-feedback @enderror" type="text" placeholder="Full Name" name="name" id="name" value="{{ $user->name }}"/>
        @error('name') <div class="alert-alert-danger">
                    {{ $message }}
                  </div> 
                  @enderror
        
        <div class="input-icon"><i class="fa fa-user"></i></div>
      </div>
      <div class="input-group input-group-icon ">
        <input class="@error('email') invalid-feedback @enderror" type="email" placeholder="Email Adress" name="email" id="email" value="{{ $user->email }}"/>
        @error('email') <div class="alert-alert-danger">
                    {{ $message }}
                  </div> 
                  @enderror
        <div class="input-icon"><i class="fa fa-envelope"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input class="@error('phone') invalid-feedback @enderror" type="text" placeholder="Phone number" name="phone" id="phone" value="{{ $user->phone}}"/>
        @error('phone') <div class="alert-alert-danger">
                    {{ $message }}
                  </div> 
                  @enderror
        <div class="input-icon"><i class="fa fa-phone"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="password" class="@error('password') invalid-feedback @enderror" placeholder="Password" name="password" id="password" value="{{ old('password') }}"/>
        @error('password') <div class="alert-alert-danger">
                    {{ $message }}
                  </div> 
                  @enderror
        <div class="input-icon"><i class="fa fa-lock"></i></div>
      </div>
     
   
      <div class="col-half">
        <h4>Gender</h4>
        <div class="input-group">
          <input id="gender-male" type="radio" name="gender" value="M" @if( $user->gender=='M') checked @endif/>
          <label for="gender-male">Male</label>
          <input id="gender-female" type="radio" name="gender" value="F" @if($user->gender=='F') checked @endif/>
          <label for="gender-female">Female</label>
        </div>
        @error('gender') <div class="alert-alert-danger">
                    {{ $message }}
                  </div> 
                  @enderror
      </div>
    </div>
      <div><button type="submit"><b>Submit</b></button>
    
  </form>
</div>
