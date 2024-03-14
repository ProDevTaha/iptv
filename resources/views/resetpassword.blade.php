@extends('layout')

@section('content') 
<div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->
         
      

        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0"> 
            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Reset Password</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="/">{{__('trial.home')}}</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Reset Password</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->
        @if ($token == "" && $send == "true")
            <div class="alert alert-primary w-50 m-auto mb-3" role="alert">
               We have sent you an email to initiate the password reset process.
            </div>
        @endif

        @if ($token == "" && $send == "false")
            <div class="alert alert-danger container w-50 m-auto mb-2" role="alert">
                 Email not exist ! please check email
            </div>
        @endif

        <div class="container mb-5">
           <div class="card w-50 m-auto">
                <div class="card-header">
                    Reset Password 
                </div>
                <form action="{{route('resetPassword')}}" method="post">
                    @if (!empty($token))
                    <input type="hidden" value="{{$token}}" name="token"/>
                    @endif
                    @csrf
                    <div class="modal-body">
                        <div class="mt-2">
                            <label for="email">Email <span style="color:red">*</span></label>
                            <input type="email" id="email" class="form-control" autocomplete="false" name="email" placeholder="example@yourname.com" required /> 
                        </div>
                    </div>
                    @if (!empty($token))
                        <div class="modal-body">
                            <div class="mt-2">
                                <label for="password">New Password <span style="color:red">*</span></label>
                                <input type="password" id="password" class="form-control" autocomplete="false" name="password" required /> 
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="mt-2">
                                <label for="ConfermPassword">Conferm Password <span style="color:red">*</span></label>
                                <input type="password" id="ConfermPassword" class="form-control" autocomplete="false" name="confermpassword" required /> 
                            </div>
                        </div>
                    @endif
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Reset</button>
                    </div>
                </form>
                </div>
           </div>
        </div> 
</div>
<div>
        @include('footer')
    <!-- Back to Top -->
</div>
@endsection