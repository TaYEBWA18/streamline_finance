@extends('layouts.app')  

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Subscription Details</h2>
        </div>
    </div>            
</div>
  

<form action="{{route('subscription.store')}}" method="POST"> 
<!-- csrf prevents input injection from the browswe-->
    @csrf
  
     <div class="row">
        <div class="col-md-6">
      
        <div class="form-group">
                <label for="Client name">Client Name:</label>
                <select name="client_id" class="form-control">
                    <option value="">Select Client</option>
                    @foreach ($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                    @endforeach
                </select>
                @error('name') <div class="alert-alert-danger">
                    {{ $message }}
                  </div> 
                  @enderror
        </div>
            
            <div class="form-group">
                <strong>Date of Payment:</strong>
                <input  type="date" name="payment_date" class="form-control @error('payment_date') is-invalid @enderror" placeholder="01/01/2024" value="{{ old('payment_date') }}">
                @error('payment_date') <div class="alert alert-danger">
                    {{ $message }}
                  </div> 
                  @enderror
            </div>
            <div class="form-group">
                <strong>Expiry Date:</strong>
                <input  type="date" name="expiry_date" class="form-control @error('amount_paid') is-invalid @enderror" placeholder="01/01/2024" value="{{ old('expiry_date') }}">
                @error('expiry_date') <div class="alert alert-danger">
                    {{ $message }}
                  </div> 
                  @enderror
            </div>
            <div class="form-goup">
            <strong>Payment Status:</strong>
                <select name="status" id="" class="form-control">
                    <option value="">Select Status</option>
                    <option value="1">Paid</option>
                    <option value="2">Unpaid</option>
                </select>
            
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection
     