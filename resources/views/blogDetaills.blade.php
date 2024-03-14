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
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Blog Details</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="/">{{__('trial.home')}}</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Blog Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="shadow container text-center mb-3">
            @foreach ($blog as $item)
                <h1>{{$item->title}}</h1>
            @endforeach
        </div>
        <div class="shadow container text-center mb-3" >
            @foreach ($blog as $item)
            <img src="{{ asset('storage/images/' .$item->images[0]->image) }}" class="img-fluid" alt="image blog" style="max-height:300px;width:100%" />
            @endforeach
        </div>
        <div class="shadow container text-center mb-3">
            @foreach ($blog as $item)
                <div class="p-3 py-4">
                    {!! nl2br(e($item->description)) !!}
                </div>
            @endforeach
        </div>
        
       
</div>

         @include('footer')
        <!-- Back to Top -->
    </div>

@endsection