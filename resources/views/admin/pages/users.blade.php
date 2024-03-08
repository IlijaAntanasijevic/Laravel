@extends('layouts.admin')

@section('title') Users @endsection
@section('content')
    <div class="row column1">
        <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
                <div class="full price_table padding_infor_info">
                    <div class="row">



                        {{--USER CARD -> PARTIALS FOLDER --}}
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 profile_details margin_bottom_30">
                            <div class="contact_blog">
                                <h4 class="brief">User</h4>
                                <div class="contact_inner">
                                    <div class="left">
                                        <h3>John Smith</h3>
                                        <p><strong>About: </strong>Frontend Developer</p>
                                        <ul class="list-unstyled">
                                            <li><i class="fa fa-envelope-o"></i> : test@gmail.com</li>
                                            <li><i class="fa fa-phone"></i> : 987 654 3210</li>
                                        </ul>
                                    </div>
                                    <div class="right">
                                        <div class="profile_contacts">
                                            <img class="img-responsive" src="{{asset('assets/admin/images/layout_img/msg2.png')}}" alt="#" />
                                        </div>
                                    </div>
                                    <div class="bottom_list">
                                        <div class="right_button">
                                            <a href="{{route('admin.user.profile')}}" class="btn btn-primary btn-xs text-light">
                                                <i class="fa fa-user mr-3"> </i>View Profile </a>
                                        </div>
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
