@extends('layouts.admin')

@section('custom_links')
    <style>
        .paragraph-p {
            border: 1px solid #ced4da;
            padding: 0.375rem 0.75rem;
            margin-bottom: 0;
            font-size: 1rem;
            line-height: 1.5;
            color: #495057;
            border-radius: 0.25rem;
        }
    </style>

@endsection
@section('title') Car @endsection
@section('content')
    <div class="col-12">
        <div class="full white_shd margin_bottom_30 p-5">
            <div class="row">
                <div class="col-3 mb-5">
                    <img src="{{asset('assets/img' . '/'. $car->primary_image)}}" class="img-fluid" alt="primaryImage">
                </div>
                @foreach($car->images as $image)
                    <div class="col-3 mb-5">
                        <img src="{{asset('assets/img' . '/' . $image->path)}}" class="img-fluid">
                    </div>
                @endforeach

            </div>
            <div class="form-row mt-5">
                <div class="form-group col-md-3">
                    <p class="m-0 p-0">Car Name</p>
                    <p class="paragraph-p">{{$car->name}}</p>
                </div>
                <div class="form-group col-md-2">
                    <p class="m-0 p-0">Model</p>
                    <p class="paragraph-p">{{$car->model['name']}}</p>
                </div>
                <div class="form-group col-md-2">
                    <p class="m-0 p-0">Brand</p>
                    <p class="paragraph-p">{{$car->model['brand']->name}}</p>
                </div>
                <div class="form-group col-md-2">
                    <p class="m-0 p-0">Body</p>
                    <p class="paragraph-p">{{$car->model['body']->name}}</p>
                </div>
                <div class="form-group col-md-2 ">
                    <p class="m-0 p-0">Price</p>
                    <p class="paragraph-p">{{$car->price}}$</p>
                </div>
                <div class="form-group col-md-2 my-5">
                    <p class="m-0 p-0">Kilometers</p>
                    <p class="paragraph-p">{{$car->kilometers}}</p>
                </div>

                <div class="form-group col-md-2 my-5">
                    <p class="m-0 p-0">Year</p>
                    <p class="paragraph-p">{{$car->year}}</p>
                </div>
                <div class="form-group col-md-2 my-5">
                    <p class="m-0 p-0">Engine value</p>
                    <p class="paragraph-p">{{$car->engine['engine_value']}}</p>
                </div>
                <div class="form-group col-md-2 my-5">
                    <p class="m-0 p-0">Horsepower</p>
                    <p class="paragraph-p">{{$car->engine['horsepower']}}</p>
                </div>
                <div class="form-group col-md-2 my-5">
                    <p class="m-0 p-0">Transmission</p>
                    <p class="paragraph-p">{{$car->engine['transmission']->name}}</p>
                </div>
                <div class="form-group col-md-2 my-5">
                    <p class="m-0 p-0">Drive Type</p>
                    <p class="paragraph-p">{{$car->drive_type['name']}}</p>
                </div>
                <div class="form-group col-md-2 mt-4 mb-3">
                    <p class="m-0 p-0">Fuel</p>
                    <p class="paragraph-p">{{$car->engine['fuel']->name}}</p>
                </div>
                <div class="form-group col-md-2 mt-4 mb-3">
                    <p class="m-0 p-0">Color</p>
                    <p class="paragraph-p">{{$car->color['name']}}</p>
                </div>
                <div class="form-group col-md-2 mt-4 mb-3">
                    <p class="m-0 p-0">Doors</p>
                    <p class="paragraph-p">{{$car->model['doors']->name}}</p>
                </div>
                <div class="form-group col-md-2 mt-4 mb-3">
                    <p class="m-0 p-0">Seats</p>
                    <p class="paragraph-p">{{$car->model['seat']->value}}</p>
                </div>
                <div class="form-group col-md-2 mt-4 mb-3">
                    <p class="m-0 p-0">Registration</p>
                    <p class="paragraph-p">{{$car->registration ?? '/'}}</p>
                </div>
        </div>
            <div class="row mt-5">
                <div class="col-md-6">
                    <div class="white_shd full margin_bottom_30">
                        <div class="full graph_head">
                            <div class="heading1 margin_0">
                                <h2>Safeties</h2>
                            </div>

                        </div>

                        <div class="table_section padding_infor_info ">
                            <div class="table-responsive-sm">
                                @if(count($car->safeties))
                                    <table class="table table-light table-striped">
                                        <tbody>
                                        @foreach($car->safeties as $safety)
                                            <tr>
                                                <td>{{$safety->name}}</td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                @else
                                    <div class="alert alert-danger">
                                        <p>No safeties</p>
                                    </div>
                                @endif


                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-6">
                    <div class="white_shd full margin_bottom_30">
                        <div class="full graph_head">
                            <div class="heading1 margin_0">
                                <h2>Equipments</h2>
                            </div>
                        </div>
                        <div class="table_section padding_infor_info">
                            <div class="table-responsive-sm">
                                @if(count($car->equipment))
                                    <table class="table table-light table-striped">
                                        <tbody>
                                        @foreach($car->equipment as $equipment)
                                            <tr>
                                                <td>{{$equipment->name}}</td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                @else
                                    <div class="alert alert-danger">
                                        <p>No equipments</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <div class="mt-4 {{$car->is_published ? '' : 'd-none'}}">
                <h5><i class="fa fa-heart red_color "></i> Total saved: {{$totalSaved}} </h5>
            </div>
            @if($car->is_published)
                <div class="mt-5">
                    <p class="p-3 bg-success text-light text-center w-50 mx-auto" style="border-radius: 5px">Published</p>
                </div>
            @else
                <div class="row">
                    <div class="col-6 mt-5">
                        <p class="btn btn-danger w-100">Delete</p>
                    </div>
                    <div class="col-6 mt-5">
                        <p class="btn btn-warning w-100 approveCar" id="{{$car->id}}">Approve</p>
                    </div>
                </div>
            @endif

    </div>

@endsection
