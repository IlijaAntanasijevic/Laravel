@extends('layouts.layout')

@section('title') User @endsection

@php
    $firstNameError = $errors->get('name')[0] ?? null;
    $lastNameError = $errors->get('lastName')[0] ?? null;
    $emailError = $errors->get('email')[0] ?? null;
    $cityError = $errors->get('city')[0] ?? null;
    $addressError = $errors->get('address')[0] ?? null;
    $phoneError = $errors->get('phone')[0] ?? null;
    $avatarError = $errors->get('avatar')[0] ?? null;


@endphp

@section('content')
    <div class="container">
        <div>
            <nav>
                <ul class="nav ">
                    <li class="nav-item">
                        <a href="{{route('profile.cars')}}" class="nav-link text-danger h5">Cars</a>
                    </li>
                </ul>
            </nav>
        </div>
        @if(session("error"))
            <div class="alert alert-danger my-5 w-75 mx-auto">
                <p class="text-center h3 ">{{session("error")}}</p>
            </div>
        @endif
        @if(session('success'))
            <div class="alert alert-success my-5 w-75 mx-auto">
                <p class="text-center h3 ">{{session('success')}}</p>
            </div>
        @endif
        <div class="row flex-column align-items-center justify-content-center">
            <div class="">
                <img src="{{asset('assets/img/avatar/' . $user->avatar)}}" alt="{{$user->name}}Avatar" class="rounded-circle">
            </div>
        </div>
        <form action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="row flex-column align-items-center">
                <div class="form-group">
                    <input type="file" id="uploadAvatar" name="avatar" class="d-none" >
                    <label for="uploadAvatar" class="btn btn-warning mt-4">Change Avatar</label>
                </div>
                @if($avatarError)
                    <p class="text-danger text-center">{{$avatarError}}</p>
                @endif
                <div class="row mt-5">
                    <x-text-field
                        label="Name"
                        type="text"
                        name="name"
                        id="name"
                        parent-class="form-group col-6"
                        field-class="form-control"
                        :value="$user->name"
                        :value="old('name') ?? $user->name "
                        :error="$firstNameError"/>
                    <x-text-field
                        label="Last name"
                        type="text"
                        name="lastName"
                        id="lastName"
                        parent-class="form-group col-6"
                        field-class="form-control"
                        :value="old('lastName') ?? $user->last_name "
                        :error="$lastNameError"/>
                </div>
             <div class="row">
                 <x-text-field
                     label="Email"
                     type="email"
                     name="email"
                     id="email"
                     parent-class="form-group col-6 my-5"
                     field-class="form-control"
                     :value="old('email') ?? $user->email "
                    :error="$emailError"/>
                 <x-text-field
                     label="Phone"
                     type="text"
                     name="phone"
                     id="phone"
                     parent-class="form-group col-6 my-5"
                     field-class="form-control"
                     :value="$user->phone"
                     :value="old('phone') ?? $user->phone"
                     :error="$phoneError"/>
             </div>
            <div class="row">
                <x-text-field
                    label="City"
                    type="text"
                    name="city"
                    id="city"
                    parent-class="form-group col-6"
                    field-class="form-control"
                    :value="$user->city"
                    :value="old('city') ?? $user->city"
                    :error="$cityError"/>
                <x-text-field
                    label="Address"
                    type="text"
                    name="address"
                    id="address"
                    parent-class="form-group col-6"
                    field-class="form-control"
                    :value="old('address') ?? $user->address"
                    :error="$addressError"/>
            </div>
            </div>
            <div class="w-25 mx-auto my-5">
                <button class="btn btn-success w-100">Save</button>

            </div>
        </form>
    </div>
@endsection
