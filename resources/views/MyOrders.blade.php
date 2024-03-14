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
                    <h1 class="display-3 text-white mb-3 animated slideInDown">My Orders</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="/">{{__('trial.home')}}</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">My Orders</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->
         

        <div class="mb-5">
           <div class="card w-75 m-auto shadow p-3 mb-5 bg-body-tertiary rounded">
                <div class="card-header d-flex justify-content-between">
                    <div>My Orders</div> 
                    <div >
                        <form class="d-flex" action="{{route('search')}}" method="post">
                            @csrf
                            <input type="search" name="orderid" class="form-control" placeholder="Order ID" />
                            <input type="hidden" name="search" value="search" />
                            <button type="submit" class="btn btn-success">search</button>
                        </form>
                    </div> 
                </div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Order ID</th>
                                <th>Offre</th>
                                <th>Statut</th>
                                <th>Date</th>
                                @if (auth()->user()->email == 'bootcoders@gmail.com')
                                <th>options</th>
                                @endif
                                
                            </tr>
                        </thead>
                        @forelse ($orders as $order)
                        <tr>
                            <td>IPTV</td>
                            <td>{{ $order->price }}</td>
                            <td>{{ $order->orderId }}</td>
                            <td>{{ $order->offre }}</td>
                            @if ($order->statut == '0')
                            <td>
                                <span style="color: rgb(236, 168, 8)">in progress</span>
                            </td>
                            @else
                            <td >
                                <span style="color: rgb(8, 236, 61)">delivered</span>
                            </td>
                            @endif
                           
                            <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d/m/y H:i:s') }}</td>
                            @if (auth()->user()->email == 'bootcoders@gmail.com')
                            <td>
                                <div class="dropdown">
                                    <button  type="submit"  data-toggle="dropdown" class="btn btn-xs btn-success rounded-end btn-flat" data-toggle="tooltip" title='Edit' style="border-radius:10px 0 10px 0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                                            <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
                                        </svg>
                                    </button>
                                    <ul class="dropdown-menu">
                                      @if ($order->statut == 0)
                                      <li class="p-3"><a type="button" onclick="change({{$order->id}},{{$order->statut}})" class="changeConferm text-dark" class="dropdown-item">delivered</a></li>
                                      @endif
                                      @if ($order->statut == 1)
                                      <li><a type="button" onclick="change({{$order->id}},{{$order->statut}})" class="changeConferm text-dark" class="dropdown-item">in progress</a></li>
                                      @endif
                                    </ul>
                                </div>
                            </td>
                            @endif
                        </tr>
                        @empty
                            <tr>
                                <td style="background-color: rgb(251, 229, 199)" class="alert text-center" role="alert" colspan="6">The list of your orders is empty!</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
           </div>
        </div>
        @include('footer')
</div>
<script>
    function change(id,statut){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: '/changeStatut/' + id + '/' + statut,
            success: function(data) {
                console.log('success change');
                location.reload(true);
            }
        }); 
    }
</script>

@endsection