@extends('layout')

@section('content')
<div class="vh-100 d-flex justify-content-center align-items-center">
    <div>
        <div class="mb-4 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="text-success" width="75" height="75"
                fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                <path
                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
            </svg>
        </div>
        <div class="text-center">
            <h1>{{__('success.successTitle')}}</h1> 
            <p>{{__('success.sutP1')}}</br>{{__('success.sutP2')}}</p>
            <h6>{{__('success.sutP3')}}</h6>
            <a href="/"><button class="btn btn-primary">{{__('success.successBack')}}</button></a>
            <h6 class="text-center mt-5">IptvMtm</h6>  
        </div>
    </div> 
@endsection