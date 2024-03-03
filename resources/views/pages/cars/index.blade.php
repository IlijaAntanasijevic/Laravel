@extends('layouts.layout')

@section('title') Cars @endsection

@section('content')
    <div class="car-list-rightside content-area-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="option-bar d-none d-xl-block d-lg-block d-md-block d-sm-block">
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-5 col-sm-5">
                                <h4 class="ml-4">
                                    <span class="heading">Car List</span>
                                </h4>
                            </div>
                            <div class="col-lg-8 col-md-7 col-sm-7">
                                <div class="search-area mr-4">
                                    <select class="selectpicker search-fields" name="location">
                                        <option value="0">Sort By</option>
                                        <option value="price-asc">Highest price</option>
                                        <option value="price-desc">Lower price</option>
                                        <option value="new">Newest</option>
                                        <option value="old">Oldest</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="subtitle">
                        20 Result Found
                    </div>

                    @foreach($cars as $car)

                        @component('pages.cars.listCard', ['car' => $car])
                        @endcomponent
                    @endforeach

                    <div class="pagination-box hidden-mb-45">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#"><span aria-hidden="true">«</span></a></li>
                                <li class="page-item"><a class="page-link active" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#"><span aria-hidden="true">»</span></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="sidebar-right">
                        <!-- Search area start -->
                        <div class="widget search-area">
                            <h5 class="sidebar-title">Find your Car</h5>
                            <div class="search-area-inner">
                                <div class="search-contents ">
                                    <form method="GET">
                                        <x-drop-down
                                            name="brand"
                                            id="brandCarList"
                                            first-option-text="Chose One"
                                            :options="$data['brands']"
                                            label="Brand"/>

                                        <x-drop-down
                                            name="model"
                                            id="modelCarList"
                                            first-option-text="Chose One"
                                            :options="[]"
                                            disabled="true"
                                            label="Model"/>

                                        <div class="form-group">
                                            <label>Year from</label>
                                            <select class="selectpicker search-fields" name="yearFrom">
                                                <option>Choose One</option>
                                                @for($i = 2024; $i >= 1980; $i--)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <x-drop-down
                                            name="body"
                                            id="bodyCarList"
                                            first-option-text="Chose One"
                                            :options="$data['bodies']"
                                            label="Body Type"/>

                                        <x-drop-down
                                            name="transmission"
                                            id="transmissionCarList"
                                            first-option-text="Chose One"
                                            :options="$data['transmission']"
                                            label="Transmission"/>

                                        <br>
                                        <button class="search-button btn-md btn-color">Search</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
