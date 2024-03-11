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

@php
    $userId = Auth::id() ? Auth::id() : null;

@endphp


@section('custom_scripts')
    <script>
        $(document).ready(function () {
            $('.page_loader').remove();


            let queryString = window.location.search;
            let params = {};

            if(queryString){
                queryString = queryString.substring(1);
                let keyValues = queryString.split('&');
                keyValues.forEach(function (keyValue) {
                    let value = keyValue.split('=');
                    params[value[0]] = value[1];
                });
            }
            else {
                params = null;
            }
            if(params && params.sort){
                $('#sort').val(params.sort);
            }

            $('#sort').change(function () {
                const url = new URL(window.location.href);
                let searchParams = new URLSearchParams(url.search);
                searchParams.set('sort', $(this).val());
                searchParams.set('page', 1);
                url.search = searchParams.toString();

                window.location.href = url.toString();
            })

            // ** Wishlist ** //
            $(document).on('click', '.wishList', function () {
                let carId = $(this).data('id');
                let userId = @json($userId);


                if ($(this).hasClass('checked')) {
                    $.ajax({
                        url: '{{route('remove.wishlist')}}',
                        method: 'DELETE',
                        data: {
                            carId: carId,
                            userId: userId,
                            _token: '{{csrf_token()}}'
                        },
                        success: function (data) {
                            $('#carWish-' + carId).removeClass('checked');
                            $('#carWish-' + carId).html('<i class="fa fa-heart-o" aria-hidden="true"></i>')
                            toastr.warning(data.message);
                        },
                        error: function (xhr) {
                            if (xhr.status === 401) {
                                toastr.error('You must be logged in to add to wishlist');
                            }
                            else if(xhr.status === 400){
                                toastr.error("You can't add your own car to wishlist.");
                            }
                            else {
                                toastr.error(xhr.responseJSON.message);

                            }
                            //toastr.error(xhr.responseJSON.message);
                        }
                    })
                } else {
                    $.ajax({
                        url: '{{route('wishlist')}}',
                        method: 'POST',
                        data: {
                            carId: carId,
                            userId: userId,
                            _token: '{{csrf_token()}}'
                        },
                        success: function (data) {
                            let message = data.message;
                            $('#carWish-' + carId).addClass('checked');
                            $('#carWish-' + carId).html('<i class="fa fa-heart" aria-hidden="true"></i>')
                            toastr.success(message)
                        },
                        error: function (xhr) {
                            console.log(xhr)
                            if (xhr.status === 401) {
                                toastr.error('You must be logged in to add to wishlist');
                            }
                            else if(xhr.status === 400){
                                toastr.error("You can't add your own car to wishlist.");
                            }
                            else {
                                toastr.error(xhr.responseJSON.message);

                            }
                        }

                    })
                }
            })
        });
    </script>
@endsection
