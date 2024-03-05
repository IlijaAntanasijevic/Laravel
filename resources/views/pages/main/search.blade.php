@extends('layouts.layout')

@section('title') Search @endsection

@section('content')
    <div class="container mt-4 min-vh-100 mb-5">
        <div class="row">
            <div class="col-lg-12">
                <h1>Search more</h1>
                <hr />
                <form action="{{route('search')}}" method="GET">
                    @csrf
                    <div class="form-row">
                        <x-dropdown
                            label="Brand"
                            parent-class="form-group col-md-3"
                            select-class="selectpicker search-fields form-control"
                            :options="$brands"
                            first-option-text="Select Brand"
                            first-option-value="0"
                            name="brand"
                            id="brand"
                            :selected="old('brand')"/>
                        <x-dropdown
                            label="Model"
                            parent-class="form-group col-md-3"
                            select-class="selectpicker search-fields form-control"
                            :options="[]"
                            :disabled="true"
                            name="model"
                            id="model"
                            :selected="old('model')"/>
                        <x-dropdown
                            label="Body Type"
                            parent-class="form-group col-md-3"
                            select-class="selectpicker search-fields form-control"
                            :options="$bodies"
                            first-option-text="Select Body"
                            first-option-value="0"
                            name="body"
                            id="body"
                            :selected="old('body')"/>
                        <x-text-field
                            label="Year"
                            parent-class="form-group col-md-3"
                            field-class="form-control"
                            type="number"
                            placeholder="2024"
                            id="year"
                            name="year"
                            :value="old('year')"/>

                        <x-dropdown
                            parent-class="form-group col-md-3 my-4"
                            select-class="selectpicker search-fields form-control"
                            :options="$doors"
                            first-option-text=" Doors"
                            first-option-value="0"
                            name="doors"
                            id="doors"
                            :selected="old('doors')"/>
                        <x-dropdown
                            parent-class="form-group col-md-3 my-4"
                            select-class="selectpicker search-fields form-control"
                            :options="$seats"
                            first-option-text="Seats"
                            text="value"
                            first-option-value="0"
                            name="seats"
                            id="seats"
                            :selected="old('seats')"/>
                        <x-dropdown
                            parent-class="form-group col-md-3 my-4"
                            select-class="selectpicker search-fields form-control"
                            :options="$colors"
                            first-option-text="Color"
                            first-option-value="0"
                            name="color"
                            id="color"
                            :selected="old('color')"/>
                        <x-dropdown
                            parent-class="form-group col-md-3 my-4"
                            select-class="selectpicker search-fields form-control"
                            :options="$driveTypes"
                            first-option-text="Drive Type"
                            first-option-value="0"
                            name="driveType"
                            id="driveType"
                            :selected="old('$driveType')"/>
                        <x-text-field
                            label="Engine Value"
                            parent-class="form-group col-md-3"
                            field-class="form-control"
                            type="number"
                            placeholder="1789"
                            id="engine"
                            name="engine"
                            :value="old('engine')"/>
                        <x-text-field
                            label="Horse Power"
                            parent-class="form-group col-md-3"
                            placeholder="150"
                            field-class="form-control"
                            id="horsepower"
                            name="horsepower"
                            :value="old('horsepower')"/>
                        <x-dropdown
                            label="Fuel"
                            parent-class="form-group col-md-3"
                            select-class="selectpicker search-fields form-control"
                            :options="$fuels"
                            name="fuel"
                            id="fuel"
                            :selected="old('fuel')"/>
                        <x-dropdown
                            label="Transmission"
                            parent-class="form-group col-md-3"
                            select-class="selectpicker search-fields form-control"
                            :options="$transmission"
                            name="transmission"
                            id="transmission"
                            :selected="old('transmission')"/>
                        <x-text-field
                            label="Registration"
                            parent-class="form-group col-md-3"
                            field-class="form-control"
                            id="registration"
                            type="date"
                            name="registration"
                            :value="old('registration')"/>

                        <x-text-field
                            label="Price ($)"
                            parent-class="form-group col-md-5"
                            field-class="form-control"
                            id="price"
                            type="number"
                            name="price"
                            :value="old('price')"/>

                        <div class="container my-5">
                            <div class="row justify-content-around">
                                <div class="">
                                    <h3 class="mb-4">Safety</h3>
                                    <p class="text-danger error-message" id="safetiesError"></p>
                                    <x-check-box
                                        name="safety[]"
                                        :options="$safeties"
                                        :checked="old('safety')"/>
                                </div>

                                <div class="">
                                    <h3 class="mb-4">Equipments</h3>
                                    <p class="text-danger error-message" id="equipmentsError"></p>
                                    <x-check-box
                                        name="equipments[]"
                                        :options="$equipments"
                                        :checked="old('equipments')"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-50 mx-auto my-5">
                        <button id="submitButton"  class="btn btn-warning my-5 w-100 mx-auto text-light">Search</button>
{{--
                        <p class="alert alert-danger text-center globalMessages" id="globalErrorMsg">There is some errors, please check all inputs</p>
                        <p class="alert alert-success text-center globalMessages" id="globalSuccessMsg">Car added successfully! Admin approval is required</p>
--}}
                    </div>
                </form>


            </div>
        </div>
    </div>
@endsection

@section('custom_scripts')
    <script>
       /* $('#globalErrorMsg').hide();
        $('#globalSuccessMsg').hide();*/
    </script>
@endsection
