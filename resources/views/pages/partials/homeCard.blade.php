@php
    $inWishList = $car->wishlist->where('user_id',Auth::id())->first();

@endphp
<div class="col-lg-4 col-md-6 col-sm-6" >
    <div class="car-box ">
        <!-- car img -->
        <div class="car-thumbnail">
            <a href="{{route('cars.show', ['car' => $car->id])}}" class="car-img">
                <img src="{{asset('assets/img/' . $car->primary_image)}}" alt="{{$car->name}}" class="img-fluid">
            </a>
            <div class="car-overlay {{$showOverlay ? '' : 'd-none'}}">
                <a href="{{route('cars.show', ['car' => $car->id])}}" class="overlay-link">
                    <i class="fa fa-info"></i>
                </a>
                <span class="overlay-link wishList {{$inWishList ? 'checked' : ''}}" data-id="{{$car->id}}" id="carWish-{{$car->id}}">
                    <i class="fa fa-heart{{$inWishList != null ? '' : '-o'}} "></i>
                </span>

                <div class="car-magnify-gallery">
                    <a href="{{asset('assets/img/' . $car->primary_image)}}" class="overlay-link">
                        <i class="fa fa-expand"></i>
                    </a>
                    @foreach($car->images as $image)
                        <a href="{{asset('assets/img/' . $image['path'])}}" class="hidden" ></a>
                    @endforeach
                </div>
            </div>
        </div>
        <ul class="facilities-list clearfix">
            <li class="bordered-right">
                <i class="flaticon-car"></i>
                {{$car->model->body['name']}}
            </li>
            <li class="bordered-right">
                <i class="flaticon-road-with-broken-line"></i>
                {{number_format($car->kilometers)}} km
            </li>
            <li>
                <i class="flaticon-gas-pump"></i>
                {{$car->engine->fuel['name']}}
            </li>
        </ul>
        <!-- detail -->
        <div class="detail">
            <!-- title -->
            <h1 class="title">
                <a href="{{route('cars.show', ['car' => $car->id])}}">{{$car->name}}</a>
            </h1>
            <!-- Location -->
            <div class="location d-flex justify-content-between">
                <span>
                    <i class="fa fa-map-marker"></i>
                    {{$car->user['address']}}
                </span>
                <p class="text-dark font-weight-bold home-car-price">
                    {{number_format($car->price,0,' ','.')}}$
                </p>
            </div>
        </div>
        @if($showSoldText)
            @if($car->is_sold)
                <div class="alert alert-danger">
                    <p>This car is sold</p>
                </div>
            @endif
        @endif
    </div>

</div>






