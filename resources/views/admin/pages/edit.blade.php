@extends('layouts.admin')

@section('title') Update @endsection
@section('content')
    <div class="col-md-12">
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
                <div class="heading1 margin_0">
                    <h2>Update Information</h2>
                </div>
            </div>
            <div class="full inner_elements">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tab_style2">
                            <div class="tabbar padding_infor_info">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab1" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-home-tab2" data-toggle="tab" href="#nav-model" role="tab" aria-controls="nav-home_s2" aria-selected="true">Model</a>
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
                                        <form>
                                            @csrf
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="modelName">Model Name</label>
                                                    <input type="text" class="form-control" id="modelName" name="modelName" />
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="brandId">Brand</label>
                                                    <select id="brandId" name="brandId" class="form-control">
                                                        <option>Brand</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="bodyId">Body</label>
                                                    <select id="bodyId" name="bodyId" class="form-control">
                                                        <option>Body</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="seatsId">Seats</label>
                                                    <select id="seatsId" name="seatsId" class="form-control">
                                                        <option>Seats</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="seatsId">Doors</label>
                                                    <select id="seatsId" name="seatsId" class="form-control">
                                                        <option>Seats</option>
                                                    </select>
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
                                                    <tr class="text-center">
                                                        <td>Test</td>
                                                        <td>BMW</td>
                                                        <td>SUV</td>
                                                        <td>5</td>
                                                        <td>4/5</td>
                                                        <td>20</td>
                                                        <td>
                                                            <a href="#" class="btn btn-danger btn-xs">Delete</a>
                                                        </td>
                                                    </tr>


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade show" id="nav-colors" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <form>
                                            @csrf
                                            <div class="form-row align-items-center">
                                                <div class="form-group col-md-4">
                                                    <label for="modelName">Color Name</label>
                                                    <input type="text" class="form-control" id="modelName" name="modelName" />
                                                </div>
                                                <div class="form-group col-md-5 mt-4 ml-3">
                                                    <button class="btn btn-success w-25 mt-1 ">Save</button>
                                                </div>
                                            </div>
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
                                                        <th>Total in use</th>
                                                        <th>Action</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr class="text-center">
                                                        <td>Red</td>
                                                        <td>10</td>
                                                        <td>
                                                            <a href="#" class="btn btn-danger btn-xs">Delete</a>
                                                        </td>
                                                    </tr>


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade show" id="nav-seats" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <form>
                                            @csrf
                                            <div class="form-row align-items-center">
                                                <div class="form-group col-md-4">
                                                    <label for="modelName">Seats Value</label>
                                                    <input type="text" class="form-control" id="modelName" name="modelName" />
                                                </div>
                                                <div class="form-group col-md-5 mt-4 ml-3">
                                                    <button class="btn btn-success w-25 mt-1 ">Save</button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="heading1 margin_0 mt-5">
                                            <h2>Available Seats</h2>
                                        </div>
                                        <div class="table_section padding_infor_info pt-0 px-0 ">
                                            <div class="table-responsive-sm">
                                                <table class="table table-light table-striped">
                                                    <thead>
                                                    <tr class="text-center">
                                                        <th>Color</th>
                                                        <th>Total in use</th>
                                                        <th>Action</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr class="text-center">
                                                        <td>Red</td>
                                                        <td>10</td>
                                                        <td>
                                                            <a href="#" class="btn btn-danger btn-xs">Delete</a>
                                                        </td>
                                                    </tr>


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade show" id="nav-doors" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <form>
                                            @csrf
                                            <div class="form-row align-items-center">
                                                <div class="form-group col-md-4">
                                                    <label for="modelName">Door Value</label>
                                                    <input type="text" class="form-control" id="modelName" name="modelName" />
                                                </div>
                                                <div class="form-group col-md-5 mt-4 ml-3">
                                                    <button class="btn btn-success w-25 mt-1 ">Save</button>
                                                </div>
                                            </div>
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
                                                        <th>Total used</th>
                                                        <th>Action</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr class="text-center">
                                                        <td>Red</td>
                                                        <td>10</td>
                                                        <td>
                                                            <a href="#" class="btn btn-danger btn-xs">Delete</a>
                                                        </td>
                                                    </tr>


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade show" id="nav-body" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <form>
                                            @csrf
                                            <div class="form-row align-items-center">
                                                <div class="form-group col-md-4">
                                                    <label for="modelName">Body Type Value</label>
                                                    <input type="text" class="form-control" id="modelName" name="modelName" />
                                                </div>
                                                <div class="form-group col-md-5 mt-4 ml-3">
                                                    <button class="btn btn-success w-25 mt-1 ">Save</button>
                                                </div>
                                            </div>
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
                                                        <th>Total in use</th>
                                                        <th>Action</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr class="text-center">
                                                        <td>Red</td>
                                                        <td>10</td>
                                                        <td>
                                                            <a href="#" class="btn btn-danger btn-xs">Delete</a>
                                                        </td>
                                                    </tr>


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade show" id="nav-drive_type" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <form>
                                            @csrf
                                            <div class="form-row align-items-center">
                                                <div class="form-group col-md-4">
                                                    <label for="modelName">Drive Type Value</label>
                                                    <input type="text" class="form-control" id="modelName" name="modelName" />
                                                </div>
                                                <div class="form-group col-md-5 mt-4 ml-3">
                                                    <button class="btn btn-success w-25 mt-1 ">Save</button>
                                                </div>
                                            </div>
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
                                                        <th>Total in use</th>
                                                        <th>Action</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr class="text-center">
                                                        <td>Red</td>
                                                        <td>10</td>
                                                        <td>
                                                            <a href="#" class="btn btn-danger btn-xs">Delete</a>
                                                        </td>
                                                    </tr>


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade show" id="nav-transmission" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <form>
                                            @csrf
                                            <div class="form-row align-items-center">
                                                <div class="form-group col-md-4">
                                                    <label for="modelName">Transmission</label>
                                                    <input type="text" class="form-control" id="modelName" name="modelName" />
                                                </div>
                                                <div class="form-group col-md-5 mt-4 ml-3">
                                                    <button class="btn btn-success w-25 mt-1 ">Save</button>
                                                </div>
                                            </div>
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
                                                        <th>Total in use</th>
                                                        <th>Action</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr class="text-center">
                                                        <td>Red</td>
                                                        <td>10</td>
                                                        <td>
                                                            <a href="#" class="btn btn-danger btn-xs">Delete</a>
                                                        </td>
                                                    </tr>


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade show" id="nav-fuels" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <form>
                                            @csrf
                                            <div class="form-row align-items-center">
                                                <div class="form-group col-md-4">
                                                    <label for="modelName">Fuel Value</label>
                                                    <input type="text" class="form-control" id="modelName" name="modelName" />
                                                </div>
                                                <div class="form-group col-md-5 mt-4 ml-3">
                                                    <button class="btn btn-success w-25 mt-1 ">Save</button>
                                                </div>
                                            </div>
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
                                                        <th>Total in use</th>
                                                        <th>Action</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr class="text-center">
                                                        <td>Red</td>
                                                        <td>10</td>
                                                        <td>
                                                            <a href="#" class="btn btn-danger btn-xs">Delete</a>
                                                        </td>
                                                    </tr>


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
