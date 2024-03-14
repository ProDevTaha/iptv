@extends('layout')

@section('content')   
    <nav class="navbar navbar-expand-lg navbar-light bg-dark" >
        <div class="container-fluid">
        <a class="navbar-brand text-light fw-bold" href="/home">IptvMtm</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link  text-light fw-bold" aria-current="page" href="/home">Order <span class="badge badge-danger" style="background: rgb(244, 7, 7)">{{$count}}</span></a> 
            </li>
            <li class="nav-item">
                <a class="nav-link text-light fw-bold" href="/Order_Visa">Order Visa</a>
            </li> 
            <li class="nav-item">
                <a class="nav-link text-light fw-bold" href="/Order_Trial">Order Trial</a>
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

    <div class="d-flex fex-wrap container justify-content-between shadow p-3 mb-5 mt-5 rounded">
        <form action="{{route('home')}}" method="get" class="d-flex align-items-center w-25">
            <span>day</span> 
            <input type="date" class="form-control ms-2" style="width:200px" name="day">
            <button type="submit" class="btn btn-success">apply</button>
        </form> 
        <form action="{{route('home')}}" method="get" class="d-flex flex-wrap align-items-center w-50">
            <span >from</span>
            <input type="date" class="form-control ms-2" name="from" style="width:200px">
            <span class="ms-2">to</span>
            <input type="date" class="form-control ms-2" name="to" style="width:200px">
            <button type="submit" class="btn btn-success">apply</button>
        </form> 
    </div>

   <div class="table-responsive">
    <table class="table table-striped table-hover shadow container  p-3 mb-5  text-dark rounded">
        <thead>
            <tr>
                <th scope="col">Email</th>
                <th scope="col">price</th>
                <th scope="col">PaymentId</th>
                <th scope="col">PyerId</th>
                <th scope="col">status</th>  
                <th scope="col">date</th>   
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order) 
                <tr>
                    <th scope="col">{{$order->email}}</th>
                    <th scope="col">{{$order->price}} USD</th> 
                    <th scope="col">{{$order->payment_id}}</th>
                    <th scope="col">{{$order->payer_id}}</th>
                    <th  scope="col">{{$order->payment_status}}</th>  
                    <th scope="col">{{$order->created_at}}</th>  
                </tr> 
            @endforeach
        </tbody>
    </table> 
   </div>
    <div class="d-flex justify-content-center">
        {!! $orders->withQueryString()->links('pagination::bootstrap-5') !!}

    </div>
    
   
    
@endsection