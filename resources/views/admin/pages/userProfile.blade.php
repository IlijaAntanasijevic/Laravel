@extends('layouts.admin')

@section('title') Profile @endsection
@section('content')
    <div class="row column1">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head">
                    <div class="heading1 margin_0">
                        <h2>User profile</h2>
                    </div>
                </div>
                <div class="full price_table padding_infor_info">
                    <div class="row">
                        <!-- user profile section -->
                        <!-- profile image -->
                        <div class="col-lg-12">
                            <div class="full dis_flex center_text mb-5">
                                <div class="profile_img"><img width="180" class="rounded-circle" src="{{asset('assets/img/avatar') .'/'. $user->avatar}}" alt="#" /></div>
                                <div class="profile_contant">
                                    <div class="contact_inner">
                                        <h3>{{$user->name}}  {{$user->last_name}}</h3>
                                        <p><strong>About: </strong>
                                            {{ $user->role_id == 1 ? 'User' : 'Admin'}}
                                        </p>
                                        <ul class="list-unstyled">
                                            <li><i class="fa fa-envelope-o"></i> : {{$user->email}}</li>
                                            <li><i class="fa fa-phone"></i> : {{$user->phone}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                           {{-- <div class="full inner_elements margin_top_30 mt-5 {{$user->role_id == 2 ? 'd-none' : ''}}">--}}
                            <div class="full inner_elements margin_top_30 mt-5 {{!count($cars) && !count($soldCars) ? 'd-none' : '' }}">
                                <div class="tab_style2">
                                    <div class="tabbar">
                                        <nav>
                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                <a class="nav-item nav-link {{count($cars) ? 'active' : ''}}" id="nav-home-tab" data-toggle="tab" href="#recent_activity" role="tab" aria-selected="true">Cars</a>
                                                <a class="nav-item nav-link {{count($soldCars) && !count($cars) ? 'active' : 0}}" id="nav-profile-tab" data-toggle="tab" href="#project_worked" role="tab" aria-selected="false">Sold cars</a>
                                            </div>
                                        </nav>
                                        <div class="tab-content" id="nav-tabContent">
                                            <div class="tab-pane fade show active" id="recent_activity" role="tabpanel" aria-labelledby="nav-home-tab">
                                                <table class="table">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Model</th>
                                                        <th>Date posted</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    @foreach($cars as $car)
                                                        <tr>
                                                            <td>{{$car->name}}</td>
                                                            <td>{{$car->model->model->name}}</td>
                                                            <td>{{$car->created_at}}</td>
                                                            <td>
                                                                <a href="{{route('admin.car.show',[$car->id])}}" class="btn btn-info">View</a>
                                                               {{-- <a href="{{route('admin.car.show',[$car->id])}}" class="btn btn-info">View</a>--}}
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade" id="project_worked" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                <table class="table">
                                                    <thead class="thead-light">
                                                    <tr class="text-center">
                                                        <th>Name</th>
                                                        <th>Model</th>
                                                        <th>Brand</th>
                                                        <th>Sold Date</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    @foreach($soldCars as $car)
                                                        <tr class="text-center">
                                                            <td>{{$car->name}}</td>
                                                            <td>{{$car->model->name}}</td>
                                                            <td>{{$car->model->brand->name}}</td>
                                                            <td>{{$car->updated_at}}</td>
                                                        </tr>
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
                    @if(!count($cars) && !count($soldCars) ? 'd-none' : '' )
                        <div class="alert alert-danger text-center">
                            <p>This user doesn't have any car</p>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
        <!-- end row -->
    </div>
@endsection
