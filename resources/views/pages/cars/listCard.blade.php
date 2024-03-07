@php
    $inWishList = $car->wishlist->where('user_id',Auth::id())->first();
@endphp
<div class="car-box-5">
    <div class="row">
        <div class="col-lg-5 col-md-5 col-pad">
            <div class="car-thumbnail">
                <a href="{{route('cars.show', ['car' => $car->id])}}" class="car-img">
                    <img src="{{asset('assets/img/' . $car->primary_image)}}" alt="{{$car->name}}" class="img-fluid">
                </a>
                <div class="car-overlay">
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
        </div>
        <div class="col-lg-7 col-md-7 align-self-center col-pad">
            <div class="detail d-flex flex-column justify-content-around" style="height: inherit">
                <!-- title -->
                <h1 class="title">
                    <a href="{{route('cars.show', ['car' => $car->id])}}">{{$car->name}}</a>
                </h1>
                <!-- Location -->
                <div class="location">
                    <span>
                        <i class="fa fa-map-marker"></i>
                        {{$car->user['city']}}
                    </span>
                </div>
                <!-- car info -->
                <div class="car-info">
                    <span><i class="flaticon-car"></i>{{$car->model['body']->name}}</span>
                    <span><i class="flaticon-road-with-broken-line"></i>{{number_format($car->kilometers)}} km</span>
                    <span><i class="flaticon-gas-pump"></i>{{$car->engine['fuel']->name}}</span>
                </div>
                <div class="price-ratings-box">
                    <p class="price text-danger mr-4 ">
                        ${{number_format($car->price)}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>



