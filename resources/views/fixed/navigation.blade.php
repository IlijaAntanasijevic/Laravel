<header class="main-header" id="main-header-2">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg navbar-light rounded">
                    <a class="navbar-brand logo" href="{{route("home")}}">
                        <img src="{{asset('assets/img/logos/logo.png')}}" alt="logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar"
                            aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="fa fa-bars"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbar">
                        <ul class="navbar-nav ml-auto">
                            @foreach($menu as $link)
                                <li class="nav-item @if(request()->routeIs($link->route)) active @endif">
                                    <a class="nav-link " href="{{route($link["route"])}}">{{$link["name"]}}</a>
                                </li>
                            @endforeach
                        @if(Auth::check())
                            <li class="nav-item @if(request()->routeIs('cars.create')) active @endif" >
                                <a href="{{route('cars.create')}}" class="nav-link text-danger">Sell Car</a>
                            </li>
                            <li class="nav-item @if(request()->routeIs('wishlist.index')) active @endif">
                                <a class="nav-link" href="{{route('wishlist.index')}}"> <i class="fa fa-heart-o"></i></a>
                            </li>
                        @endif
                        @if(Auth::check() && Auth::user()->role_id == 2)
                            {{--<li class="nav-item @if(request()->routeIs('admin.index')) active @endif">
                                <a class="nav-link" href="{{route('admin.index')}}">Admin</a>
                            </li>--}}
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('admin.index')}}">Admin</a>
                                    </li>
                        @endif
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
