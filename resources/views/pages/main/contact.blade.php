@extends('layouts.layout')

@section('title') Contact @endsection

@section('content')
    <!-- Contact 1 start -->
    <div class="contact-1 content-area-7">
        <div class="container">
            <div class="main-title">
                <h1>Contact Us</h1>
            </div>

            <div class="row">
                <div class="col-lg-7 col-md-7 col-md-7">
                    <form action="#" method="GET" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group name">
                                    <input type="text" name="name" class="form-control" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group email">
                                    <input type="email" name="email" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group subject">
                                    <input type="text" name="subject" class="form-control" placeholder="Subject">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group number">
                                    <input type="text" name="phone" class="form-control" placeholder="Number">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group message">
                                    <textarea class="form-control" name="message" placeholder="Write message"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="send-btn">
                                    <button type="submit" class="btn btn-color btn-md btn-message">Send Message</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-lg-5 col-md-7">
                    <div class="contact-info">
                        <div class="media">
                            <i class="fa fa-map-marker"></i>
                            <div class="media-body">
                                <h5 class="mt-0">Office Address</h5>
                                <p>20/F Green Road, Dhanmondi, Dhaka</p>
                            </div>
                        </div>
                        <div class="media">
                            <i class="fa fa-phone"></i>
                            <div class="media-body">
                                <h5 class="mt-0">Phone Number</h5>
                                <p>Office<a href="tel:0477-0477-8556-552">: 0477 8556 552</a> </p>
                                <p>Mobile<a href="tel:+0477-85x6-552">: +55 417 634 7X71</a> </p>
                            </div>
                        </div>
                        <div class="media mrg-btn-0">
                            <i class="fa fa-envelope"></i>
                            <div class="media-body">
                                <h5 class="mt-0">Email Address</h5>
                                <p><a href="#">themevessel.us@gmail.com</a></p>
                                <p><a href="#">http://themevessel.com</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact 1 end -->

    <!-- Google map start -->
    <div class="section">
        <div class="map">
            <div id="map" class="contact-map"></div>
        </div>
    </div>


@endsection
