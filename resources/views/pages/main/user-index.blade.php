@extends('layouts.layout')

@section('title') User @endsection

@section('content')
    <div class="container">
        <div>
            <nav>
                <ul class="nav ">
                    <li class="nav-item">
                        <a href="#" class="nav-link text-danger h5">Cars</a>{{--{{route('user.cars')}}--}}
                    </li>
                    <li class="nav-item">
                        <a href="{{route('wishlist.index')}}" class="nav-link text-danger h5">Wishlist</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="row flex-column align-items-center justify-content-center">
            <div class="">
                <img src="{{asset('assets/img/avatar/' . $user->avatar)}}" alt="{{$user->name}}Avatar" class="rounded-circle">
            </div>
        </div>
        <form action="{{route('profile.update')}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="row flex-column align-items-center">
                <div class="form-group">
                    <input type="file" id="uploadAvatar" name="avatar" class="d-none" >
                    <label for="uploadAvatar" class="btn btn-warning mt-4 mb-5">Change Avatar</label>
                </div>
                <div class="row">
                    <x-text-field
                        label="Name"
                        type="text"
                        name="name"
                        id="name"
                        parent-class="form-group col-6"
                        field-class="form-control"
                        :value="$user->name"/>
                    <x-text-field
                        label="Last name"
                        type="text"
                        name="lastname"
                        id="lastname"
                        parent-class="form-group col-6"
                        field-class="form-control"
                        :value="$user->last_name"/>
                </div>
             <div class="row">
                 <x-text-field
                     label="Email"
                     type="email"
                     name="email"
                     id="email"
                     parent-class="form-group col-6 my-5"
                     field-class="form-control"
                     :value="$user->email"/>
                 <x-text-field
                     label="Phone"
                     type="text"
                     name="phone"
                     id="phone"
                     parent-class="form-group col-6 my-5"
                     field-class="form-control"
                     :value="$user->phone"/>
             </div>
            <div class="row">
                <x-text-field
                    label="City"
                    type="text"
                    name="city"
                    id="city"
                    parent-class="form-group col-6"
                    field-class="form-control"
                    :value="$user->city"/>
                <x-text-field
                    label="Address"
                    type="text"
                    name="address"
                    id="address"
                    parent-class="form-group col-6"
                    field-class="form-control"
                    :value="$user->address"/>
            </div>
            </div>
            <div class="w-25 mx-auto my-5">
                <button class="btn btn-success w-100">Save</button>

            </div>
        </form>
    </div>
@endsection
