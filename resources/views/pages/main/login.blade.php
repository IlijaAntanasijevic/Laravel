@extends('layouts.layout')

@section('title') Login @endsection

@section('content')
    <div class="login-1">
        <div class="container-fluid">
            <div class="row login-box">
                <div class="col-lg-6 bg-color-15 pad-0 none-992 bg-img">
                    <div class="info clearfix">
                        <h1>Welcome to <a href="{{route('home')}}">Car Shop</a></h1>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to make a type</p>
                    </div>
                </div>
                <div class="col-lg-6 align-self-center pad-0 form-section">
                    <div class="form-inner">
                        <a href="{{route('home')}}" class="logo">
                            <img src="{{asset('assets/img/logos/logo.png')}}" alt="logo">
                        </a>
                        <h3>Sign Into Your Account</h3>
                        <form action="#" method="GET">
                            <x-text-field
                                name="email"
                                type="email"
                                placeholder="Email Address"
                                id="email"
                                parent-class="clearfix"
                                field-class="form-control"/>

                            <x-text-field
                            name="password"
                            type="password"
                            placeholder="Password"
                            id="password"
                            parent-class="clearfix"
                            field-class="form-control"/>

                            {{--<div class="checkbox form-group clearfix">
                                <a href="forgot-password.html" class="forgot-password">Forgot Password</a>
                            </div>--}}
                            <div class="form-group">
                                <button type="submit" class="btn-theme btn-md w-100">Login</button>
                            </div>
                            <div class="clearfix"></div>
                        </form>

                        <div class="clearfix"></div>
                        <p>Don't have an account? <a href="{{route('register')}}" class="thembo"> Register here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

