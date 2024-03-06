@extends('layouts.layout')

@section('title') Searched @endsection
@section('custom_links')
    <style>
        .pagination {
            margin: 55px 0px;
            /*position: absolute;
            top: 100%;
            left: 20%;*/
        }
        .page-item.active .page-link {
            background-color: red;
        }
        .page-link .active {
            background-color: red;
        }
        .content-area-2 {
            padding: 20px 0px 30px 0px;
        }



    </style>
@endsection
@section('content')
    <div class="page_loader"></div>

    <div class="car-list-fullwidth content-area-2">
        <div class="container">
            <div class="option-bar d-none d-xl-block d-lg-block d-md-block d-sm-block">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-5 col-sm-5">
                        <h4>
                            <span class="heading ml-3">Searched: BMW, M5 ,...</span>
                        </h4>
                    </div>
                    <div class="col-lg-8 col-md-7 col-sm-7">
                        <div class="search-area mr-2">
                            <select class="selectpicker search-fields" name="location">
                                <option>High to Low</option>
                                <option>Low to High</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="subtitle">
                20 Result Found
            </div>
            <div class="featured-car content-area-2">
                <div class="container">
                   {{-- <div class="main-title">
                        <h1 id="homeTitle">Newest Car</h1>
                        <h3 class="text-left" id="searchedTitle"></h3>
                        <h1 id="titleError" class="text-danger">No cars found</h1>
                    </div>--}}
                    <div class="row" id="showCars">
                        @foreach($cars as $car)
                                @component('pages.cars.homeCard', ['car' => $car , 'showOverlay' => true])
                                @endcomponent
                        @endforeach
                    </div>
                    {{$cars->links()}}
                </div>
            </div>
        </div>
    </div>

@endsection


@section('custom_scripts')
    <script>
        $(document).ready(function () {
            $('.page_loader').remove();
        });
    </script>
@endsection
