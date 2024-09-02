@extends('layouts.app')  



@section('content') 
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Drug</h2>
        </div>
    </div>            
</div>
  
   
<form action="" method="POST"> 
<!-- csrf prevents input injection from the browswe-->
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
      
            <div class="form-group">
                <strong>Facility Name:</strong> 
                <input  type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Paracetamol" value="{{ old('name') }}">
                @error('name') <div class="alert alert-danger">
                    {{ $message }}
                  </div> 
                  @enderror
            </div>
            <div class="form-group">
                <strong>Billing Cycle:</strong>
                <input  type="text" name="brand_name" class="form-control @error('brand_name') is-invalid @enderror" placeholder="Name" value="{{ old('brand_name') }}">
                @error('brand_name') <div class="alert alert-danger">
                    {{ $message }}
                  </div> 
                  @enderror
            </div>
            <div class="form-goup">
            <strong>Status</strong>
                <label for="paid"></label><input type="radio" value="">


            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection
     