@extends('layouts.admin')

@section('title') Wishlist @endsection
@section('content')
    <div class="table_section padding_infor_info">
        <div class="table-responsive-sm">
            <table class="table table-striped projects">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th style="width: 2%">No</th>
                        <th>Car Name</th>
                        <th>Model</th>
                        <th>Brand</th>
                        <th>Total saved</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cars as $car)
                        <tr class="text-center">
                            <td>{{$car->id}}</td>
                            <td>{{$car->name}}</td>
                            <td>{{$car->model->model->name}}</td>
                            <td>{{$car->model['brand']->name}}</td>
                            <td>{{$car->total_saved}}</td>
                            <td>
                                <a href="{{route('admin.car.show',[$car->id])}}" class="btn btn-info text-light">View</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
            </table>
        </div>
    </div>

@endsection
