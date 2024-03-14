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
    <div class="w-50 m-auto mt-5">
        <h1 class="text-center">Add User</h1>
        <form action="{{route('register')}}" method="POST">
            @csrf
            
            <input class="form-control mt-2" type="text"     name="name"  placeholder="Name"     require />
            <input class="form-control mt-2" type="email"    name="email" placeholder="Email"    require />
            <input class="form-control mt-2" type="password"  name="password" placeholder="Password" require /> 
            <button class="btn btn-primary mt-3" type="submit">Add User</button>  
        </form>  
    </div>
@endsection

