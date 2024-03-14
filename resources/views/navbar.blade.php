<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
    <a href="" class="navbar-brand p-0">
        {{-- <h1 class="text-primary m-0"></i>BootCoders</h1> --}}
        <img src="img/logo.png" alt="Logo">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0 pe-4 d-flex flex-wrap align-items-center">
            {{-- <div class="d-flex align-items-center">
                <a href="/esp" class="nav-item nav-link"> <img class="img-fluid" src="img/icon-espagne.png" alt=""></a>
                <a href="/eng" class="nav-item nav-link"> <img class="img-fluid" src="img/icon-australia.png" alt=""></a>
                <a href="/swe" class="nav-item nav-link"> <img class="img-fluid" src="img/icon-sweden.png" alt=""></a>
                <a href="/nor" class="nav-item nav-link"> <img class="img-fluid" src="img/icons8-norvège-48.png" alt=""></a>
            </div> --}}
            <a href="#home" class="nav-item nav-link">{{__('hero.navHome')}}</a>
            <a href="installation" class="nav-item nav-link">{{__('hero.navInstalation')}}</a>
            <a href="/blogs" class="nav-item nav-link">{{__('hero.navBlogs')}}</a>
            <a href="#about" class="nav-item nav-link ">{{__('hero.navAbout')}}</a>
            <a href="#pricing" class="nav-item nav-link">{{__('hero.navPricing')}}</a>
            
            <a href="#contact" class="nav-item nav-link">{{__('hero.navContact')}}</a>
            @if(session('userId'))
                <a href="/myOrders" class="nav-item nav-link">My Orders</a>
            
                <div class="dropdown ms-3">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ session('lastname') }}
                    </button>
                    <ul class="dropdown-menu p-2">
                        <form class="d-flex" action="{{route('logout')}}" method="POST">
                            @csrf
                            @method('DELETE')
                          <button  type="submit" class="btn btn-outline-warning w-100 p-2" type="submit">Déconnexion</button>
                        </form>
                    </ul>
                </div>
            @else
                <a  class="nav-item nav-link"><button class="btn btn-primary" data-bs-target="#loginUser" data-bs-toggle="modal">Login User</button></a>
            @endif

        </div>

    </div>
</nav>
