@extends('layouts.layout')

@section('title')
    Cars
@endsection
@section('custom_links')
    <style>
        .pagination {
            margin: 55px 0px;
        }

        .page-item.active .page-link {
            background-color: red;
        }

        .page-link .active {
            background-color: red;
        }


    </style>
@endsection
@section('content')
    <div class="page_loader"></div>
    <div class="car-list-rightside content-area-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="option-bar d-none d-xl-block d-lg-block d-md-block d-sm-block">
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-5 col-sm-5">
                                <h4 class="ml-4">
                                    <span class="heading">Available cars</span>
                                </h4>
                            </div>

                        </div>
                    </div>
                    <div class="subtitle">
                        {{$totalCars}} Result Found
                    </div>

                    @foreach($cars as $car)

                        @component('pages.partials.listCard', ['car' => $car])
                        @endcomponent
                    @endforeach
                    {{$cars->links()}}
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="sidebar-right">
                        <!-- Search area start -->
                        <div class="widget search-area">
                            <h5 class="sidebar-title">Find your Car</h5>
                            <div class="search-area-inner">
                                <div class="search-contents ">
                                    <form method="GET" action="{{route('cars.index')}}">
                                        <x-drop-down
                                                name="brand"
                                                id="brandCarList"
                                                first-option-text="Chose One"
                                                first-option-value="0"
                                                :options="$data['brands']"
                                                label="Brand"/>

                                        <x-drop-down
                                                name="model"
                                                id="modelCarList"
                                                first-option-text="Chose One"
                                                first-option-value="0"
                                                :options="[]"
                                                disabled="true"
                                                label="Model"/>
                                        <x-drop-down
                                                name="body"
                                                id="bodyCarList"
                                                first-option-text="Chose One"
                                                :options="$data['bodies']"
                                                label="Body Type"/>
                                        <div class="form-group">
                                            <label>Year From</label>
                                            <select class="selectpicker search-fields" name="yearFrom">
                                                <option value="0">Choose One</option>
                                                @for($i = 2024; $i >= 1980; $i--)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>


                                        <x-drop-down
                                                name="transmission"
                                                id="transmissionCarList"
                                                first-option-text="Chose One"
                                                first-option-value="0"
                                                :options="$data['transmission']"
                                                label="Transmission"/>
                                        <div class="form-group">
                                            <label>Sort By</label>
                                            <select class="selectpicker search-fields" name="sort">
                                                <option value="new" @if(old('sort') == 'new') selected @endif>Newest
                                                </option>
                                                <option value="old" @if(old('sort') == 'old') selected @endif>Oldest
                                                </option>
                                                <option value="desc" @if(old('sort') == 'desc') selected @endif>Highest
                                                    price
                                                </option>
                                                <option value="asc" @if(old('sort') == 'asc')selected @endif>Lower
                                                    price
                                                </option>
                                            </select>
                                        </div>
                                        <br>
                                        <button class="search-button btn-md btn-color" type="submit">Search</button>
                                    </form>
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
                $(document).ready(function () {
                    $('.page_loader').remove();
                    $('.wishList').click(function () {
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
                                    let message = data.message;
                                    $('#carWish-' + carId).removeClass('checked');
                                    $('#carWish-' + carId).html('<i class="fa fa-heart-o" aria-hidden="true"></i>')
                                    toastr.warning(message)
                                },
                                error: function (xhr) {
                                    if (xhr.status === 401) {
                                        toastr.error('You must be logged in to add to wishlist');
                                    } else if (xhr.status === 404) {
                                        toastr.error('Car not found in wishlist.');
                                    } else {
                                        toastr.error('Something went wrong');
                                    }
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
                                    if (xhr.status === 401) {
                                        toastr.error('You must be logged in to add to wishlist');
                                    } else {
                                        toastr.error('Something went wrong');
                                    }
                                }

                            })
                        }
                    })


                    // ** Model Dropdown ** //
                    $('#brandCarList').change(function () {
                        let brandId = $(this).val();
                        if (brandId === '0') {
                            $('#modelCarList').html('<option value="0">Model</option>');
                            $('#modelCarList').attr('disabled', 'disabled');
                            return;
                        }
                        $.ajax({
                            url: "{{route('get.models')}}",
                            data: {
                                id: brandId
                            },
                            method: 'GET',
                            success: function (response) {
                                let options = '<option value="0">Model</option>';
                                response.forEach(function (model) {
                                    options += `<option value="${model.id}">${model.name}</option>`;
                                });
                                $('#modelCarList').html(options);
                                $('#modelCarList').removeAttr('disabled');
                            }
                        });
                    });
                    // ** End Model DDL ** //
                })
            </script>
@endsection

