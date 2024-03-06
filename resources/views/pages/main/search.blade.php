@extends('layouts.layout')

@section('title') Search @endsection

@section('content')
    <div class="container mt-4 min-vh-100 mb-5">
        <div class="row">
            <div class="col-lg-12">
                <h1>Search more</h1>
                <hr />
                <form action="{{route('search')}}" method="GET">
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
                            label="Max Engine Value"
                            parent-class="form-group col-md-3"
                            field-class="form-control"
                            type="number"
                            placeholder="1789"
                            id="engine"
                            name="engine"
                            :value="old('engine')"/>

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
                            parent-class="form-group col-md-3 mt-4"
                            placeholder="150"
                            field-class="form-control"
                            placeholder="Max horse power"
                            id="horsepower"
                            name="horsepower"
                            :value="old('horsepower')"/>
                        <x-dropdown
                            parent-class="form-group col-md-3 mt-4"
                            select-class="selectpicker search-fields form-control"
                            first-option-text="Fuel"
                            :options="$fuels"
                            name="fuel"
                            id="fuel"
                            :selected="old('fuel')"/>
                        <x-dropdown
                            parent-class="form-group col-md-3 mt-4"
                            select-class="selectpicker search-fields form-control"
                            first-option-text="Transmission"
                            :options="$transmission"
                            name="transmission"
                            id="transmission"
                            :selected="old('transmission')"/>
                        <div class="form-group col-md-3 mt-4 p-0">
                            <div class="form-check">
                                <select class="selectpicker search-fields form-control" name="registration" id="registration">
                                    <option value="0">Registration (All)</option>
                                    <option value="registered">Registered</option>
                                    <option value="unregistered">Unregistered</option>
                                </select>

                            </div>
                        </div>

                        <x-text-field
                            label="Min Price ($)"
                            parent-class="form-group col-md-3"
                            field-class="form-control"
                            id="price"
                            type="number"
                            name="minPrice"
                            :value="old('price')"/>
                        <x-text-field
                            label="Max Price ($)"
                            parent-class="form-group col-md-3"
                            field-class="form-control"
                            id="price"
                            type="number"
                            name="maxPrice"
                            :value="old('price')"/>

                        <div class="col-6 col-md-3">
                            <div class="form-group">
                                <label>Year From</label>
                                <select class="selectpicker search-fields form-control" name="yearFrom" id="yearFromSearch">
                                    @for($i = 1980; $i <= 2024; $i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="form-group">
                                <label>Year To</label>
                                <select class="selectpicker search-fields form-control" name="yearTo" id="yearToSearch">
                                    @for($i = 2024; $i >= 1980; $i--)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="w-50 mx-auto my-5">
                        <button id="submitButton"  class="btn btn-warning my-5 w-100 mx-auto text-light">Search</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
@endsection

@section('custom_scripts')
    <script>
        $(document).ready(function () {
            // ** Model Dropdown ** //
            $('#brand').change(function () {
                let brandId = $(this).val();
                if (brandId === '0') {
                    $('#model').html('<option value="0">Model</option>');
                    $('#model').attr('disabled', 'disabled');
                    return;
                }
                $.ajax({
                    url: "{{route('get.models')}}",
                    data: {
                        id: brandId
                    },
                    method: 'GET',
                    success: function (response) {
                        let options = '<option value="0">Model</option>';
                        response.forEach(function (model) {
                            options += `<option value="${model.id}">${model.name}</option>`;
                        });
                        $('#model').html(options);
                        $('#model').removeAttr('disabled');
                    }
                });
            });
            // ** End Model DDL ** //
        });
    </script>
@endsection
