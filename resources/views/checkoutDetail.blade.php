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
                    <h2 class=" text-white mb-3 animated slideInDown">{{$month}}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="/">{{__('trial.home')}}</a></li>   
                            <li class="breadcrumb-item text-white active" aria-current="page">Checkout Detail</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->
         

        <div id="about" class="container-xxl py-5">
            <div class="container">
                <div class="row  g-5 shadow p-3 mb-5 bg-light  rounded ">
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="img/imgTv.jpg">
                            <a href="http://127.0.0.1:8082/checkoutViewB?price={{ $price }}&Course={{ $course }}&thankyou={{ $thankyou }}&offre={{ $month }}{{ auth()->check() ? '&login=' . auth()->user()->id : '' }}">
                                <input type="hidden" name="price" value="{{$price}}">
                                <input type="hidden" name="offre" value="{{$month}}">
                                <input type="hidden" name="course" value="{{$course}}">
                                @if (auth()->check())
                                <input type="hidden" name="login" value="{{auth()->user()->id}}">
                                @endif
                                <button type="submit" class="btn btn-primary py-3 px-5 mt-4 w-75 m-auto">BUY NOW</button>
                            </a>
                        
                        </div>
                    </div>
                    <div class="col-lg-6 ">
                        <h4 class="mb-4" style="color:#FEA116">{{$month}}</h5>
                        <p >Embark on endless entertainment with the 12-Month Premium Plus IPTV Subscription, featuring two unique packages for unparalleled viewing.</p> 
                        <h5 class="mt-2">Premium Plus Subscription :</h5>
                        <ul>
                           <li><B>Over 21,000 Channels</B> :Coverage in more than 100 countries - 370 categories</li>
                           <li><B>Over 64,000 Movies </B>: Coverage in more than 30 countries - 170 categories</li>
                           <li><B>Over 9,154 Series</B> :  Coverage in more than 25 countries - 80 categories</li>
                        </ul>
                        <h6 class="ms-3">Backup Subscription Included :</h6>
                        <ul>
                            <li><B>Over 21,000 Channels </B>: Coverage in more than 100 countries - 370 categories</li>
                            <li><B> 53,000 Movies </B>:Coverage in more than 27 countries - 144 categories</li>
                            <li><B>Over 20,910 Series</B> :Coverage in more than 17 countries - 75 categories</li>
                            <li><B>Versatile Quality</B>: SD to FHD for an Exceptional Viewing Experience</li>
                        </ul>
                        <p class="mt-2"><B>24/7 support</B> ensures convenience, while <B> fast delivery </B> enhances your experience.</p>
                        
                        <h6 class="mt-2" style="color: #FEA116">Access PPV, cinema channels, and streaming services like Netflix, Amazon Prime, and HBOgo, along with exclusive content featuring MMA, boxing, and WWE.</h6>
                        
                        <p class="mt-2">Enjoy seamless integration with popular applications such as <B>IPTV Smarters Pro, IPTV Smarters Player Lite, IPTV Stream Player, Dev IPTV Pro, IBO Player, Xtream Player, Tivimate, SmartOne </B> … and more</p>
                        
                        <p class="mt-2">Compatible with <B>Android Box, Smart TV, Firestick, Smartphones, Tablets, Android TV,</B> and <B>Apple TV</B>.</p>
                        
                        <p class="mt-2">Our satisfaction guarantee ensures a worry-free experience with fast delivery. Immerse yourself in diverse entertainment options with BootCoders Premium Plus Subscription, redefining your viewing pleasure.</p>
                        <p class="mt-2">Enjoy <B>exclusive discounts</B>  on each <B>additional subscription</B>  as a <B>loyal customer</B> . Save while exploring more entertainment options with BootCoders.</p>
                        
                         <a href="http://127.0.0.1:8082/checkoutViewB?price={{$price}}&&course={{$course}}&&thankyou={{$thankyou}}">
                            @csrf
                            <input type="hidden" name="price" value="{{$price}}">
                            <input type="hidden" name="offre" value="{{$month}}">
                            <button type="submit" class="btn btn-primary w-100  mt-2 p-3">BY NOW</button>
                        </a>
                       
                    </div>
                    
                </div>
            </div>
        </div>

         @include('footer')
        <!-- Back to Top -->
    </div>

@endsection