@extends('layouts.layout')

@section('content')
    <div class="car-details-page content-area-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 widget-2">
                    <div id="carDetailsSlider" class="carousel car-details-sliders slide widget">
                        <div class="heading-car">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-left">
                                        <h3>{{$car['name']}}</h3>
                                        <p><i class="fa fa-map-marker"></i> {{$car['user']['address']}}</p>
                                    </div>
                                    <div class="p-r">
                                        <h3>{{number_format($car["price"],0,' ','.')}} $</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- main slider carousel items -->
                        <div class="carousel-inner">
                            <div class="active item carousel-item" data-slide-number="0">
                                <img src="{{asset('assets/img/'. $car['primary_image'])}}" class="img-fluid" alt="car-17">
                            </div>
                            @foreach($car['images'] as $image )
                                <div class="item carousel-item" data-slide-number="1">
                                    <img src="{{asset('assets/img/' . $image['path'])}}" class="img-fluid" alt="car-16">
                                </div>
                            @endforeach
                            <a class="carousel-control left" href="#carDetailsSlider" data-slide="prev"><i
                                    class="fa fa-angle-left"></i></a>
                            <a class="carousel-control right" href="#carDetailsSlider" data-slide="next"><i
                                    class="fa fa-angle-right"></i></a>
                        </div>
                    </div>

                    <!-- RESPONSIVE SPECIFICATIONS -->
                    <div class="widget specifications d-lg-none d-xl-none">
                        <h5 class="sidebar-title">Specifications</h5>
                        <ul>
                            {{--@foreach($car['model'] as $value)
                                <li>{{$value}}</li>
                            @endforeach--}}
                            {{--<li>
                                <span>Make</span>Toyota
                            </li>
                            <li>
                                <span>Model</span>Maxima
                            </li>
                            <li>
                                <span>Body Style</span>Convertible
                            </li>
                            <li>
                                <span>Condition</span>Brand New
                            </li>
                            <li>
                                <span>Year</span>2018
                            </li>
                            <li>
                                <span>Mileage</span>37,000 mi
                            </li>
                            <li>
                                <span>Transmission</span>6-speed Manual
                            </li>
                            <li>
                                <span>Interior Color</span>Dark Grey
                            </li>
                            <li>
                                <span>Engine</span>3.4L Mid-Engine V6
                            </li>
                            <li>
                                <span>Fuel Type</span>Gasoline Fuel
                            </li>
                            <li>
                                <span>No. of Gears:</span>5
                            </li>
                            <li>
                                <span>Location</span>Toronto
                            </li>--}}
                        </ul>
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
                              <p> {{$car['description']}}</p>
                            </div>
                            <div class="tab-pane fade active show" id="two" role="tabpanel" aria-labelledby="two-tab">
                                <div class="features-opions">
                                    <div class="row justify-content-around">
                                    {{--  $car['features'][0]['safety']--}}
                                            <div class="col-md-4 col-sm-6">
                                                <h5 class="mb-4">Features</h5>

                                                <ul>
                                                    @foreach($car['features'] as $value)
                                                        <li>
                                                            <i class="fa fa-circle"></i>
                                                            {{ $value['equipment']['name'] }}
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>


                                        <div class="col-md-4 col-sm-6">
                                            <h5 class="mb-4">Safety</h5>
                                            <ul>
                                                @foreach($car['features'] as $value)
                                                    <li>
                                                        <i class="fa fa-circle"></i>
                                                        {{ $value['safety']['name'] }}
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
                                    <li><span><i class="flaticon-gas-pump"></i> Fuel Type: {{$car['engine']['fuel']['name']}}</span></li>
                                    <li><span><i class="flaticon-road-with-broken-line"></i>Kilometers: {{number_format($car['kilometers'])}}</span>
                                    </li>
                                    <li><span><i class="flaticon-engine"></i> Engine: {{$car['engine']['engine_value']}}</span></li>
                                </ul>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <ul>
                                    <li><span><i class="flaticon-car"></i> Body: {{$car['model']['body']['name']}}</span></li>
                                    <li><span><i class="flaticon-calendar"></i> Year: {{$car['model']['year']}}</span></li>
                                    <li><span><i class="flaticon-gas-pump"></i> Fuel: {{$car['engine']['fuel']['name']}}</span></li>
                                </ul>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <ul>
                                    <li><span><i class="flaticon-eco-energy-power"></i> Horse Power: {{$car['engine']['horsepower']}}</span></li>
                                    <li><span><i class="flaticon-car-door"></i> Doors: {{$car['model']['doors']['name']}}</span></li>
                                    <li><span><i class="flaticon-paint-palette-and-brush"></i> Color: {{ucfirst($car['color']['name'])}}</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <h3 class="heading">Seller Information's</h3>
                    <div class="amenities-box cmn-mrg-btm">
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <ul>
                                    <li><span><i class="fa fa-user"></i> {{$car['user']['name'] . ' ' .$car['user']['last_name']}} </span></li>
                                    <li><span><i class="fa fa-envelope"></i> {{$car['user']['email']}}</span></li>
                                </ul>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <ul>
                                    <li><span><i class="fa fa-phone"></i> {{$car['user']['phone']}}</span></li>
                                    <li><span><i class="fa fa-car"></i>  1</span></li>
                                </ul>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <ul>
                                    <li><span><i class="fa fa-map-marker"></i> {{$car['user']['address']}}</span></li>
                                    <li><span><i class="fa fa-home"></i>  {{$car['user']['city']}}</span></li>
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
                                {{--@foreach($car as $value)

                                @dd($car['model']['body'])

                                @endforeach--}}
                                <li>
                                    <span>Name</span>
                                    {{$car['name']}}
                                </li>
                                <li>
                                    <span>Model</span>
                                    {{$car['model']['name']}}
                                </li>
                                <li>
                                    <span>Body Style</span>
                                    {{$car['model']['body']['name']}}
                                </li>
                                <li>
                                    <span>Year</span>
                                    {{$car['model']['year']}}
                                </li>
                                <li>
                                    <span>Kilometers</span>
                                    {{number_format($car['kilometers'])}} km
                                </li>
                                <li>
                                    <span>Transmission</span>
                                    {{$car['engine']['transmission']['name']}}
                                </li>
                                <li>
                                    <span>Drivetrain</span>
                                    {{$car['drive_type']['name']}}
                                </li>
                                <li>
                                    <span>Engine</span>
                                    {{substr($car['engine']['engine_value'],0,2) / 10 . 'L '}}
                                </li>
                                <li>
                                   <span>Horse Power</span>
                                    {{$car['engine']['horsepower']}} hp
                                </li>
                                <li>
                                    <span>Fuel Type</span>
                                    {{$car['engine']['fuel']['name']}}
                                </li>

                                <li>
                                    <span>Location</span>
                                    {{$car['user']['city']}}
                                </li>
                            </ul>
                        </div>


                        <!-- Helping center start -->
                        <div class="widget helping-center">
                            <div class="media">
                                <i class="fa fa-mobile"></i>
                                <div class="media-body  align-self-center">
                                    <h5 class="mt-0">Contact Seller</h5>
                                    <h4><a href="{{$car['user']['phone']}}">{{$car['user']['phone']}}</a></h4>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
