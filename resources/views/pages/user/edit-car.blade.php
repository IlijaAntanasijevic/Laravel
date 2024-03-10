@extends('layouts.layout')

@section('title') User Edit Car @endsection

@section('custom_links')
    <style>
        #registeredBlock {
            margin-top: 40px;
            user-select: none;
        }
    </style>
@endsection
@php
    $nameError = $errors->get('name')[0] ?? null;
    $brandError = $errors->get('brand')[0] ?? null;
    $modelError = $errors->get('model')[0] ?? null;
    $bodyError = $errors->get('body')[0] ?? null;
    $yearError = $errors->get('year')[0] ?? null;
    $kilometersError = $errors->get('kilometers')[0] ?? null;
    $doorsError = $errors->get('doors')[0] ?? null;
    $seatsError = $errors->get('seats')[0] ?? null;
    $colorError = $errors->get('color')[0] ?? null;
    $driveTypeError = $errors->get('driveType')[0] ?? null;
    $engineError = $errors->get('engine')[0] ?? null;
    $horsepowerError = $errors->get('horsepower')[0] ?? null;
    $fuelError = $errors->get('fuel')[0] ?? null;
    $transmissionError = $errors->get('transmission')[0] ?? null;
    $registrationError = $errors->get('registration')[0] ?? null;
    $priceError = $errors->get('price')[0] ?? null;
    $descriptionError = $errors->get('description')[0] ?? null;
    $safetiesError = $errors->get('safety')[0] ?? null;
    $equipmentsError = $errors->get('equipments')[0] ?? null;
@endphp

@section('content')

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger text-center">
                <p>There is some errors, please check all inputs</p>
            </div>
        @endif
        <div>
            <nav>
                <ul class="nav">
                    <li class="nav-item">
                        <a href="{{route('profile.index')}}" class="nav-link text-danger h5">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('profile.cars')}}" class="nav-link text-danger h5">Cars</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div>
            <h1 class="text-center my-5">Edit Car</h1>
        </div>
        <form action="{{route('profile.cars.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" value="{{$car->id}}" name="id">
            <div class="form-row">
                <x-text-field
                    label="Name"
                    parent-class="form-group col-md-3"
                    field-class="form-control"
                    type="text"
                    id="name"
                    name="name"
                    :value="old('name') ?? $car->name"
                    :error="$nameError"/>
                <x-dropdown
                    label="Brand"
                    parent-class="form-group col-md-3"
                    select-class="selectpicker search-fields form-control"
                    :options="$brands"
                    name="brand"
                    id="brand"
                    :selected="$car->model['brand']->id"
                    :error="$brandError"/>
                <x-dropdown
                    label="Model"
                    parent-class="form-group col-md-3"
                    select-class="selectpicker search-fields form-control"
                    :options="$models"
                    name="model"
                    id="model"
                    :selected="$car->model->id"
                    :error="$modelError"/>
                <x-dropdown
                    label="Body Type"
                    parent-class="form-group col-md-3"
                    select-class="selectpicker search-fields form-control"
                    :options="$bodies"
                    name="body"
                    id="body"
                    :selected="$car->model['body']->id"
                    :error="$bodyError"/>

                <x-text-field
                    label="Engine"
                    parent-class="form-group col-md-3 mt-4"
                    field-class="form-control"
                    type="number"
                    placeholder="1789"
                    id="engine"
                    name="engine"
                    :value="$car->engine['engine_value']"
                    :error="$engineError"/>

                <x-dropdown
                    parent-class="form-group col-md-3 my-4"
                    select-class="selectpicker search-fields form-control"
                    :options="$doors"
                    label="Doors"
                    name="doors"
                    id="doors"
                    :selected="$car->model['doors']->id"
                    :error="$doorsError"/>
                <x-dropdown
                    parent-class="form-group col-md-3 my-4"
                    select-class="selectpicker search-fields form-control"
                    :options="$seats"
                    text="value"
                    label="Seats"
                    name="seats"
                    id="seats"
                    :selected="$car->model['seat']->id"
                    :error="$seatsError"/>
                <x-dropdown
                    parent-class="form-group col-md-3 my-4"
                    select-class="selectpicker search-fields form-control"
                    :options="$colors"
                    name="color"
                    label="Color"
                    id="color"
                    :selected="$car->color_id"
                    :error="$colorError"/>
                <x-dropdown
                    parent-class="form-group col-md-3 my-4"
                    select-class="selectpicker search-fields form-control"
                    :options="$driveTypes"
                    name="driveType"
                    label="Drive Type"
                    id="driveType"
                    :selected="$car->drive_type_id"
                    :error="$driveTypeError"/>

                <x-text-field
                    parent-class="form-group col-md-2 mt-4"
                    placeholder="150"
                    field-class="form-control"
                    placeholder="Max horse power"
                    id="horsepower"
                    label="Horsepower"
                    name="horsepower"
                    :value="old('horsepower') ?? $car->engine['horsepower']"
                    :error="$engineError"/>
                <x-text-field
                    parent-class="form-group col-md-2 mt-4"
                    placeholder="150"
                    field-class="form-control"
                    placeholder="Max horse power"
                    id="year"
                    label="Year"
                    name="year"
                    :value="$car->year"
                    :error="$yearError"/>
                <x-dropdown
                    parent-class="form-group col-md-2 mt-4"
                    select-class="selectpicker search-fields form-control"
                    :options="$fuels"
                    name="fuel"
                    label="Fuel"
                    id="fuel"
                    :selected="$car->engine['fuel']->id"
                    :error="$fuelError"/>
                <x-dropdown
                    parent-class="form-group col-md-3 mt-4"
                    select-class="selectpicker search-fields form-control"
                    :options="$transmission"
                    label="Transmission"
                    name="transmission"
                    id="transmission"
                    :selected="$car->engine['transmission']->id"
                    :error="$transmissionError"/>

                <x-text-field
                    parent-class="form-group col-md-3"
                    placeholder="150"
                    field-class="form-control"
                    placeholder="Kilometers"
                    id="kilometers"
                    label="Kilometers"
                    name="kilometers"
                    :value="old('kilometers') ?? $car->kilometers"
                    :error="$kilometersError"/>

                    <x-text-field
                        label="Registration"
                        parent-class="form-group col-md-3"
                        field-class="form-control"
                        id="registration"
                        type="date"
                        name="registration"
                        :value="$car->registration"
                        :error="$registrationError"
                        :disabled="$car->registration === null"/>
                <div class="ml-3 col-md-2" id="registeredBlock">
                    <input type="checkbox"  {{$car->registration ?? 'checked' }} class="form-check-input" name="isRegistered" id="isRegistered" value="1">
                    <label for="isRegistered">Unregistered</label>
                </div>
                <x-text-field
                    label="Price ($)"
                    parent-class="form-group col-md-3"
                    field-class="form-control"
                    id="price"
                    type="number"
                    name="price"
                    :value="$car->price"
                    :error="$priceError"/>
            </div>
            <div class="container my-5">
                <div class="row justify-content-around">
                    <div class="">
                        <h3 class="mb-4">Safety</h3>
                        @if($safetiesError)
                            <p class="text-danger error-message" id="safetiesError">{{$safetiesError}}</p>
                        @endif
                        <x-check-box
                            name="safety[]"
                            :options="$safeties"
                            :checked="$checkedSafety"/>
                    </div>

                    <div class="">
                        <h3 class="mb-4">Equipments</h3>
                        @if($equipmentsError)
                            <p class="text-danger error-message" id="equipmentsError">{{$equipmentsError}}</p>
                        @endif
                        <x-check-box
                            name="equipments[]"
                            :options="$equipments"
                            :checked="$checkedEquipment"/>
                    </div>
                </div>
            </div>
            <div class="form-group  w-100 mb-5 ">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="5">{{$car->description}}</textarea>
                @if($descriptionError)
                    <p class="text-danger error-message" id="descriptionError">{{$descriptionError}}</p>
                @endif
            </div>
            <div class="row">
                <div class="col-4 w-25" id="imgBlock-{{$car->id}}">
                    <img src="{{asset('assets/img/'.$car->primary_image)}}" alt="{{$car->name}}" class="w-100"/>
                    <a href="#" class="btn btn-danger mt-2 removeImage" data-path="{{$car->primary_image}}" id="{{$car->id}}">Remove</a>
                </div>
                @foreach($car->images as $img)
                    <div class="col-4 w-25 my-5" id="imgBlock-{{$car->id}}">
                        <img src="{{asset('assets/img/'.$img->path)}}" alt="{{$car->name}}" class="w-100"/>
                        <a href="#" class="btn btn-danger mt-2 removeImage" data-path="{{$img->path}}" id="{{$car->id}}">Remove</a>
                    </div>
                @endforeach
            </div>
            <div class="form-group">
                <label for="images" class="btn btn-warning mt-4 w-25">Add more images</label>
                <input type="file" id="images" name="images[]" class="form-control-file d-none" multiple>
                {{--@if($imageError)
                    <p class="text-danger error-message" id="imageError">{{$imageError}}</p>
                @endif--}}
            </div>

            <div class="w-50 mx-auto my-5">
                <button id="submitButton"  class="btn btn-success my-5 w-100 mx-auto text-light">Save</button>
            </div>


        </form>
    </div>
