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
        .globalMessages {
            display: none;
        }
    </style>
@endsection

@section('content')

    <div class="container mt-4 min-vh-100 mb-5">
        <div class="row">
            <div class="col-lg-12">
                <h1>Sell Car</h1>
                <hr />
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <x-text-field
                            label="Car Name"
                            parent-class="form-group col-md-6"
                            field-class="form-control"
                            id="name"
                            name="name"
                            :value="old('name')"/>
                        <x-dropdown
                            label="Brand"
                            parent-class="form-group col-md-6"
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
                        <x-text-field
                            label="Kilometers"
                            parent-class="form-group col-md-3"
                            field-class="form-control"
                            type="number"
                            placeholder="22000"
                            id="kilometers"
                            name="kilometers"
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
                            :selected="old('driveType')"/>
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

                        <div class="ml-3 col-md-3" id="registeredBlock">
                            <input type="checkbox"  class="form-check-input" name="registrationCheckbox" id="registrationCheckbox">
                            <label for="registrationCheckbox">Not registered</label>
                        </div>

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
                                   <x-check-box
                                       name="safety[]"
                                       :options="$safeties"
                                        :checked="old('safety')"/>
                               </div>

                               <div class="">
                                   <h3 class="mb-4">Equipments</h3>
                                   <x-check-box
                                       name="equipments[]"
                                       :options="$equipments"
                                        :checked="old('equipments')"/>
                               </div>
                           </div>
                       </div>
                        <div class="form-group  w-100 mb-5 ">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="5">{{old('description')}}</textarea>
                        </div>
                    </div>
                    <h3 class="mt-5">Images</h3>
                    <small>The first image will be displayed as the main image! (max 10 images)</small>
                    <div id="my-dropzone" class="dropzone"></div>
                    <p class="text-danger" id="imageError"></p>

                    <div class="w-50 mx-auto my-5">
                        <button id="submitButton"  class="btn btn-success my-5 w-100 mx-auto">Submit</button>
                        <p class="alert alert-danger text-center globalMessages" id="globalErrorMsg">There is some errors, please check all inputs</p>
                        <p class="alert alert-success text-center globalMessages" id="globalSuccessMsg">Success</p>
                    </div>
                </form>


            </div>
        </div>
    </div>

@endsection


@section('custom_scripts')
    <script type="text/javascript">
       $(document).ready(function () {
           let csrfToken =  $('meta[name="csrf-token"]').attr('content');
           let dropzone = new Dropzone("#my-dropzone", {
               url: "{{ route('cars.store') }}",
               headers: {
                   'X-CSRF-TOKEN': csrfToken
               },

               acceptedFiles: ".jpeg,.jpg,.png",
               addRemoveLinks: true,
               dictDefaultMessage: '<span class="text-center"><span class="font-lg visible-xs-block visible-sm-block visible-lg-block"><span class="font-lg"><i class="fa fa-caret-right text-danger"></i> Drop files <span class="font-xs">to upload</span></span><span>&nbsp&nbsp<p class="display-inline"> (Or Click)</p></span>',
               dictRemoveFile: "Remove",
               uploadMultiple: true,
               maxFiles: 10,
               parallelUploads: 10,
                autoProcessQueue: false,

           });

           $('#registrationCheckbox').click(function (){
               if($(this).is(':checked')){
                   $('#registration').attr('disabled', 'disabled');
               } else {
                   $('#registration').removeAttr('disabled');
               }
           })
           $('#submitButton').click(function (e){
               e.preventDefault();
               //dropzone.processQueue();
               console.log($('#registration').val())

               let formData = new FormData();
                formData.append('name', $('#name').val());
                formData.append('brand', $('#brand').val());
                formData.append('model', $('#model').val());
                formData.append('body', $('#body').val());
                formData.append('year', $('#year').val());
                formData.append('engine', $('#engine').val());
                formData.append('doors', $('#doors').val());
                formData.append('seats', $('#seats').val());
                formData.append('color', $('#color').val());
                formData.append('driveType', $('#driveType').val());
                formData.append('horsepower', $('#horsepower').val());
                formData.append('fuel', $('#fuel').val());
                formData.append('transmission', $('#transmission').val());
                formData.append('registration', $('#registration').val());
                formData.append('price', $('#price').val());
                formData.append('description', $('#description').val());
                formData.append('userId', '{{ Auth::user()->id }}');

                for(let file of dropzone.files){
                    formData.append('images[]', file);
                }

               if ($('input[name="safety[]"]:checked').length === 0) {
                   formData.append('safety', null);
               }
               else {
                   $('input[name="safety[]"]:checked').each(function () {
                       formData.append('safety[]', this.value);
                   })
               }
               if($('input[name="equipments[]"]:checked').length === 0){
                   formData.append('equipments', null);
               }
               else {
                   $('input[name="equipments[]"]:checked').each(function () {
                       formData.append('equipments[]', this.value);
                   })
               }

               $.ajax({
                   url: "{{ route('cars.store') }}",
                   method: 'POST',
                   data: formData,
                   processData: false,
                   contentType: false,
                   headers: {
                       'X-CSRF-TOKEN': csrfToken
                   },
                   success: function (data){
                       $('#globalSuccessMsg').show();
                       console.log(data);
                   },
                   error: function (xhr, status, error){
                       $('#globalErrorMsg').show();
                       if (xhr.status === 422) {
                           let errors = xhr.responseJSON.errors;
                           displayErrors(errors);
                       } else {
                           $('#globalErrorMsg').text("Server error, please try again later!");
                           console.log('Error:', xhr.responseText);
                       }
                   }
               })
           })
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
                       options += `<option value='other'>Other</option>`;
                       $('#model').html(options);
                       $('#model').removeAttr('disabled');
                   }
               })
           })
           function displayErrors(errors) {
               $('.error-message').remove();
               $('#imageError').text('');

               $.each(errors, function (field, messages) {
                   let error_field = $('#' + field);
                   let parent = error_field.closest('.form-group');

                   if(field === 'images'){
                        $('#imageError').text(messages[0]);
                   }

                   if (messages.length > 0) {
                       let errorMessage = $('<p>').addClass('text-danger error-message').text(messages[0]);
                       parent.append(errorMessage);
                   }
               });
           }
       })
    </script>
@endsection
