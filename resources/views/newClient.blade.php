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
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Login User</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="/">{{__('trial.home')}}</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Create Acounte</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->
         

        <div class="container mb-5">
           <div class="card w-50 m-auto">
                <div class="card-header">
                    Login 
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
<div>
        @include('footer')
    <!-- Back to Top -->
</div>
@if (session('createSuccess'))
<script>
    swal({
        position: 'top-end',
        icon: 'success',
        title: 'Account created Successfully! Login Now', 
        button: false,
        timer: 4000
    })
</script>
@endif
@if (session('passwordResetSuccess'))
<script>
    swal({
        position: 'top-end',
        icon: 'success',
        title: 'Password Reset Successfully! Login Now', 
        button: false,
        timer: 4000
    })
</script>
@endif

@endsection