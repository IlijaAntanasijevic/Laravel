@extends('layouts.layout')

@section('title') Contact @endsection
@php
    $nameError = $errors->get('name')[0] ?? null;
    $emailError = $errors->get('email')[0] ?? null;
    $subjectError = $errors->get('subject')[0] ?? null;
    $messageError = $errors->get('message')[0] ?? null;
@endphp
@section('content')
    <div class="page_loader"></div>
    <div class="contact-1 content-area-7">
        <div class="container">
            <div class="main-title">
                <h1>Contact Us</h1>
            </div>

            <div class="row">
                <div class="col-lg-7 col-md-7 col-md-7">
                    <form action="{{route('send.mail')}}" method="POST">
                        <div class="row">
                            <form action="" method="POST">
                            @csrf
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <x-text-field
                                    parent-class="form-group"
                                    field-class="form-control text-dark"
                                    placeholder="Name"
                                    id="contactName"
                                    type="text"
                                    name="name"
                                    :error="$nameError"
                                    :value="old('name')"/>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <x-text-field
                                    parent-class="form-group"
                                    field-class="form-control text-dark"
                                    placeholder="Email"
                                    id="contactEmail"
                                    type="email"
                                    name="email"
                                    :error="$emailError"
                                    :value="old('email')"/>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <x-text-field
                                    parent-class="form-group"
                                    field-class="form-control text-dark"
                                    placeholder="Subject"
                                    id="contactSubject"
                                    type="text"
                                    name="subject"
                                    :error="$subjectError"
                                    :value="old('subject')"/>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group message">
                                    <textarea class="form-control text-dark" name="message" placeholder="Write message">{{old('message')}}</textarea>
                                    @if($messageError)
                                        <span class="text-danger">{{$messageError}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="send-btn">
                                    <button type="submit" class="btn btn-color btn-md btn-message">Send Message</button>
                                </div>
                                @if(session('success'))
                                    <div class="alert alert-success mt-2">
                                        <p>{{session('success')}}</p>
                                    </div>
                                @endif
                                @if(session('error'))
                                    <div class="alert alert-danger mt-2">
                                        <p>{{session('error')}}</p>
                                    </div>
                                @endif

                            </div>


                            </form>

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


@endsection

@section('custom_scripts')
    <script>
        $(document).ready(function () {
            $('.page_loader').remove();
        });
    </script>
@endsection
