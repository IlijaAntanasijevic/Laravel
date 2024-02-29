
<div class="col-lg-4 col-md-6 col-sm-6" >
    <div class="car-box ">
        <!-- car img -->
        <div class="car-thumbnail">
            <a href="car-details.html" class="car-img">
                <img src="{{asset('assets/img/' . $car["primary_image"])}}" alt="{{$car['name']}}" class="img-fluid">
            </a>
            <div class="car-overlay">
                <a href="{{route('cars.show', ['car' => $car['id']])}}" class="overlay-link">
                    <i class="fa fa-info"></i>
                </a>
                <div class="car-magnify-gallery">
                    <a href="{{asset('assets/img/' . $car['images'][0]['path'])}}" class="overlay-link">
                        <i class="fa fa-expand"></i>
                    </a>
                    @foreach($car['images'] as $image)
                        <a href="{{asset('assets/img/' . $image['path'])}}" class="hidden" ></a>
                    @endforeach

                </div>
            </div>
        </div>
        <ul class="facilities-list clearfix">
            <li class="bordered-right">
                <i class="flaticon-car"></i>
                {{$car['model']->body['name']}}
            </li>
            <li class="bordered-right">
                <i class="flaticon-road-with-broken-line"></i>
                {{number_format($car["kilometers"])}} km
            </li>
            <li>
                <i class="flaticon-gas-pump"></i>
                {{$car['engine']->fuel['name']}}
            </li>
        </ul>
        <!-- detail -->
        <div class="detail">
            <!-- title -->
            <h1 class="title">
                <a href="{{route('cars.show', ['car' => $car['id']])}}">{{$car["name"]}}</a>
            </h1>
            <!-- Location -->
            <div class="location d-flex justify-content-between">
                <a href="car-details.html">
                    <i class="fa fa-map-marker"></i>
                    {{$car['user']['address']}}
                </a>
                <p class="text-dark font-weight-bold home-car-price">
                    {{number_format($car["price"],0,' ','.')}}$
                </p>
            </div>

        </div>
    </div>
</div>
