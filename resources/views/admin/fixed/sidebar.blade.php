<nav id="sidebar">
    <div class="sidebar_blog_1">
        <div class="sidebar-header">
            <div class="logo_section">
                <a href="index.html"><img class="logo_icon img-responsive" src="{{asset('assets/img/avatar/' . Auth::user()->avatar )}}" alt="#"/></a>
            </div>
        </div>
        <div class="sidebar_user_info">
            <div class="icon_setting"></div>
            <div class="user_profle_side">
                <div class="user_img"><img class="img-responsive" src="{{asset('assets/img/avatar/' . Auth::user()->avatar )}}" alt="#" />
                </div>
                <div class="user_info">
                    <h6>{{Auth::user()->name . ' '.Auth::user()->last_name}}</h6>
                    <p><span class="online_animation"></span> Online</p>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar_blog_2">
        <h4>General</h4>
        <ul class="components">
            <li>
                <a href="{{route('admin.index')}}">
                    <i class="fa fa-dashboard yellow_color"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.users')}}">
                    <i class="fa fa-users green_color"></i>
                    <span>Users</span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.cars')}}">
                    <i class="fa fa-car blue1_color"></i>
                    <span>Cars</span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.wishlist')}}">
                    <i class="fa fa-heart red_color"></i>
                    <span>Wishlist</span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.edit')}}">
                    <i class="fa fa-cogs orange_color2"></i>
                    <span>Update</span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.cars.sold')}}">
                    <i class="fa fa-rocket " style="color: #0ea432"></i>
                    <span>Sold Cars</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
