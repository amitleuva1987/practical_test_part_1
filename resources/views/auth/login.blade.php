@extends('layouts.app')
@section('content')
    <div class="container ">
        <div class="row justify-content-center">

        
        <form class="col-md-6 " method="post" action="{{ route('login') }}">
         @csrf   
        <div class="card">    
        <div class="card-header">Login</div>    
        <div class="card-body">
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" id="email" />
                @error('email')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" id="password" />
                @error('password')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>    
            <div class="form-group">
                <input type="checkbox" name="chkremember" />
                <label>Remember me</label>
            </div>    
            <div class="form-group">
                <button type="submit" class="btn btn-primary mt-3">Login</button>
                
            </div>    
            </div>   
            </div>   
        </form>
        </div>
        
    </div>
@endsection