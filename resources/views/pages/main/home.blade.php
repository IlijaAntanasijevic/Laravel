@extends('layouts.layout')

@section('title') Home @endsection

@section('content')
    @include('pages.cars.homeSearchBar')
    <div class="featured-car content-area-2">
        <div class="container">
            <div class="main-title">
                <h1>Featured Car</h1>
            </div>
            <div class="row">
                @foreach($cars as $car)
                    @include('pages.cars.homeCard',$car)
                @endforeach
            </div>
            <div class="row justify-content-center h1 mt-5">
                <div id="showMoreHome">View more</div>
            </div>
        </div>
    </div>
@endsection