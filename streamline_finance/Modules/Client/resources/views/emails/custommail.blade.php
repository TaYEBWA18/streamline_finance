@extends('layouts.app')  

@section('content') 
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>CUSTOM MAIL</h2>
        </div>  
    </div>
</div>            

  
   
<form action="" method="POST"> 
<!-- csrf prevents input injection from the browswe-->
    @csrf
  
     <div class="row">

     <div class="col-xs-1 col-sm-10 col-md-10">
     
            <label for="receiver">To:</label><input  class="form-control type="email" name="receiver">
            <label for="cc">Cc:</label><input  class="form-control type="email" name="cc">
    
            <strong>Message:</strong> 
            <textarea class="form-control rows="50" cols="100" style="
                height: 60%;
            "></textarea>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Send</button>
        </div>
    </div>
   
</form>
@endsection
     