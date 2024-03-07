<footer class="footer">
    <div class="container footer-inner">
        <div class="row">
            <div class="col-xl-4 col-lg-3 col-md-6 col-sm-6">
                <div class="footer-item">
                    <h4>Contact Us</h4>

                    <ul class="contact-info">
                        <li>
                            Address: 20/F Green Road, Dhanmondi, Dhaka
                        </li>
                        <li>
                            Email: <a href="mailto:themevessel.us@gmail.com">themevessel.us@gmail.com</a>
                        </li>
                        <li>
                            Phone: <a href="tel:+0477-85x6-552">+0477 85X6 552</a>
                        </li>
                        <li>
                            Fax: +0477 85X6 552
                        </li>
                    </ul>

                    <ul class="social-list clearfix">
                        <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" class="google"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#" class="rss"><i class="fa fa-rss"></i></a></li>
                        <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                <div class="footer-item">
                    <h4>
                        Useful Links
                    </h4>
                    <ul class="links">
                        @foreach($menu as $link)
                            <li>
                                <a href="{{route($link["route"])}}"><i class="fa fa-angle-right"></i>{{$link["name"]}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                @if(Auth::check())
                    <h4>
                        Useful Links
                    </h4>
                    <ul class="links">
                        <li>
                            <a href="{{route('profile.cars')}}"><i class="fa fa-angle-right"></i>Your Cars</a>
                        </li>
                        <li>
                            <a href="{{route('wishlist.index')}}"><i class="fa fa-angle-right"></i>Wish List</a>
                        </li>
                        <li>
                            <a href="{{route('profile.index')}}"><i class="fa fa-angle-right"></i>Profile</a>
                        </li>
                    </ul>
                @endif
            </div>
            <div class="col-xl-4 col-lg-4 col-md-8 col-sm-6 text-center d-flex flex-column">
                <a href="#" class="h1" style="font-size: 2rem">DOCUMENTATION</a>
                <a href="#" class="mt-5" style="font-size: 1.5rem">Author</a>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <p class="copy">&copy; 2022 <a href="#" target="_blank">Ilija Antanasijevic 48/21</a></p>
            </div>
        </div>
    </div>
</footer>
