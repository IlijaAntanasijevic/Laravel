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
                                <li class="nav-item ">
                                    <a class="nav-link " href="{{route($link["route"])}}">{{$link["name"]}}</a>
                                </li>
                            @endforeach

                            <li class="nav-item dropdown megamenu-li">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">Pages</a>
                                <div class="dropdown-menu megamenu" aria-labelledby="dropdown01">
                                    <div class="megamenu-area">
                                        <div class="row">
                                            <div class="col-sm-6 col-lg-3">
                                                <div class="megamenu-section">
                                                    <h6 class="megamenu-title">Pages</h6>
                                                    <a class="dropdown-item" href="car-comparison.html">Car
                                                        Comparison</a>

                                                    <a class="dropdown-item" href="car-list-rightside.html">Car
                                                        List</a>

                                                    <a class="dropdown-item" href="car-details-3.html">Car
                                                        details</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                            </li>

                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
