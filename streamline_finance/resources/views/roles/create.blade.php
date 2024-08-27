@extends('layouts.app')  

@section('content') 
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create Role</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href=""> Back</a>
            <a class="btn btn-primary" href="{{route('roles.index')}}"> View Roles</a>
        </div>
    </div>            
</div>
  
   
<form action="{{route('roles.store')}}" method="POST"> 
<!-- csrf prevents input injection from the browswe-->
    @csrf
  
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
      
            <div class="form-group">
                <strong>Name:</strong> 
                <input  type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Admin" value="{{ old('name') }}">
                @error('name') <div class="alert alert-danger">
                    {{ $message }}
                  </div> 
                  @enderror
            </div>
            <div class="form-group">
    
                @foreach($categories as $category)

                <div class="checkbox-group">
                    <strong>{{ $category->category_name }}</strong>
                        @foreach($category->permissions as $permission)
                
                    <div class="form-check">
                        <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" class="form-check-input" id="permission-{{ $permission->id }}">
                        <label class="form-check-label" for="permission-{{ $permission->id }}">
                         {{ $permission->name }}
                        </label> 
                    </div>
                    @endforeach
                </div>
                @endforeach
                
        </div>

                @error('permissions') <div class="alert alert-danger">
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
     