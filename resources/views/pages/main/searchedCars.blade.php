@extends('layouts.layout')

@section('title')
    Searched
@endsection
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
                    <div class="col-lg-8 col-md-7">
                        <h4>
                            <span class="heading ml-3">Searched cars</span>
                        </h4>
                    </div>
                    <div class="col-lg-4 col-md-5">
                        <div class="search-area mr-2">
                            <select class="selectpicker search-fields" name="sort" id="sort">
                                <option value="0">Sort By</option>
                                <option value="new" @if(old('sort') == 'new') selected @endif>Newest</option>
                                <option value="old" @if(old('sort') == 'old') selected @endif>Oldest</option>
                                <option value="desc" @if(old('sort') == 'desc') selected @endif>Highest price</option>
                                <option value="asc" @if(old('sort') == 'asc')selected @endif>Lower price</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12">

            </div>
            <div class="subtitle">
                {{$totalCars}} Result Found
            </div>
            <div class="col-lg-12 col-md-12">
                <h5>
                    <span class="heading">Searched: @foreach($searchedInputs as $value)
                            {{$value}}@if(!$loop->last)
                                ,
                            @endif
                        @endforeach
                 </span>
                </h5>
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
                            @component('pages.partials.homeCard', ['car' => $car , 'showOverlay' => true,'showSoldText' => false])
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

            $('#sort').change(function () {
                const url = new URL(window.location.href);
                let searchParams = new URLSearchParams(url.search);
                searchParams.set('sort', $(this).val());
                url.search = searchParams.toString();
                window.location.href = url.toString();
            })
        });
    </script>
@endsection
