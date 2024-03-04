
<header class="top-header top-header-bg d-none d-xl-block d-lg-block d-md-block" id="top-header-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="list-inline">
                    <a href="tel:1-8X0-666-8X88"><i class="fa fa-phone"></i>1-8X0-666-8X88</a>
                    <a href="tel:themevessel.us@gmail.com"><i
                            class="fa fa-envelope"></i>themevessel.us@gmail.com</a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <ul class="top-social-media pull-right">
                    <li>
                        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
                    </li>
                    <li>
                        <a href="#" class="linkedin"><i class="fa fa-linkedin"></i> </a>
                    </li>
                    <li>
                        <a href="#" class="rss"><i class="fa fa-instagram"></i></a>
                    </li>
                    <li>
                        <a >|</a>
                    </li>
                    @if(!Auth::check())
                        <li>
                            <a href="{{route('login')}}" class="sign-in"><i class="fa fa-sign-in"></i> Login </a>
                        </li>
                        <li>
                            <a href="{{route('register')}}" class="sign-in"><i class="fa fa-user"></i>Register</a>
                        </li>
                    @else
                        <li>
                            <a class="sign-in" href="#"> {{ Auth::user()->name }} <i class="fa fa-user" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a >|</a>
                        </li>
                        <li>
                            <form action="{{route('logout')}}" method="POST" id="logoutForm">
                                @csrf
                                <input type="submit" value="Log out" class="sign-in" id="logout" style="margin-top: 0px">
                            </form>
                        </li>
                    @endif

                </ul>
            </div>
        </div>
    </div>
</header>
<style>
    #logout {
        border: none;
        background: none;
        cursor: pointer;
        color: #ff0017;
    }
</style>

