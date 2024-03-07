@extends('layouts.layout')

@section('title') User Edit Car @endsection

@section('custom_links')
    <style>
        #registeredBlock {
            margin-top: 40px;
            user-select: none;
        }
    </style>

@section('content')
    <div class="container">
        <div>
            <nav>
                <ul class="nav">
                    <li class="nav-item">
                        <a href="{{route('profile.index')}}" class="nav-link text-danger h5">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('profile.cars')}}" class="nav-link text-danger h5">Cars</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('wishlist.index')}}" class="nav-link text-danger h5">Wishlist</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div>
            <h1 class="text-center my-5">Edit Car</h1>
        </div>
        <form action="{{route('search')}}" method="GET">
            <div class="form-row">
                <x-text-field
                    label="Name"
                    parent-class="form-group col-md-3"
                    field-class="form-control"
                    type="text"
                    id="name"
                    name="name"
                    :value="old('engine') ?? $car->name"/>
                <x-dropdown
                    label="Brand"
                    parent-class="form-group col-md-3"
                    select-class="selectpicker search-fields form-control"
                    :options="$brands"
                    name="brand"
                    id="brand"
                    :selected="$car->model['brand']->id"/>
                <x-dropdown
                    label="Model"
                    parent-class="form-group col-md-3"
                    select-class="selectpicker search-fields form-control"
                    :options="$models"
                    name="model"
                    id="model"
                    :selected="$car->model->id"/>
                <x-dropdown
                    label="Body Type"
                    parent-class="form-group col-md-3"
                    select-class="selectpicker search-fields form-control"
                    :options="$bodies"
                    name="body"
                    id="body"
                    :selected="$car->model['body']->id"/>

                <x-text-field
                    label="Engine"
                    parent-class="form-group col-md-3 mt-4"
                    field-class="form-control"
                    type="number"
                    placeholder="1789"
                    id="engine"
                    name="engine"
                    :value="$car->engine['engine_value']"/>

                <x-dropdown
                    parent-class="form-group col-md-3 my-4"
                    select-class="selectpicker search-fields form-control"
                    :options="$doors"
                    label="Doors"
                    name="doors"
                    id="doors"
                    :selected="$car->model['doors']->id"/>
                <x-dropdown
                    parent-class="form-group col-md-3 my-4"
                    select-class="selectpicker search-fields form-control"
                    :options="$seats"
                    text="value"
                    label="Seats"
                    name="seats"
                    id="seats"
                    :selected="$car->model['seat']->id"/>
                <x-dropdown
                    parent-class="form-group col-md-3 my-4"
                    select-class="selectpicker search-fields form-control"
                    :options="$colors"
                    name="color"
                    label="Color"
                    id="color"
                    :selected="$car->color_id"/>
                <x-dropdown
                    parent-class="form-group col-md-3 my-4"
                    select-class="selectpicker search-fields form-control"
                    :options="$driveTypes"
                    name="driveType"
                    label="Drive Type"
                    id="driveType"
                    :selected="$car->drive_type_id"/>

                <x-text-field
                    parent-class="form-group col-md-3 mt-4"
                    placeholder="150"
                    field-class="form-control"
                    placeholder="Max horse power"
                    id="horsepower"
                    label="Horsepower"
                    name="horsepower"
                    :value="$car->engine['horsepower']"/>
                <x-dropdown
                    parent-class="form-group col-md-3 mt-4"
                    select-class="selectpicker search-fields form-control"
                    :options="$fuels"
                    name="fuel"
                    label="Fuel"
                    id="fuel"
                    :selected="$car->engine['fuel']->id"/>
                <x-dropdown
                    parent-class="form-group col-md-3 mt-4"
                    select-class="selectpicker search-fields form-control"
                    :options="$transmission"
                    label="Transmission"
                    name="transmission"
                    id="transmission"
                    :selected="$car->engine['transmission']->id"/>

                <x-text-field
                    parent-class="form-group col-md-3"
                    placeholder="150"
                    field-class="form-control"
                    placeholder="Kilometers"
                    id="kilometers"
                    label="Kilometers"
                    name="kilometers"
                    :value="$car->kilometers"/>

                    <x-text-field
                        label="Registration"
                        parent-class="form-group col-md-3"
                        field-class="form-control"
                        id="registration"
                        type="date"
                        name="registration"
                        :value="$car->registration"/>
                <div class="ml-3 col-md-2" id="registeredBlock">
                    <input type="checkbox"  class="form-check-input" name="registrationCheckbox" id="registrationCheckbox">
                    <label for="registrationCheckbox">Unregistered</label>
                </div>
                <x-text-field
                    label="Price ($)"
                    parent-class="form-group col-md-3"
                    field-class="form-control"
                    id="price"
                    type="number"
                    name="price"
                    :value="$car->price"/>
            </div>
            <div class="container my-5">
                <div class="row justify-content-around">
                    <div class="">
                        <h3 class="mb-4">Safety</h3>
                        <p class="text-danger error-message" id="safetiesError"></p>
                        <x-check-box
                            name="safety[]"
                            :options="$safeties"
                            :checked="$checkedSafety"/>
                    </div>

                    <div class="">
                        <h3 class="mb-4">Equipments</h3>
                        <p class="text-danger error-message" id="equipmentsError"></p>
                        <x-check-box
                            name="equipments[]"
                            :options="$equipments"
                            :checked="$checkedEquipment"/>
                    </div>
                </div>
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

        $('#registrationCheckbox').click(function (){
            if($(this).is(':checked')){
                $('#registration').attr('disabled', 'disabled');
            } else {
                $('#registration').removeAttr('disabled');
            }
        })
    </script>
@endsection
