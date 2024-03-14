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
                <h1 class="display-3 text-white mb-3 animated slideInDown">New Blog</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="/">{{__('trial.home')}}</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Blog</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar & Hero End -->
   <form action="{{route('create.blog')}}" method="post"  enctype="multipart/form-data">
    @csrf
    <div class="card w-75 m-auto  shadow p-3 mb-2 rounded">
        <div class="mt-3">
            <label for="title">Title</label>
            <input type="text" id="title"  class="form-control" name="title" placeholder="title" />
        </div>
        <div class="mt-3">
            <label for="title">Description</label>
            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>

        </div>
        <div class="mt-3">
            <label for="title">Images</label>
            <input type="file" id="title" multiple  class="form-control" name="image" placeholder="title" style="border: dashed rgb(51, 196, 228);background-color: #eeeeee" />
        </div>
        <div class="text-center mt-3">
            <button type="submit" class="btn btn-primary w-50">CREATE</button>
        </div>
        <div></div>
    </div>
   </form>
   
         
</div>

    @include('footer')
</div>
@if (session('success'))
<script>
  swal({
    position: 'center',
    icon: 'success', 
    button: false,
    title: 'Blog Created Successfully login',
    timer:3000
   })
</script>
@endif 
@endsection