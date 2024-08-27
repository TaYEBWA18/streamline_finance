@extends('layouts.app')


@section('content') 
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>ADD CLIENT</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href=""> Back</a>
            <a class="btn btn-primary" href=""> View Clients</a>
        </div>
    </div>            
</div>
  
   
<form action="{{route('client.update', $client->id)}}" method="POST"> 
<!-- csrf prevents input injection from the browswe-->
    @csrf
    @method('PUT')
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
      
            <div class="form-group">
                <strong>Name:</strong> 
                <input  type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Kisizi Hospital" value="{{ $client->name}}">
                @error('name') <div class="alert alert-danger">
                    {{ $message }}
                  </div> 
                  @enderror
            </div>
            <div class="form-group">
                <strong>Location:</strong>
                <input  type="text" name="location" class="form-control @error('location') is-invalid @enderror" placeholder="Rukungiri" value="{{ $client->location }}">
                @error('location') <div class="alert alert-danger">
                    {{ $message }}
                  </div> 
                  @enderror
            </div>
            <div class="form-goup">
            <strong>Level:</strong>
                <select name="level" id="level" class="form-control @error('level') is-invalid @enderror" placeholder="Health Center One" >
                     <option value="">Select Level</option>
                     <option value="1"@selected($client->level=='1')>Health Center 1</option>  <!--Only for dropdown lists-->
                     <option value="2" @if($client->level=='2') selected @endif>Health Center 2</option>
                     <option value="3" @if($client->level=='3') selected @endif>Health Center 3</option>
                     <option value="4" @if($client->level=='4') selected @endif>Health Center 4</option>
                     <option value="5" @if($client->level=='5') selected @endif>Clinic</option>
                     <option value="6" @if($client->level=='6') selected @endif>Hospital</option>
                     <option value="7" @if($client->level=='7') selected @endif>Regional Referral Hospital</option>
                     <option value="8" @if($client->level=='8') selected @endif>National Referral Hospital</option>
                </select>
            </div>
            <div class="form-group">
            <strong>Client Email:</strong>
                <input  type="email" name="client_email" class="form-control @error('client_email') is-invalid @enderror" placeholder="Name" value="{{ $client->client_email }}">
                @error('client_email') <div class="alert alert-danger">
                    {{ $message }}
                  </div> 
                  @enderror
            </div>
            <div class="form-group">
                <strong>Billing:</strong>
                <input  type="text" name="billing_cycle" class="form-control @error('billing_cycle') is-invalid @enderror" placeholder="1 year" value="{{ $client->billing_cycle }}">
                @error('billing_cycle') <div class="alert alert-danger">
                    {{ $message }}
                  </div> 
                  @enderror
            </div>
            <div class="form-group">
                <strong>Contact Person:</strong>
                <input  type="text" name="contact_name" class="form-control @error('contact_name') is-invalid @enderror" placeholder="Name" value="{{ $client->contact_name }}">
                @error('contact_name') <div class="alert alert-danger">
                    {{ $message }}
                  </div> 
                  @enderror
            </div>
            <div class="form-group">
                <strong>Contact Person's Phone:</strong>
                <input  type="text" name="contact_phone" class="form-control @error('contact_phone') is-invalid @enderror" placeholder="07.........." value="{{ $client->contact_phone }}">
                @error('contact_phone') <div class="alert alert-danger">
                    {{ $message }}
                  </div> 
                  @enderror
            </div>
            <div class="form-group">
                <strong>Streamline Support Staff:</strong>
                <input  type="text" name="support_name" class="form-control @error('support_name') is-invalid @enderror" placeholder="Name" value="{{ $client->support_name }}">
                @error('support_name') <div class="alert alert-danger">
                    {{ $message }}
                  </div> 
                  @enderror
            </div>
            <div class="form-group">
                <strong>Streamline Support Staff Phone:</strong>
                <input  type="text" name="support_phone" class="form-control @error('support_phone') is-invalid @enderror" placeholder="07........." value="{{ $client->support_phone }}">
                @error('support_phone') <div class="alert alert-danger">
                    {{ $message }}
                  </div> 
                  @enderror
            </div>
            <div class="form-group">
                <strong>Streamline Support Staff Email:</strong>
                <input  type="email" name="support_email" class="form-control @error('support_email') is-invalid @enderror" placeholder="" value="{{ $client->support_email }}">
                @error('support_email') <div class="alert alert-danger">
                    {{ $message }}
                  </div> 
                  @enderror
            </div>
            


            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection
     