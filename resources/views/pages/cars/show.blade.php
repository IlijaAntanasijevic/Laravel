@extends('layouts.layout')

@section('custom_links')
    <style>
        #headWishList {
            cursor: pointer;
            font-size: 28px;
            margin-top: 10px;
        }
        #bottomWishList {
            color: #ffc12b;
            font-size: 26px;
            cursor: pointer;
        }
        #compareCar {
            color: #ff0017;
            font-size: 26px;
            cursor: pointer;
        }
    </style>
@endsection
@section('content')
    @php
        $inWishList = $car->wishlist->where('user_id',Auth::id())->first();
    @endphp

    <div class="car-details-page content-area-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 widget-2">
                    <div id="carDetailsSlider" class="carousel car-details-sliders slide widget">
                        <div class="heading-car">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-left">
                                        <h3>{{$car->name}}</h3>
                                        <p><i class="fa fa-map-marker"></i> {{$car['user']['address']}}</p>
                                    </div>
                                    <div class="p-r">
                                        <h3>{{number_format($car->price,0,' ','.')}} $</h3>
                                        <span class="wishList {{$inWishList ? 'checked' : ''}}" data-id="{{$car->id}}" id="headWishList"><i class="fa fa-heart{{$inWishList != null ? '' : '-o'}}"  aria-hidden="true"></i></span>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <!-- main slider carousel items -->
                        <div class="carousel-inner">
                            <div class="active item carousel-item" data-slide-number="0">
                                <img src="{{asset('assets/img/'. $car->primary_image)}}" class="img-fluid" alt="car-17">
                            </div>
                            @foreach($car->images as $image )
                                <div class="item carousel-item" data-slide-number="1">
                                    <img src="{{asset('assets/img/' . $car->path)}}" class="img-fluid" alt="car-16">
                                </div>
                            @endforeach
                            <a class="carousel-control left" href="#carDetailsSlider" data-slide="prev"><i
                                    class="fa fa-angle-left"></i></a>
                            <a class="carousel-control right" href="#carDetailsSlider" data-slide="next"><i
                                    class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                    <div class="d-flex justify-content-around">
                        <p id="bottomWishList" class="wishList {{$inWishList ? 'checked' : ''}}" data-id="{{$car->id}}">Wish List <i class="fa fa-heart{{$inWishList ? '' : '-o'}}"></i></p>
                        <p id="compareCar">Compare Car <i class="fa fa-check-circle-o" aria-hidden="true"></i></p>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-12 slider">
                    <div class="tabbing tabbing-box cmn2-pad-t cmn-mrg-btm">
                        <ul class="nav nav-tabs" id="carTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" id="one-tab" data-toggle="tab" href="#one" role="tab"
                                   aria-controls="one" aria-selected="false">Vehicle Overview</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active show" id="two-tab" data-toggle="tab" href="#two" role="tab"
                                   aria-controls="two" aria-selected="false">Features & Safety</a>
                            </li>

                        </ul>
                        <div class="tab-content" id="carTabContent">
                            <div class="tab-pane fade " id="one" role="tabpanel" aria-labelledby="one-tab">
                              <p> {{$car->description}}</p>
                            </div>
                            <div class="tab-pane fade active show" id="two" role="tabpanel" aria-labelledby="two-tab">
                                <div class="features-opions">
                                    <div class="row justify-content-around">
                                    {{--  $car['features'][0]['safety']--}}
                                            <div class="col-md-4 col-sm-6">
                                                <h5 class="mb-4">Features</h5>

                                                <ul>
                                                    @foreach($car->equipment as $value)
                                                        <li>
                                                            <i class="fa fa-circle"></i>
                                                            {{ $value['name'] }}
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>


                                        <div class="col-md-4 col-sm-6">
                                            <h5 class="mb-4">Safety</h5>
                                            <ul>
                                                @foreach($car->safeties as $value)
                                                    <li>
                                                        <i class="fa fa-circle"></i>
                                                        {{ $value['name'] }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h3 class="heading">Specifications</h3>
                    <div class="amenities-box cmn-mrg-btm">
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <ul>
                                    <li><span><i class="flaticon-gas-pump"></i> Fuel Type: {{$car->engine['fuel']['name']}}</span></li>
                                    <li><span><i class="flaticon-road-with-broken-line"></i>Kilometers: {{number_format($car->kilometers)}}</span>
                                    </li>
                                    <li><span><i class="flaticon-engine"></i> Engine: {{$car->engine['engine_value']}}</span></li>
                                </ul>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <ul>
                                    <li><span><i class="flaticon-car"></i> Body: {{$car->model['body']['name']}}</span></li>
                                    <li><span><i class="flaticon-calendar"></i> Year: {{$car->model['year']}}</span></li>
                                    <li><span><i class="flaticon-gas-pump"></i> Fuel: {{$car->engine['fuel']['name']}}</span></li>
                                </ul>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <ul>
                                    <li><span><i class="flaticon-eco-energy-power"></i> Horse Power: {{$car->engine['horsepower']}}</span></li>
                                    <li><span><i class="flaticon-car-door"></i> Doors: {{$car->model['doors']['name']}}</span></li>
                                    <li><span><i class="flaticon-paint-palette-and-brush"></i> Color: {{ucfirst($car->color['name'])}}</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <h3 class="heading">Seller Information's</h3>
                    <div class="amenities-box cmn-mrg-btm">
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <ul>
                                    <li><span><i class="fa fa-user"></i> {{$car->user['name'] . ' ' .$car->user['last_name']}} </span></li>
                                    <li><span><i class="fa fa-envelope"></i> {{$car->user['email']}}</span></li>
                                </ul>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <ul>
                                    <li><span><i class="fa fa-phone"></i> {{$car->user['phone']}}</span></li>
                                    <li><span><i class="fa fa-car"></i>  {{$car->totalCars}}</span></li>
                                </ul>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <ul>
                                    <li><span><i class="fa fa-map-marker"></i> {{$car->user['address']}}</span></li>
                                    <li><span><i class="fa fa-home"></i>  {{$car->user['city']}}</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <div class="sidebar-right">
                        <!-- Specifications start -->
                        <div class="specifications widget d-none d-xl-block d-lg-block">
                            <h5 class="sidebar-title">Specifications</h5>
                            <ul>
                                <li>
                                    <span>Name</span>
                                    {{$car->name}}
                                </li>
                                <li>
                                    <span>Model</span>
                                    {{$car->model['name']}}
                                </li>
                                <li>
                                    <span>Body Style</span>
                                    {{$car->model['body']->name}}
                                </li>
                                <li>
                                    <span>Year</span>
                                    {{$car->model['year']}}
                                </li>
                                <li>
                                    <span>Kilometers</span>
                                    {{number_format($car->kilometers)}} km
                                </li>
                                <li>
                                    <span>Transmission</span>
                                    {{$car->engine['transmission']->name}}
                                </li>
                                <li>
                                    <span>Drivetrain</span>
                                    {{$car->drive_type['name']}}
                                </li>
                                <li>
                                    <span>Engine</span>
                                    {{substr($car->engine['engine_value'],0,2) / 10 . 'L '}}
                                </li>
                                <li>
                                   <span>Horse Power</span>
                                    {{$car->engine['horsepower']}} hp
                                </li>
                                <li>
                                    <span>Fuel Type</span>
                                    {{$car->engine['fuel']->name}}
                                </li>

                                <li>
                                    <span>Location</span>
                                    {{$car->user['city']}}
                                </li>
                            </ul>
                        </div>


                        <!-- Helping center start -->
                        <div class="widget helping-center">
                            <div class="media">
                                <i class="fa fa-mobile"></i>
                                <div class="media-body  align-self-center">
                                    <h5 class="mt-0">Contact Seller</h5>
                                    <h4><a href="{{$car->user['phone']}}">{{$car->user['phone']}}</a></h4>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@php
    $userId = Auth::id() ? Auth::id() : null;
@endphp

@section('custom_scripts')
    <script>
        $('.wishList').click(function (){
            let id = this.getAttribute('data-id');
            //let userId = {{Auth::id()}} ? {{Auth::id()}} : null;
            let userId = @json($userId);
            let headWishList = $('#headWishList');
            let bottomWishList = $('#bottomWishList');
            /*
             $('#headWishList').html('<i class="fa fa-heart-o" aria-hidden="true"></i>')
                        $('#bottomWishList').html('Wish List <i class="fa fa-heart-o" aria-hidden="true"></i>')
                        toastr.warning(message)
             */

            if(headWishList.hasClass('checked') && bottomWishList.hasClass('checked')){
                $.ajax({
                    url: '{{route('wishlist')}}',
                    method: 'DELETE',
                    data: {
                        carId: id,
                        userId: userId,
                        _token: '{{csrf_token()}}'
                    },
                    success: function(data) {
                        let message = data.message;

                        headWishList.removeClass('checked');
                        bottomWishList.removeClass('checked');
                        headWishList.html('<i class="fa fa-heart-o" aria-hidden="true"></i>')
                        bottomWishList.html('Wish List <i class="fa fa-heart-o" aria-hidden="true"></i>')

                        toastr.warning(message)
                    },
                    error: function (xhr, status, error){
                        if(xhr.status === 401){
                            toastr.error('You must be logged in to add to wishlist');
                        }
                        else if(xhr.status === 404){
                            toastr.error('Car not found in wishlist.');
                        }
                        else {
                            toastr.error('Something went wrong');
                        }
                    }
                })
            }
            else {
                $.ajax({
                    url: '{{route('wishlist')}}',
                    method: 'POST',
                    data: {
                        carId: id,
                        userId: userId,
                        _token: '{{csrf_token()}}'
                    },
                    success: function (data) {
                        let message = data.message;
                        headWishList.addClass('checked');
                        bottomWishList.addClass('checked');
                        headWishList.html('<i class="fa fa-heart" aria-hidden="true"></i>')
                        bottomWishList.html('Wish List <i class="fa fa-heart" aria-hidden="true"></i>')
                        toastr.success(message)
                    },
                    error: function (xhr){
                        if(xhr.status === 401){
                            toastr.error('You must be logged in to add to wishlist');
                        }
                        else {
                            toastr.error('Something went wrong');
                        }
                    }

                })
            }
        })
    </script>
@endsection


