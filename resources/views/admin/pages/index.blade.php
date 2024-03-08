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
                                    <p class="total_no">250</p>
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
                                    <p class="total_no">50</p>
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
                                    <p class="total_no">1,805</p>
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
                                    <p class="total_no">54</p>
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
                                                    <table class="table table-striped projects">
                                                        <thead class="thead-dark">
                                                        <tr>
                                                            <th style="width: 2%">No</th>
                                                            <th class="text-center">Car Name</th>
                                                            <th class="text-center" >Model</th>
                                                            <th class="text-center">Date posted</th>
                                                            <th class="text-center">Status</th>
                                                            <th class="text-center">View</th>
                                                            <th class="text-center">Delete</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                            @for($i = 1; $i < 10; $i++)
                                                                <tr>
                                                                <td>1</td>
                                                                <td class="text-center">
                                                                    <p>Car {{$i}}</p>
                                                                </td>
                                                                <td class="text-center">
                                                                    <p>Model {{$i}}</p>
                                                                </td>
                                                                <td class="text-center">
                                                                    <p>2021-05-20</p>
                                                                </td>
                                                                <td class="text-center">
                                                                    <a href="#" class="btn btn-warning btn-xs">Approve</a>
                                                                </td>
                                                                    <td class="text-center">
                                                                        <a href="#" class="btn btn-info btn-xs">View</a>
                                                                    </td>
                                                                    {{--Popup to send email why is deleted--}}
                                                                    <td class="text-center">
                                                                        <a href="#" class="btn btn-danger btn-xs">Delete</a>
                                                                    </td>
                                                                </tr>
                                                            @endfor
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
                        </div>
                    </div>
                    <!-- end dashboard inner -->
                </div>

            </div>

        </div>
    </div>
@endsection
