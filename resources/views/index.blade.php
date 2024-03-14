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
        <div id="home" class="container-xxl position-relative p-0">
            @include('navbar')
            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container my-5 py-5">
                    <div class="row align-items-center g-5">
                        <div class="col-lg-6 text-center text-lg-start">
                            <h6 class="display-3 text-white animated slideInLeft">Twice The Fun  <br></h6>
                            <p class="text-white animated slideInLeft mb-4 pb-2">Discover endless entertainment with the Premium Plus IPTV subscription, offering two unique packages for an unparalleled viewing experience.</p>
                            @if (session('userId'))
                            <a href="/#pricing" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft" >SUBSCRIBE NOW</a>
                            @else
                            <a class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft" data-bs-target="#createUser" data-bs-toggle="modal">Create Acount</a>
                            @endif
                        </div>
                        <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                            <img class="img-fluid" src="img/hero.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Service Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-4">
                   <div class="col-lg-4 col-sm-8 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-headset text-primary mb-4"></i>
                                <h5>24/7 {{__('service.title1')}}</h5>
                                <p>{{__('service.text1')}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-8 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-user-tie text-primary mb-4"></i>
                                <h5>{{__('service.title2')}}</h5>
                                <p>We have a staff with more than 4 years of experience</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-8 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-cart-plus text-primary mb-4"></i>
                                <h5>{{__('service.title3')}}</h5>
                                <p>You can purchase via  Credit Cards and we will send you your IPTV via your email</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service End -->


        <!-- About Start -->
        <div id="about" class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="img/about-1.jpg">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="img/about-2.jpg" style="margin-top: 25%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="img/about-3.jpg">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s" src="img/about-4.jpg">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h2 class="mb-4">Welcome to BootCoders</h2>
                        <p class="mb-4">
                            Welcome to <B>BootCoders</B> , where our revolutionary <B> Premium Plus Subscription </B>  offers two distinct subscriptions, each on its dedicated server, all designed for a <B>single device</B> . <B>Eliminate any risk of interruption</B>: if one subscription <B> encounters an issue </B>, seamlessly <B>switch to the second</B> . Enjoy a variety of exclusive content without ever compromising on quality. Choose the future of entertainment, <B>worry-free</B> , with BootCoders.
                        </p>
                      
                        <div class="row g-4 mb-4">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">4</h1>
                                    <div class="ps-4">
                                        <p class="mb-0">{{__('about.partie4')}}</p>
                                        <h6 class="text-uppercase mb-0">{{__('about.partie5')}}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">5</h1>
                                    <div class="ps-4">
                                        <p class="mb-0">{{__('about.partie6')}}</p>
                                        <h6 class="text-uppercase mb-0">{{__('about.partie7')}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-primary py-3 px-5 mt-2" href="/newAcount">Create Acount</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->

       <!-- pricing start -->
          @include('pricing')
    <!----------------------------------------- pricing end ------------------------------------->


        <!-- contact Start -->
        <div id="contact" class="container-xxl py-5 px-0 wow fadeInUp" data-wow-delay="0.1s">
            <div class="row g-0">
                <div class="col-md-6">
                    <div class="video">

                    </div>
                </div>
                <div class="col-md-6 bg-dark d-flex align-items-center">
                    <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                        <h1 class="text-white mb-4">
                       Contact Us
                        </h1>
                        
                        {{-- <p class="text-white">{{__('contact.text')}}</p> --}}
                        <form action="{{route('contactUs')}}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Your Name">
                                        <label for="name">{{__('contact.name')}}</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Your Email">
                                        <label for="email">{{__('contact.email')}}</label>
                                    </div>
                                </div>


                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Special Request" name="comment" id="message" style="height: 100px"></textarea>
                                        <label for="message">{{__('contact.comment')}}</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary w-100 py-3" type="submit">{{__('contact.send')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Testimonial Start -->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="text-center">
                    <h1 class="mb-5">{{__("review.title")}}</h1>
                </div>
                <div class="owl-carousel testimonial-carousel">
                    <div class="testimonial-item bg-transparent border rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>{{__("review.review1")}}</p>
                        <div class="d-flex align-items-center">
                            <div class="ps-3">
                                <h5 class="mb-1">{{__("review.client1")}}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-transparent border rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>{{__("review.review2")}}</p>
                        <div class="d-flex align-items-center">
                            <div class="ps-3">
                                <h5 class="mb-1">{{__("review.client2")}}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-transparent border rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>{{__("review.review3")}}</p>
                        <div class="d-flex align-items-center">
                            <div class="ps-3">
                                <h5 class="mb-1">{{__("review.client3")}}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-transparent border rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>{{__("review.review4")}}</p>
                        <div class="d-flex align-items-center">
                            <div class="ps-3">
                                <h5 class="mb-1">{{__("review.client4")}}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-transparent border rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>{{__("review.review5")}}</p>
                        <div class="d-flex align-items-center">
                            <div class="ps-3">
                                <h5 class="mb-1">{{__("review.client5")}}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-transparent border rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>{{__("review.review6")}}</p>
                        <div class="d-flex align-items-center">
                            <div class="ps-3">
                                <h5 class="mb-1">{{__("review.client6")}}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-transparent border rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>{{__("review.review7")}}</p>
                        <div class="d-flex align-items-center">
                            <div class="ps-3">
                                <h5 class="mb-1">{{__("review.client7")}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->

         @include('footer')

        <!-- Back to Top -->
    </div>
    {{-- modal for create users --}}
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
    {{-- fin modal --}}
    {{-- modal for login users --}}
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
                <div class="modal-footer d-flex justify-content-between">
                  <a href="/resetPasswordView" class="text-reset text-decoration-underline">resetPassword?</a>
                  <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    {{-- fin modal --}}
   
   @if (session('faildLogin'))
        <script>
          swal({
            position: 'center',
            icon: 'error', 
            button: false,
            title: 'Your email or password is incorrect. Try again',
            timer:3000
          });
        </script>
   @endif 
   @if (session('successLogin'))
        <script>
          swal({
            position: 'center',
            icon: 'success', 
            button: false,
            title: 'success login',
            timer:3000
           })
        </script>
   @endif 
   @if (session('contactSuccess'))
        <script>
          swal({
            position: 'center',
            icon: 'success', 
            button: false,
            title: 'Your message has been sent successfully!',
            timer:3000
          });
        </script>
   @endif 
@endsection
