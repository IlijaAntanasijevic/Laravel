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
{{--                                    <a class="nav-link " href="{{route($link["route"])}}">{{$link["name"]}}</a>--}}
                                    @if($link['name'] !== 'Login' && $link['name'] !== 'Register')
                                        <a class="nav-link " href="{{$link["route"]}}">{{$link["name"]}}</a>

                                    @endif
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
