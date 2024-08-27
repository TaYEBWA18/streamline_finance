@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>CLIENTS' TABLE</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href=""> <i class="fa fa-add"></i>Add New Client</a>
                <a class="btn btn-success" href="">Innactive Clients</a>
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
            <th >Client ID</th>
            <th >Name</th>
            <th>Location</th>
            <th>Client Email</th>
            <th>Level</th>
            <th>Billing Cycle</th>
            <th>Contact Personel</th>
            <th>Contact Person's Contact</th>
            <th>Support staff name</th>
            <th>Support staff's Contact</th>
            <th>Support staff's email</th>
            <th>Client Status</th>
         

            <th width="20%">Actions</th>

        @foreach ($clients as $client)
        <!-- @php 
        
        @endphp -->
        <tr>
            <td>{{'CL-'}}{{$client->id}}</td>
            <td>{{ $client->name}}</td>
            <td>{{ $client->location}}</td>
            <td>{{ $client->client_email}}</td>
            <td>@switch($client->level)
                @case(1)
                Health Center 1
                @break
                @case(2)
                Health Center 2
                @break
                @case(3)
                Health Center 3
                @break
                @case(4)
                Health Center 4
                @break
                @case(5)
                Clinic
                @break
                @case(6)
                Hospital
                @break
                @case(7)
                Regional Referral Hospital
                @break
                @case(8)
                National Referral Hospital
                @break
                @endswitch
            </td>
            <td>{{$client->billing_cycle}}</td>
            <td>{{$client->contact_name}}</td>
            <td>{{$client->contact_phone}}</td>
            <td>{{$client->support_name}}</td>
            <td>{{$client->support_phone}}</td>
            <td>{{$client->support_email}}</td>
            <td>@if($client->status == 1) Active @else Inactive @endif</td>
    
            <td>
                <form action="{{route('client.restore', $client->id)}}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger"><i class="fa fa-undo"></i>Restore</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $clients->links() !!}
      
@endsection