@extends('layouts.admin')

@section('title') Update @endsection
@section('content')
    <div class="col-md-12">
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
                <div class="heading1 margin_0">
                    <h2>Update Information</h2>
                </div>
                @if(session("error"))
                    <div class="alert alert-danger">
                        <p class="text-center">{{session('error')}}</p>
                    </div>
                @endif
                @if(session('success'))
                    <div class="alert alert-success">
                        <p class="text-center">{{session('success')}}</p>
                    </div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li class="text-danger">{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <div class="full inner_elements">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tab_style2">
                            <div class="tabbar padding_infor_info">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab1" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-home-tab2" data-toggle="tab" href="#nav-model" role="tab" aria-controls="nav-home_s2" aria-selected="true">Model</a>
                                        <a class="nav-item nav-link" id="nav-contact-tab2" data-toggle="tab" href="#nav-brand" role="tab" aria-controls="nav-contacts_s2" aria-selected="false">Brand</a>
                                        <a class="nav-item nav-link" id="nav-profile-tab2" data-toggle="tab" href="#nav-colors" role="tab" aria-controls="nav-profile_s2" aria-selected="false">Colors</a>
                                        <a class="nav-item nav-link" id="nav-contact-tab2" data-toggle="tab" href="#nav-seats" role="tab" aria-controls="nav-contacts_s2" aria-selected="false">Seats</a>
                                        <a class="nav-item nav-link" id="nav-contact-tab2" data-toggle="tab" href="#nav-doors" role="tab" aria-controls="nav-contacts_s2" aria-selected="false">Doors</a>
                                        <a class="nav-item nav-link" id="nav-contact-tab2" data-toggle="tab" href="#nav-body" role="tab" aria-controls="nav-contacts_s2" aria-selected="false">Bodies</a>
                                        <a class="nav-item nav-link" id="nav-contact-tab2" data-toggle="tab" href="#nav-drive_type" role="tab" aria-controls="nav-contacts_s2" aria-selected="false">Drive Type</a>
                                        <a class="nav-item nav-link" id="nav-contact-tab2" data-toggle="tab" href="#nav-transmission" role="tab" aria-controls="nav-contacts_s2" aria-selected="false">Transmission</a>
                                        <a class="nav-item nav-link" id="nav-contact-tab2" data-toggle="tab" href="#nav-fuels" role="tab" aria-controls="nav-contacts_s2" aria-selected="false">Fuels</a>
                                    </div>
                                </nav>

                                <div class="tab-content" id="nav-tabContent_2">
                                    <div class="tab-pane fade show active" id="nav-model" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <form action="{{route('admin.car.add.model')}}" method="POST">
                                            @csrf
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="modelName">Model Name</label>
                                                    <input type="text" class="form-control" id="modelName" name="modelName" />
                                                    @error('modelName')
                                                    <p class="text-danger">{{$message}}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="brandId">Brand</label>
                                                    <select id="brandId" name="brandId" class="form-control">
                                                        @foreach($brands as $brand)
                                                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('brandId')
                                                    <p class="text-danger">{{$message}}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="bodyId">Body</label>
                                                    <select id="bodyId" name="bodyId" class="form-control">
                                                        @foreach($bodies as $body)
                                                            <option value="{{$body->id}}">{{$body->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('bodyId')
                                                    <p class="text-danger">{{$message}}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="seatsId">Seats</label>
                                                    <select id="seatsId" name="seatsId" class="form-control">
                                                        @foreach($seats as $seat)
                                                            <option value="{{$seat->id}}">{{$seat->value}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('seatsId')
                                                    <p class="text-danger">{{$message}}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="doorsId">Doors</label>
                                                    <select id="doorsId" name="doorsId" class="form-control">
                                                        @foreach($doors as $door)
                                                            <option value="{{$door->id}}">{{$door->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('doorsId')
                                                    <p class="text-danger">{{$message}}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <button class="btn btn-success float-right w-25 mt-4 ">Save</button>

                                        </form>

                                        <div class="heading1 margin_0 mt-5">
                                            <h2>Available Models</h2>
                                        </div>
                                        <div class="table_section padding_infor_info pt-0 px-0 ">
                                            <div class="table-responsive-sm">
                                                <table class="table table-light table-striped">
                                                    <thead>
                                                    <tr class="text-center">
                                                        <th>Model Name</th>
                                                        <th>Brand</th>
                                                        <th>Body</th>
                                                        <th>Seats</th>
                                                        <th>Doors</th>
                                                        <th>Total in use</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($models as $model)
                                                        <tr class="text-center" id="model-{{$model->id}}">
                                                            <td>{{$model->name}}</td>
                                                            <td>{{$model->brand->name}}</td>
                                                            <td>{{$model->body->name}}</td>
                                                            <td>{{$model->seat->value}}</td>
                                                            <td>{{$model->doors->name}}</td>
                                                            <td>{{$model->total_in_use}}</td>
                                                            <td>
                                                                <a href="#" class="btn btn-danger btn-xs deleteModel" id="{{$model->id}}">Delete</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade show" id="nav-brand" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <form action="{{route('admin.car.add.brand')}}" method="POST">
                                            @csrf
                                            <div class="form-row align-items-center">
                                                <div class="form-group col-md-4">
                                                    <label for="brandName">Brand Name</label>
                                                    <input type="text" class="form-control" id="brandName" name="brandName" />
                                                </div>
                                                <div class="form-group col-md-5 mt-4 ml-3">
                                                    <button class="btn btn-success w-25 mt-1 ">Save</button>
                                                </div>

                                            </div>
                                            @error('brandName')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </form>
                                        <div class="heading1 margin_0 mt-5">
                                            <h2>Available Brands</h2>
                                        </div>
                                        <div class="table_section padding_infor_info pt-0 px-0 ">
                                            <div class="table-responsive-sm">
                                                <table class="table table-light table-striped">
                                                    <thead>
                                                    <tr class="text-center">
                                                        <th>Name</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($brands as $brand)
                                                        <tr class="text-center" id="brand-{{$brand->id}}">
                                                            <td>{{ucfirst($brand->name)}}</td>
                                                            <td>
                                                                <a href="#" class="btn btn-danger btn-xs deleteBrand" id="{{$brand->id}}" >Delete</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade show" id="nav-colors" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <form action="{{route('admin.car.add.color')}}" method="POST">
                                            @csrf
                                            <div class="form-row align-items-center">
                                                <div class="form-group col-md-4">
                                                    <label for="colorName">Color Name</label>
                                                    <input type="text" class="form-control" id="colorName" name="colorName" />
                                                </div>
                                                <div class="form-group col-md-5 mt-4 ml-3">
                                                    <button class="btn btn-success w-25 mt-1 ">Save</button>
                                                </div>

                                            </div>
                                            @error('colorName')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </form>
                                        <div class="heading1 margin_0 mt-5">
                                            <h2>Available Colors</h2>
                                        </div>
                                        <div class="table_section padding_infor_info pt-0 px-0 ">
                                            <div class="table-responsive-sm">
                                                <table class="table table-light table-striped">
                                                    <thead>
                                                    <tr class="text-center">
                                                        <th>Color</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($colors as $color)
                                                        <tr class="text-center" id="color-{{$color->id}}">
                                                            <td>{{ucfirst($color->name)}}</td>
                                                            <td>
                                                                <a href="#" class="btn btn-danger btn-xs deleteColor" id="{{$color->id}}">Delete</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade show" id="nav-seats" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <form action="{{route('admin.car.add.seats')}}" method="POST">
                                            @csrf
                                            <div class="form-row align-items-center">
                                                <div class="form-group col-md-4">
                                                    <label for="seatsValue">Seats Value</label>
                                                    <input type="text" class="form-control" id="seatsValue" name="seatsValue" />
                                                </div>
                                                <div class="form-group col-md-5 mt-4 ml-3">
                                                    <button class="btn btn-success w-25 mt-1 ">Save</button>
                                                </div>
                                            </div>
                                            @error('seatsValue')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </form>
                                        <div class="heading1 margin_0 mt-5">
                                            <h2>Available Seats</h2>
                                        </div>
                                        <div class="table_section padding_infor_info pt-0 px-0 ">
                                            <div class="table-responsive-sm">
                                                <table class="table table-light table-striped">
                                                    <thead>
                                                    <tr class="text-center">
                                                        <th>Value</th>
                                                        <th>Action</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($seats as $seat)
                                                        <tr class="text-center" id="seats-{{$seat->id}}">
                                                            <td>{{$seat->value}}</td>
                                                            <td>
                                                                <a href="#" class="btn btn-danger btn-xs deleteSeats" id="{{$seat->id}}">Delete</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade show" id="nav-doors" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <form action="{{route('admin.car.add.doors')}}" method="POST">
                                            @csrf
                                            <div class="form-row align-items-center">
                                                <div class="form-group col-md-4">
                                                    <label for="doorValue">Door Value</label>
                                                    <input type="text" placeholder="4/5" class="form-control" id="doorValue" name="doorValue" />
                                                </div>
                                                <div class="form-group col-md-5 mt-4 ml-3">
                                                    <button class="btn btn-success w-25 mt-1 ">Save</button>
                                                </div>
                                            </div>
                                            @error('doorValue')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </form>
                                        <div class="heading1 margin_0 mt-5">
                                            <h2>Available Doors</h2>
                                        </div>
                                        <div class="table_section padding_infor_info pt-0 px-0 ">
                                            <div class="table-responsive-sm">
                                                <table class="table table-light table-striped">
                                                    <thead>
                                                    <tr class="text-center">
                                                        <th>Door</th>
                                                        <th>Action</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($doors as $door)
                                                        <tr class="text-center" id="doors-{{$door->id}}">
                                                            <td>{{$door->name}}</td>
                                                            <td>
                                                                <a href="#" class="btn btn-danger btn-xs deleteDoors" id="{{$door->id}}">Delete</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade show" id="nav-body" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <form action="{{route('admin.car.add.body')}}" method="POST">
                                            @csrf
                                            <div class="form-row align-items-center">
                                                <div class="form-group col-md-4">
                                                    <label for="bodyName">Body Type Value</label>
                                                    <input type="text" class="form-control" id="bodyName" name="bodyName" />
                                                </div>
                                                <div class="form-group col-md-5 mt-4 ml-3">
                                                    <button class="btn btn-success w-25 mt-1 ">Save</button>
                                                </div>
                                            </div>
                                            @error('bodyName')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </form>
                                        <div class="heading1 margin_0 mt-5">
                                            <h2>Available Body Types</h2>
                                        </div>
                                        <div class="table_section padding_infor_info pt-0 px-0 ">
                                            <div class="table-responsive-sm">
                                                <table class="table table-light table-striped">
                                                    <thead>
                                                    <tr class="text-center">
                                                        <th>Body Type</th>
                                                        <th>Action</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($bodies as $body)
                                                        <tr class="text-center" id="body-{{$body->id}}">
                                                            <td>{{$body->name}}</td>
                                                            <td>
                                                                <a href="#" class="btn btn-danger btn-xs deleteBody" id="{{$body->id}}">Delete</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade show" id="nav-drive_type" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <form action="{{route('admin.car.add.drive-type')}}" method="POST">
                                            @csrf
                                            <div class="form-row align-items-center">
                                                <div class="form-group col-md-4">
                                                    <label for="driveTypeName">Drive Type Value</label>
                                                    <input type="text" class="form-control" id="driveTypeName" name="driveTypeName" />
                                                </div>
                                                <div class="form-group col-md-5 mt-4 ml-3">
                                                    <button class="btn btn-success w-25 mt-1 ">Save</button>
                                                </div>
                                            </div>
                                            @error('driveTypeName')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </form>
                                        <div class="heading1 margin_0 mt-5">
                                            <h2>Available Drive Types</h2>
                                        </div>
                                        <div class="table_section padding_infor_info pt-0 px-0 ">
                                            <div class="table-responsive-sm">
                                                <table class="table table-light table-striped">
                                                    <thead>
                                                    <tr class="text-center">
                                                        <th>Drive Type</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($driveTypes as $type)
                                                        <tr class="text-center" id="driveType-{{$type->id}}">
                                                            <td>{{$type->name}}</td>
                                                            <td>
                                                                <a href="#" class="btn btn-danger btn-xs deleteDriveType" id="{{$type->id}}">Delete</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade show" id="nav-transmission" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <form method="POST" action="{{route('admin.car.add.transmission')}}">
                                            @csrf
                                            <div class="form-row align-items-center">
                                                <div class="form-group col-md-4">
                                                    <label for="transmissionValue">Transmission</label>
                                                    <input type="text" class="form-control" id="transmissionValue" name="transmissionValue" />
                                                </div>
                                                <div class="form-group col-md-5 mt-4 ml-3">
                                                    <button class="btn btn-success w-25 mt-1 ">Save</button>
                                                </div>
                                            </div>
                                            @error('transmissionValue')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </form>
                                        <div class="heading1 margin_0 mt-5">
                                            <h2>Available Transmissions</h2>
                                        </div>
                                        <div class="table_section padding_infor_info pt-0 px-0 ">
                                            <div class="table-responsive-sm">
                                                <table class="table table-light table-striped">
                                                    <thead>
                                                    <tr class="text-center">
                                                        <th>Transmission</th>
                                                        <th>Action</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($transmissions as $transmission)
                                                        <tr class="text-center" id="transmission-{{$transmission->id}}">
                                                            <td>{{$transmission->name}}</td>
                                                            <td>
                                                                <a href="#" class="btn btn-danger btn-xs deleteTransmission" id="{{$transmission->id}}">Delete</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade show" id="nav-fuels" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <form method="POST" action="{{route('admin.car.add.fuel')}}">
                                            @csrf
                                            <div class="form-row align-items-center">
                                                <div class="form-group col-md-4">
                                                    <label for="fuelValue">Fuel Value</label>
                                                    <input type="text" class="form-control" id="fuelValue" name="fuelValue" />
                                                </div>
                                                <div class="form-group col-md-5 mt-4 ml-3">
                                                    <button class="btn btn-success w-25 mt-1 ">Save</button>
                                                </div>
                                            </div>
                                            @error('fuelValue')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </form>
                                        <div class="heading1 margin_0 mt-5">
                                            <h2>Available Fuels</h2>
                                        </div>
                                        <div class="table_section padding_infor_info pt-0 px-0 ">
                                            <div class="table-responsive-sm">
                                                <table class="table table-light table-striped">
                                                    <thead>
                                                    <tr class="text-center">
                                                        <th>Fuel</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($fuels as $fuel)
                                                        <tr class="text-center" id="fuel-{{$fuel->id}}">
                                                            <td>{{$fuel->name}}</td>
                                                            <td>
                                                                <a href="#" class="btn btn-danger btn-xs deleteFuel" id="{{$fuel->id}}">Delete</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