@endsection


@section('custom_scripts')
    <script>
        $('#brand').change(function (){
            let brandId = $('#brand').val();
            if (brandId === '0') {
                $('#model').html('<option value="0">Model</option>');
                $('#model').attr('disabled', 'disabled');
                return;
            }
            $.ajax({
                url: "{{ route('get.models') }}",
                method: 'GET',
                data: {
                    id: brandId
                },
                success: function (data){
                    let options = '<option value="0">Select Model</option>';
                    for(let model of data){
                        options += `<option value='${model.id}'>${model.name}</option>`;
                    }
                    $('#model').html(options);
                    $('#model').removeAttr('disabled');
                },
                error: function (xhr, status, error){
                    console.log(xhr)
                }
            })
        })

        $('#isRegistered').click(function (){
            if($(this).is(':checked')){
                $('#registration').attr('disabled', 'disabled');
            } else {
                $('#registration').removeAttr('disabled');
            }
        })

        $('.removeImage').click(function (e){
            e.preventDefault();
            let id = $(this).attr('id');
            let path = $(this).attr('data-path');
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                   deleteImage(id,path);
                }
            });
        })

        function deleteImage(id,path){
            $.ajax({
                url: "{{route('profile.cars.delete.image')}}",
                method: 'DELETE',
                data: {
                    _token: '{{csrf_token()}}',
                    id: id,
                    path: path
                },
                success: function (data){
                    $(`#imgBlock-${id}`).remove();
                    toastr.success('Image removed successfully');
                    console.log(data);
                },
                error: function (xhr, status, error){
                    if(xhr.status === 409){
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: `${xhr.responseJSON.message}`,
                        });
                    }
                    else {
                        toastr.error('Something went wrong');
                        console.log(xhr);
                    }

                }
            })
        }
    </script>
@endsection
