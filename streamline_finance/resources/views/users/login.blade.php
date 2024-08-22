@extends('layouts.authlayout')
  
@section('content')
<div class="container">
  <form action="{{route('login')}}" method="GET">
  @csrf

  <div class="image">
  <img src="{{ asset('https://streamlinehealth.org/wp-content/uploads/2023/08/logo-02.webp') }}" alt="Stre@mline Hospital Logo"><h2 style="text-align: center; color: green;">FINANCE</h2><br>
    <h4>LOGIN </h4>
</div>

  
    <div class="row">
      
      <div class="input-group input-group-icon ">
        <input class="@error('email') invalid-feedback @enderror" type="email" placeholder="Email Adress" name="email" id="email" value="{{ old('email') }}"/>
        @error('email') <div class="alert-alert-danger">
                    {{ $message }}
                  </div> 
                  @enderror
        <div class="input-icon"><i class="fa fa-envelope"></i></div>
      </div>
      
      <div class="input-group input-group-icon ">
        <input type="password" class="@error('password') invalid-feedback @enderror" placeholder="Password" name="password" id="password" value="{{ old('password') }}"/>
        @error('password') <div class="alert-alert-danger">
                    {{ $message }}
                  </div> 
                  @enderror
          <div class="input-icon"><i class="fa fa-key"></i></div>
      </div>
      <div class="input-group input-group-icon"><br><br>
      
      <button type="submit"><b>Login</b></button><br><br>
    </form> 
    <div style="display: flex; gap: 20px;"><a><b>Forgot Password</b></a></div>
    </div>
    
    