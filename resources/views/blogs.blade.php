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
                <h1 class="display-3 text-white mb-3 animated slideInDown">Blogs</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="/">{{__('trial.home')}}</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Blogs</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar & Hero End -->
    <div class="card container  shadow p-3 mb-2 rounded">
        <div class="card-header d-flex justify-content-between mt-3 shadow-sm p-3 mb-2 rounded">
            <h5>List Of Blogs</h5>
            @if (isset(auth()->user()->email))
                @if (auth()->user()->email == 'bootcoders.tv@gmail.com')
                    <div>
                        <a role="button" href="/newBlog" class="btn btn-primary">New Blog</a>
                    </div>
                @endif
            @endif
          
         </div>
        <div class="card-body d-flex justify-content-around rounded flex-wrap">
            @foreach ($blogs as $blog)
                <div class="card w-100 mb-5" style="width:300px">
                    {{-- <img src="{{asset('storage/images/image-65dcfb4b35d285.08373873/8d318c7e-3757-4ed3-a18a-a2a4b313ffb2.jpeg') }}" class="card-img-top" alt="..."> --}}
                    <img src="{{ asset('storage/images/' .$blog->images[0]->image) }}" class="card-img-top" style="max-height:300px">
                    <div class="card-body">
                        <h5 class="card-title">{{$blog->title}}</h5>
                        <h6 class="card-title" style=" display: block;width:50%;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;">{{$blog->description}}</h6>
                        <a href="blogs/{{$blog->id}}" class="btn btn-primary w-25">Learn More</a>
                    </div>
                </div>
           @endforeach
        </div>
    </div>      
</div>

    @include('footer')
</div>

@endsection