@extends('layout')

@section('content') 
@if(Session::has('error'))
    <div class="alert alert-danger w-25 m-auto mt-3" role="alert">
        {{Session::get('error')}}
    </div>  
@endif
<form action="{{route('login')}}" method="post" class="form-signin text-center w-25 m-auto mt-5">  
    @csrf
    <h1 class="h3 mb-3 font-weight-normal">sign in for admin</h1> 
    <label for="inputEmail" class="sr-only">Email address</label> 
    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required name="email">
    @error('email') 
       <h6 class="text-danger">email required</h6>  
    @enderror
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control mt-3" placeholder="Password" required name="password">
    @error('password')  
    <h6 class="text-danger">password required</h6>  
 @enderror
    <button type="submit" class="btn btn-lg btn-primary btn-block mt-3" type="submit">Sign in</button> 
</form>
@endsection



