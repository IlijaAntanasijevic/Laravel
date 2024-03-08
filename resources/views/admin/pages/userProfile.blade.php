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
                            <div class="full dis_flex center_text">
                                <div class="profile_img"><img width="180" class="rounded-circle" src="{{asset('assets/admin/images/layout_img/user_img.jpg')}}" alt="#" /></div>
                                <div class="profile_contant">
                                    <div class="contact_inner">
                                        <h3>John Smith</h3>
                                        <p><strong>About: </strong>Frontend Developer</p>
                                        <ul class="list-unstyled">
                                            <li><i class="fa fa-envelope-o"></i> : test@gmail.com</li>
                                            <li><i class="fa fa-phone"></i> : 987 654 3210</li>
                                        </ul>
                                    </div>
                                    <div class="user_progress_bar">
                                        <div class="progress_bar">
                                            <!-- Skill Bars -->
                                            <span class="skill" style="width:85%;">Web Applications <span class="info_valume">85%</span></span>
                                            <div class="progress skill-bar ">
                                                <div class="progress-bar progress-bar-animated progress-bar-striped" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%;">
                                                </div>
                                            </div>
                                            <span class="skill" style="width:78%;">Website Design <span class="info_valume">78%</span></span>
                                            <div class="progress skill-bar">
                                                <div class="progress-bar progress-bar-animated progress-bar-striped" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 78%;">
                                                </div>
                                            </div>
                                            <span class="skill" style="width:47%;">Automation & Testing <span class="info_valume">47%</span></span>
                                            <div class="progress skill-bar">
                                                <div class="progress-bar progress-bar-animated progress-bar-striped" role="progressbar" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100" style="width: 54%;">
                                                </div>
                                            </div>
                                            <span class="skill" style="width:65%;">UI / UX <span class="info_valume">65%</span></span>
                                            <div class="progress skill-bar">
                                                <div class="progress-bar progress-bar-animated progress-bar-striped" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="width: 65%;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- profile contant section -->
                            <div class="full inner_elements margin_top_30">
                                <div class="tab_style2">
                                    <div class="tabbar">
                                        <nav>
                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#recent_activity" role="tab" aria-selected="true">Cars</a>
                                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#project_worked" role="tab" aria-selected="false">Sold cars</a>
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
                                                    @for($i = 1; $i < 5 ; $i++)
                                                        <tr>
                                                            <td>Name {{$i}}</td>
                                                            <td>Model {{$i}}</td>
                                                            <td>2024-02-12</td>
                                                            <td>
                                                                <a href="#" class="btn btn-info">View</a>
                                                            </td>
                                                        </tr>
                                                    @endfor

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
                                                        <th>Date posted</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @for($i = 1; $i < 5 ; $i++)
                                                        <tr class="text-center">
                                                            <td>Name {{$i}}</td>
                                                            <td>Model {{$i}}</td>
                                                            <td>Brand {{$i}}</td>
                                                            <td>2024-02-12</td>

                                                        </tr>
                                                    @endfor

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end user profile section -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
        <!-- end row -->
    </div>
@endsection
