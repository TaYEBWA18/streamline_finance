@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>SUBSCRIPTIONS & INVOICES</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="">Add subscription record</a>
                <a class="btn btn-success" href="">Innactive Subscriptions</a>
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
            <th>ID</th>
            <th>Client</th>
            <th>Payment Date</th>
            <th>Subscription Expiry Date</th>
            <th>Status</th>
            
           
            <th width="280px">Action</th>
        </tr>
        @foreach ($subscriptions as $subscription)
        <!-- @php 
        
        @endphp -->
        <tr>
            <td>{{""}}{{$subscription->id}}</td>
            <td>{{ $subscription->client->name}}</td> <!--concacting name -->
            <td>{{ $subscription->payment_date}}</td>
            <td>{{ $subscription->expiry_date}}</td>
            <td>@if($subscription->status == 1) Active @else Inactive @endif</td>

            <td><form action="" method="POST">
   
                    <a class="btn btn-info" href=""><i class="fas fa-eye"></i>Select</a>
    
                    <a class="btn btn-primary" href="{{route('subscription.edit', $subscription->id)}}"><i class="fas fa-pen"></i>Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $subscriptions->links() !!}
      
@endsection