@extends('layouts.admin')

@section('title') Dashboard @endsection
@section('content')
                <div class="row column1">
                    <div class="col-md-6 col-lg-3">
                        <div class="full counter_section margin_bottom_30">
                            <div class="couter_icon">
                                <div>
                                    <i class="fa fa-users yellow_color"></i>
                                </div>
                            </div>
                            <div class="counter_no">
                                <div>
                                    <p class="total_no">{{$totalUsers}}</p>
                                    <p class="head_couter">Total users</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="full counter_section margin_bottom_30">
                            <div class="couter_icon">
                                <div>
                                    <i class="fa fa-car blue1_color"></i>
                                </div>
                            </div>
                            <div class="counter_no">
                                <div>
                                    <p class="total_no">{{$totalCars}}</p>
                                    <p class="head_couter">Total cars</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="full counter_section margin_bottom_30">
                            <div class="couter_icon">
                                <div>
                                    <i class="fa fa-info-circle green_color"></i>
                                </div>
                            </div>
                            <div class="counter_no">
                                <div>
                                    <p class="total_no">{{$totalSoldCars}}</p>
                                    <p class="head_couter">Sold Cars</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="full counter_section margin_bottom_30">
                            <div class="couter_icon">
                                <div>
                                    <i class="fa fa-heart red_color"></i>
                                </div>
                            </div>
                            <div class="counter_no">
                                <div>
                                    <p class="total_no">{{$totalSavedCars}}</p>
                                    <p class="head_couter">Total Saved Cars</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Car approval-->
                <div class="midde_cont">
                    <div class="container-fluid">
                        <div class="row column_title">
                            <div class="col-md-12">
                                <div class="page_title">
                                    <h2>Cars</h2>
                                </div>
                            </div>
                        </div>
                        <!-- row -->
                        <div class="row column1">
                            <div class="col-md-12">
                                <div class="white_shd full margin_bottom_30">
                                    <div class="full graph_head">
                                        <div class="heading1 margin_0">
                                            <h2>Car approval</h2>
                                        </div>
                                    </div>
                                    <div class="full price_table padding_infor_info">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="table-responsive-sm">
                                                    <table class="table table-striped projects {{count($carsToApprove) == 0 ? 'd-none' : ''}}">
                                                        <thead class="thead-dark">
                                                        <tr class="text-center">
                                                            <th style="width: 2%">No</th>
                                                            <th>Car Name</th>
                                                            <th >Model</th>
                                                            <th>Date posted</th>
                                                            <th>Status</th>
                                                            <th>View</th>
                                                            <th>Delete</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($carsToApprove as $key => $car)
                                                            <tr class="text-center" id="car-{{$car->id}}">
                                                                <td>{{$key}}</td>
                                                                <td>{{$car->name}}</td>
                                                                <td>{{$car->model['name']}}</td>
                                                                <td>{{$car->created_at}}</td>
                                                                <td>
                                                                    <a href="#" id="{{$car->id}}" class="btn btn-warning btn-xs approveCar">Approve</a>
                                                                </td>
                                                                <td>
                                                                    <a href="{{route('admin.car.show',[$car->id])}}" class="btn btn-info btn-xs">View</a>
                                                                </td>
                                                                {{--Popup to send email why is deleted--}}
                                                                <td>
                                                                    <a href="#" class="btn btn-danger btn-xs deleteCar" id="{{$car->id}}">Delete</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                    @if(!count($carsToApprove))
                                                        <div class="alert alert-danger">
                                                            <p>No cars to approve</p>
                                                        </div>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



@endsection

