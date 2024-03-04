@extends('layouts.layout')

@section('title') Car Comparison @endsection
@php
$generalInformations = ['Engine Type', 'Kilometers', 'Fuel Type', 'Price', 'Vehicle Type', 'Transmission', 'Colour', 'Seats'];
$attributesToDisplay = ['model', 'engine', 'drive_type'];
$attributesValues = ['name','engine_value','name'];

    $show = true;

    if(!count($cars)){
        $show = false;
    }
    else {
        $firsCar = $cars[0];
        $secondCar = isset($cars[1]) ? $cars[1] : null;
    }
    dd($cars);
    die;

@endphp
@section('content')

    @if($show)
    <div class="">
        <div class="comparison content-area-2">
            <div class="container">
                <div class="row">
                    @foreach($cars as $car)
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="card Compare-car">
                                <img class="card-img-top img-fluid" src="{{asset('assets/img/') .'/' .$car->primary_image}}" alt="{{$car->name}}">
                                <div class="card-body detail">
                                    <div class="pull-left">
                                        <a href="{{route('cars.show', ['car' => $car->id])}}" class="h5">{{$car->name}}</a>
                                        <h6>${{number_format($car->price)}}</h6>
                                    </div>
                                    <div class="pull-right">
                                        <form action="{{route('compare')}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <input type="hidden" name="carId" value="{{$car->id}}">
                                            <button type="submit" class="btn btn-danger">Remove</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
        <div class="comparison faq content-area-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div id="faq" class="faq-accordion">
                            <div class="card m-b-0">
                                <div class="card-header">
                                    <a class="card-title" data-toggle="collapse" data-parent="#faq" href="#collapse1">
                                        General Information
                                    </a>
                                </div>
                                <div id="collapse1" class="card-block collapse show">
                                    <div class="compare-table">
                                        <table>
                                            <tbody>
                                            <tr>
                                                <td> Engine Type </td>
                                                @foreach($cars as $car)
                                                    <td>{{$car->engine['engine_value']}} L</td>
                                                @endforeach

                                            </tr>
                                            <tr>
                                                <td> Kilometers </td>
                                                @foreach($cars as $car)
                                                    <td> {{number_format($car->kilometers)}} km</td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <td> Fuel Type </td>
                                                @foreach($cars as $car)
                                                    <td> {{$car->engine['fuel']->name}}</td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <td> Price </td>
                                                @foreach($cars as $car)
                                                    <td> ${{number_format($car->price)}}</td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <td> Vehicle Type </td>
                                                @foreach($cars as $car)
                                                    <td> {{$car->drive_type['name']}}</td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <td> Transmission </td>
                                                @foreach($cars as $car)
                                                    <td> {{$car->engine['transmission']->name}}</td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <td> Color </td>
                                                @foreach($cars as $car)
                                                    <td> {{ucfirst($car->color['name'])}}</td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <td> Seats </td>
                                                @foreach($cars as $car)
                                                    <td> {{$car->model['seat']->value}} Seats </td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <td> Doors </td>
                                                @foreach($cars as $car)
                                                    <td> {{$car->model['doors']->name}}  </td>
                                                @endforeach
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="card-header">
                                    <a class="card-title collapsed" data-toggle="collapse" data-parent="#faq" href="#collapse3">
                                        Extra feature
                                    </a>
                                </div>
                                <div id="collapse3" class="card-block collapse">
                                    <div class="compare-table">
                                        <table>
                                            <tbody>
                                            @foreach($equipments as $equipment)
                                                @if($firsCar->equipment->contains($equipment->id) && isset($secondCar) && $secondCar->equipment->contains($equipment->id))
                                                    <tr>
                                                        <td> {{$equipment->name}} </td>
                                                        <td> <i class="fa fa-check"></i></td>
                                                        @if(isset($secondCar))
                                                            <td> <i class="fa fa-check"></i></td>
                                                        @endif
                                                    </tr>
                                                @elseif($firsCar->equipment->contains($equipment->id))
                                                    <tr>
                                                        <td> {{$equipment->name}} </td>
                                                        <td> <i class="fa fa-check"></i></td>
                                                        @if(isset($secondCar))
                                                            <td> <i class="fa fa-times"></i></td>
                                                        @endif

                                                    </tr>
                                                @elseif(isset($secondCar) && $secondCar->equipment->contains($equipment->id))
                                                    <tr>
                                                        <td> {{$equipment->name}} </td>
                                                        <td> <i class="fa fa-times"></i></td>
                                                        <td> <i class="fa fa-check"></i></td>
                                                    </tr>
                                                @endif

                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="card-header border-0">
                                    <a class="card-title collapsed" data-toggle="collapse" data-parent="#faq" href="#collapse4">
                                        Safety & Security
                                    </a>
                                </div>
                                <div id="collapse4" class="card-block collapse">
                                    <div class="compare-table">
                                        <table>
                                            <tbody>
                                            @foreach($safeties as $safety)
                                                @if($firsCar->safeties->contains($safety->id) && isset($secondCar) && $secondCar->safeties->contains($safety->id))
                                                    <tr>
                                                        <td> {{$safety->name}} </td>
                                                        <td> <i class="fa fa-check"></i></td>
                                                        @if(isset($secondCar))
                                                            <td> <i class="fa fa-check"></i></td>
                                                        @endif
                                                    </tr>
                                                @elseif($firsCar->safeties->contains($safety->id))
                                                    <tr>
                                                        <td> {{$safety->name}} </td>
                                                        <td> <i class="fa fa-check"></i></td>
                                                        @if(isset($secondCar))
                                                            <td> <i class="fa fa-times"></i></td>
                                                        @endif
                                                    </tr>
                                                @elseif(isset($secondCar) && $secondCar->safeties->contains($safety->id))
                                                    <tr>
                                                        <td> {{$safety->name}} </td>
                                                        <td> <i class="fa fa-times"></i></td>
                                                        <td> <i class="fa fa-check"></i></td>
                                                    </tr>
                                                @endif

                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
        <div class="my-5">
            <p class="text-danger text-center h2">Doesn't have cars to compare</p>
        </div>
    @endif
@endsection
