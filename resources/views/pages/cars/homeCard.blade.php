<div class="col-lg-4 col-md-6 col-sm-6" >
    <div class="car-box ">
        <!-- car img -->
        <div class="car-thumbnail">
            <a href="car-details.html" class="car-img">
                <img src="{{asset('assets/img/' . $car["img"])}}" alt="car-1" class="img-fluid">
            </a>
            <div class="car-overlay">
                <a href="car-details.html" class="overlay-link">
                    <i class="fa fa-info"></i>
                </a>
                {{--     OSTALE SLIKE OVDE TREBA, FOREACH           --}}
                <div class="car-magnify-gallery">
                    <a href="{{asset('assets/img/car-1.jpg')}}" class="overlay-link">
                        <i class="fa fa-expand"></i>
                    </a>
                    <a href="{{asset('assets/img/car-10.jpg')}}" class="hidden"></a>
                    <a href="{{asset('assets/img/car-5.jpg')}}" class="hidden"></a>
                </div>
            </div>
        </div>
        <ul class="facilities-list clearfix">
            <li class="bordered-right">
                <i class="flaticon-car"></i>
                {{$car['type']}}
            </li>
            <li class="bordered-right">
                <i class="flaticon-road-with-broken-line"></i>
                {{$car["km"]}}
            </li>
            <li>
                <i class="flaticon-gas-pump"></i>
                {{$car["fuelType"]}}
            </li>
        </ul>
        <!-- detail -->
        <div class="detail">
            <!-- title -->
            <h1 class="title">
                <a href="car-details.html">{{$car["name"]}}</a>
            </h1>
            <!-- Location -->
            <div class="location d-flex justify-content-between">
                <a href="car-details.html">
                    <i class="fa fa-map-marker"></i>
                    {{$car["location"]}}
                </a>
                <p class="text-dark font-weight-bold home-car-price">
                    {{$car["price"]}}$
                </p>
            </div>

        </div>
    </div>
</div>
