@extends('layout')

@section('content')
<div >
    <div>
        <div class="mb-4 mt-4 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="text-success" width="75" height="75"
                fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                <path
                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
            </svg>
        </div>
        <div class="text-center">
            <h1>Thank you for your order!</h1> 
            <p class="shadow p-3 mb-5 rounded w-75 m-auto" style="background-color: rgb(255, 255, 255)">We've received your order. Your login credentials will be sent to you as soon as possible.</br>
               If you don't receive anything within the next 12 hours, please check your spam folder. If you still can't find anything, feel free to contact us at <b style="color:#0000FF"> bootcoders.tv@gmail.com</b>.</p>
            <h5 class="mt-2">Thank you for your patience!</h5>
            @if ($login == '00')
            <div class="card w-75 m-auto shadow p-3 mb-5 bg-body-tertiary rounded">
                <div class="card-header">
                    Kindly note that you are not currently logged in. Please log in or create an account to securely save this order.
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-around flex-wrap">
                        <button class="btn btn-primary" data-bs-target="#loginUser" data-bs-toggle="modal" style="width:200px">Login</button>
                        <button class="btn btn-success" data-bs-target="#createUser" data-bs-toggle="modal" style="width:200px">SignUp</button>
                    </div>
                </div>
            </div>

            @endif
            <h6 class="text-center fw-bold" style="color:#0000FF"><a href="/">www.bootcoders.com</a></h6>  
        </div>
    </div> 


    <div class="modal fade" id="createUser" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Create User</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('newUser')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div>
                        <label for="firstname">First name <span style="color:red">*</span></label>
                        <input type="text" id="firstname" class="form-control" autocomplete="false" name="firsname" required /> 
                    </div>
                    <div class="mt-2"> 
                        <label for="lastname">Last name <span style="color:red">*</span></label>
                        <input type="text" id="lastname" class="form-control" autocomplete="false" name="lastname" required /> 
                    </div>
                    <div class="mt-2">
                        <label for="email">Email <span style="color:red">*</span></label>
                        <input type="email" id="email" class="form-control" autocomplete="false" name="email" required /> 
                    </div>
                    <div class="mt-2">
                        <label for="password">Password <span style="color:red">*</span></label>
                        <input type="password" id="password" class="form-control" autocomplete="false" name="password" required/> 
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="loginUser" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Login User</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('login')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="mt-2">
                        <label for="email">Email <span style="color:red">*</span></label>
                        <input type="email" id="email" class="form-control" autocomplete="false" name="email" required /> 
                    </div>
                    <div class="mt-2">
                        <label for="password">Password <span style="color:red">*</span></label>
                        <input type="password" id="password" class="form-control" autocomplete="false" name="password" required/> 
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection 