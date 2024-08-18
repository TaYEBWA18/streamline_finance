@extends('layouts.authlayout')
  
@section('content')
<div class="container">
  <form action="{{route('users.store')}}" method="POST">
  @csrf
  <div class="image">
  <img src="{{ asset('https://streamlinehealth.org/wp-content/uploads/2023/08/logo-02.webp') }}" alt="Stre@mline Hospital Logo"><h2 style="text-align: center; color: green;">Finance</h2><br>
    <h4>REGISTER HERE </h4>
</div>
    <div class="row">
      <h4>Account</h4>
      <div class="input-group input-group-icon ">
        <input class="@error('name') invalid-feedback @enderror" type="text" placeholder="Full Name" name="name" id="name" value="{{ old('name') }}"/>
        @error('name') <div class="alert-alert-danger">
                    {{ $message }}
                  </div> 
                  @enderror
        
        <div class="input-icon"><i class="fa fa-user"></i></div>
      </div>
      <div class="input-group input-group-icon ">
        <input class="@error('email') invalid-feedback @enderror" type="email" placeholder="Email Adress" name="email" id="email" value="{{ old('email') }}"/>
        
        @error('email') <div class="alert-alert-danger">
                    {{ $message }}
                  </div> 
                  @enderror
        <div class="input-icon"><i class="fa fa-envelope"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input class="@error('phone') invalid-feedback @enderror" type="text" placeholder="Phone number" name="phone" id="phone" value="{{ old('phone') }}"/>
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
          <input id="gender-male" type="radio" name="gender" value="M" @if(old('gender')=='M') checked @endif/>
          <label for="gender-male">Male</label>
          <input id="gender-female" type="radio" name="gender" value="F" @if(old('gender')=='F') checked @endif/>
          <label for="gender-female">Female</label>
        </div>
        @error('gender') <div class="alert-alert-danger">
                    {{ $message }}
                  </div> 
                  @enderror
      </div>
    </div>
      <div><button type="submit"><b>Submit</b></button><br><br> Already have an account ? <br><br><a href="{{route('login')}}"><b>Log in</b></a></div>
    </div>
    
  </form>
</div>
