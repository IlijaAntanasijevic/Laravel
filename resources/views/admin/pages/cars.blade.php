@extends('layouts.admin')

@section('title') Available Cars @endsection
@section('content')
    <div class="row column1">

        {{--CARCARD PARTIALS FOLDER --}}
        <div class="col-md-6 col-lg-4 ">
            <div class="full white_shd margin_bottom_30 ">
                <div class="d-flex justify-content-around mt-3">
                    <div class="w-50">
                        <img src="{{asset('assets/img/car-1.jpg')}}" alt="#" class="w-100"/>
                    </div>
                    <div class="ml-3">
                        <h4>Car Name</h4>
                        <p>Model</p>
                        <p>Developer</p>
                    </div>

                </div>
                <div class="d-flex justify-content-around pb-4 mt-4">
                    <a href="#" class="btn btn-primary">View</a>
                    <a href="#" class="btn btn-warning">Approval</a>
                </div>
            </div>
        </div>
    </div>
@endsection
