@extends('layout') 

@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-dark"  >
    <div class="container-fluid">
      <a class="navbar-brand text-light fw-bold" href="/home">IptvMtm</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link  text-light fw-bold" aria-current="page" href="/home">Order </a> 
          </li>
          <li class="nav-item">
            <a class="nav-link text-light fw-bold" href="/Order_Trial">Order Trial </a>
          </li> 
          <li class="nav-item">
            <a class="nav-link text-light fw-bold" href="/register">Add User</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light fw-bold" href="/blog">Add Blog</a>
          </li> 
        </ul>
        <form class="d-flex" action="{{route('logout')}}" method="POST">
            @csrf
            @method('DELETE')
          <button  type="submit" class="btn btn-outline-success" type="submit">Déconnexion</button>
        </form>
      </div>
    </div>
  </nav>  
    @if(Session::has('success'))
      <div class="alert alert-success text-center w-50 m-auto mt-3" role="alert">
        blog add with successfully  
      </div>  
    @endif  
    <div class="w-50 m-auto mt-5">
        <h1 class="text-center">Add Blog</h1>
        <form action="{{route('blog')}}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <input class="form-control mt-2" type="text"  name="title"  placeholder="title"     require />
            <textarea cols="" rows="10" class="form-control mt-2" type="text"  name="content" placeholder="content"    require ></textarea>
            <div class="mt-4">
              <div class="dz-message needsclick rounded "  style="border: dashed rgb(51, 196, 228);background-color: #eeeeee">  
                 <input type="file" class="filepond" name="image" multiple credits="false" style="max-height:200px">                                    
              </div>
            </div>
            <button class="btn btn-primary mt-3 mb-3" type="submit">Add Blog</button>  
        </form>  
    </div>
@endsection

