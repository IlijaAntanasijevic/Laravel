@extends('layouts.layout')

@section('title') Sell Car @endsection

@section('custom_links')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
    <style>
        .dz-remove {
            margin-top: 5px;
            color: red;
        }
        .dz-remove:hover {
            margin-top: 5px;
            font-weight: bold;
            color: red;
            text-decoration: none!important;
        }
        #registeredBlock {
            margin-top: 40px;
            user-select: none;
        }
        #price {
            border: 1px solid lightgreen;
        }
    </style>
@endsection
@section('content')
    <div class="container mt-4 min-vh-100 mb-5">
        <div class="row">
            <div class="col-lg-12">
                <h1>Sell Car</h1>
                <hr />
                <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <x-text-field
                            label="Car Name"
                            parent-class="form-group col-md-6"
                            field-class="form-control"
                            id="name"
                            name="name"/>
                        <x-dropdown
                            label="Brand"
                            parent-class="form-group col-md-6"
                            select-class="selectpicker search-fields form-control"
                            :options="$brands"
                            first-option-text="Select Brand"
                            first-option-value="0"
                            name="brand"
                            id="brand"/>
                        <x-dropdown
                            label="Model"
                            parent-class="form-group col-md-6"
                            select-class="selectpicker search-fields form-control"
                            :options="[]"
                            :disabled="true"
                            name="model"
                            id="model"/>
                        <x-dropdown
                            label="Body Type"
                            parent-class="form-group col-md-6"
                            select-class="selectpicker search-fields form-control"
                            :options="$bodies"
                            first-option-text="Select Body"
                            first-option-value="0"
                            name="body"
                            id="body"/>
                        <x-dropdown
                            parent-class="form-group col-md-3 my-4"
                            select-class="selectpicker search-fields form-control"
                            :options="$doors"
                            first-option-text=" Doors"
                            first-option-value="0"
                            name="doors"
                            id="doors"/>
                        <x-dropdown
                            parent-class="form-group col-md-3 my-4"
                            select-class="selectpicker search-fields form-control"
                            :options="$seats"
                            first-option-text="Seats"
                            text="value"
                            first-option-value="0"
                            name="seats"
                            id="seats"/>
                        <x-dropdown
                            parent-class="form-group col-md-3 my-4"
                            select-class="selectpicker search-fields form-control"
                            :options="$colors"
                            first-option-text="Color"
                            first-option-value="0"
                            name="seats"
                            id="seats"/>
                        <x-dropdown
                            parent-class="form-group col-md-3 my-4"
                            select-class="selectpicker search-fields form-control"
                            :options="$driveTypes"
                            first-option-text="Drive Type"
                            first-option-value="0"
                            name="seats"
                            id="seats"/>
                        <x-text-field
                            label="Engine Value"
                            parent-class="form-group col-md-3"
                            field-class="form-control"
                            type="number"
                            placeholder="1789"
                            id="engine"
                            name="engine"/>
                        <x-text-field
                            label="Horse Power"
                            parent-class="form-group col-md-3"
                            placeholder="150"
                            field-class="form-control"
                            id="horsepower"
                            name="horsepower"/>
                        <x-dropdown
                            label="Fuel"
                            parent-class="form-group col-md-3"
                            select-class="selectpicker search-fields form-control"
                            :options="$fuels"
                            name="fuel"
                            id="fuel"/>
                        <x-dropdown
                            label="Transmission"
                            parent-class="form-group col-md-3"
                            select-class="selectpicker search-fields form-control"
                            :options="$transmission"
                            name="transmission"
                            id="transmission"/>
                         <x-text-field
                         label="Registration"
                         parent-class="form-group col-md-3"
                         field-class="form-control"
                         id="registration"
                         type="date"
                         name="registration"/>

                        <div class="ml-3 col-md-3" id="registeredBlock">
                            <input type="checkbox" class="form-check-input" name="registered" id="registered">
                            <label for="registered">Not registered</label>
                        </div>

                        <x-text-field
                            label="Price ($)"
                            parent-class="form-group col-md-5"
                            field-class="form-control"
                            id="price"
                            type="number"
                            name="price"/>

                       <div class="container my-5">
                           <div class="row justify-content-around">
                               <div class="">
                                   <h3 class="mb-4">Safety</h3>
                                   <x-check-box
                                       name="safety[]"
                                       :options="$safeties"/>
                               </div>

                               <div class="">
                                   <h3 class="mb-4">Equipments</h3>
                                   <x-check-box
                                       name="equipments[]"
                                       :options="$equipments"/>
                               </div>
                           </div>
                       </div>
                        <div class="form-group  w-100 mb-5 ">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="5"></textarea>
                        </div>
                    </div>
                    <h3 class="mt-5">Images</h3>
                    <small>The first image will be displayed as the main image! (max 10 images)</small>
                    <div id="my-dropzone" class="dropzone"></div>
                    <div class="w-50 mx-auto my-5">
                        <button class="btn btn-success my-5 w-100 mx-auto">Submit</button>
                    </div>
                </form>


            </div>
        </div>
    </div>

@endsection


@section('custom_scripts')
    <script type="text/javascript">
        let csrfToken =  $('meta[name="csrf-token"]').attr('content');
        let dropzone = new Dropzone("#my-dropzone", {
            url: "{{ route('cars.store') }}",
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            thumbnailWidth: 250,
            maxFilesize: 2, //2MB,
            acceptedFiles: ".jpeg,.jpg,.png",
            addRemoveLinks: true,
            dictDefaultMessage: '<span class="text-center"><span class="font-lg visible-xs-block visible-sm-block visible-lg-block"><span class="font-lg"><i class="fa fa-caret-right text-danger"></i> Drop files <span class="font-xs">to upload</span></span><span>&nbsp&nbsp<p class="display-inline"> (Or Click)</p></span>',
            dictRemoveFile: "Remove",

        });

        $('#registered').click(function (){
            if($(this).is(':checked')){
                $('#registration').attr('disabled', 'disabled');
            } else {
                $('#registration').removeAttr('disabled');
            }
        })
    </script>
@endsection
