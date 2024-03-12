@extends('layouts.layout')

@section('title') Login @endsection

@section('content')
    @php
        $emailError = $errors->get('email')[0] ?? null;
        $passwordError = $errors->get('password')[0] ?? null;
    @endphp
    <div class="login-1">
        <div class="container-fluid">
            @if(session('success'))
                <div class="alert alert-success my-3">
                    <p class="text-center h5"> {{session('success')}}</p>
                </div>
            @endif
            <div class="row login-box">
                <div class="col-lg-6 bg-color-15 pad-0 none-992 bg-img">
                    <div class="info clearfix">
                        <h1>Welcome to <a href="{{route('home')}}">Car Shop</a></h1>
                        <p>Where every journey begins with a smile! Step into our world of automotive excellence, where we strive to match your dreams with the perfect vehicle. Whether you're seeking sleek sophistication, rugged reliability, or something in between, we're here to guide you every step of the way. From browsing to test driving, financing to driving off the lot, your satisfaction is our top priority. Let's embark on this exciting adventure together!</p>
                    </div>
                </div>

                <div class="col-lg-6 align-self-center pad-0 form-section">
                    <div class="form-inner">
                        <a href="{{route('home')}}" class="logo">
                            <img src="{{asset('assets/img/logos/logo.png')}}" alt="logo">
                        </a>
                        <h3>Sign Into Your Account</h3>
                        <form action="{{route('login')}}" method="POST">
                            @csrf
                            <x-text-field
                                name="email"
                                type="email"
                                placeholder="Email Address"
                                id="email"
                                parent-class="form-group clearfix"
                                field-class="form-control"
                                value="ilija0125@gmail.com"
                                :error="$emailError"/>

                            <x-text-field
                            name="password"
                            type="password"
                            placeholder="Password"
                            id="password"
                            parent-class="form-group clearfix"
                            field-class="form-control"
                            value=""
                            :error="$passwordError"/>
                            <div class="form-group">
                                <button type="submit" class="btn-theme btn-md w-100">Login</button>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                        @if(session('error'))
                            <p class="text-danger alert alert-danger mb-4">{{session('error')}}</p>
                        @endif
                        <div class="clearfix"></div>
                        <p>Don't have an account? <a href="{{route('register')}}" class="thembo"> Register here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

