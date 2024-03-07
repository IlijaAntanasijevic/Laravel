@extends('layouts.layout')

@section('title') User Cars @endsection

@section('custom_links')
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin: 0 auto;
        }

        th {
            background-color: #f2f2f2;
            padding: 10px;
            text-align: center;
        }
        td {
            text-align: center;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f2f2f2;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div>
            <nav>
                <ul class="nav ">
                    <li class="nav-item">
                        <a href="{{route('profile.index')}}" class="nav-link text-danger h5">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('wishlist.index')}}" class="nav-link text-danger h5">Wishlist</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div>
            <h1 class="text-center">Cars</h1>
            <table class="my-5">
                <thead>
                    <tr>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>Year</th>
                        <th>Price</th>
                        <th>Actions</th>
                        <th>Actions</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cars as $car)
                        <tr class="my-3">
                            <td>{{$car->model['brand']->name}}</td>
                            <td>{{$car->model['name']}}</td>
                            <td>{{$car->year}}</td>
                            <td>{{$car->price}}</td>
                            <td>
                               {{-- <a href="{{route('car.show', $car->id)}}" class="btn btn-primary">Show</a>
                                <a href="{{route('car.edit', $car->id)}}" class="btn btn-warning">Edit</a>--}}
                                <a href="{{route('cars.show', $car->id)}}" class="btn btn-primary">Show</a>
                            </td>
                            <td>
                                <a href="{{route('profile.cars.edit',$car->id)}}" class="btn btn-warning">Edit</a>
                            </td>
                            <td>
                                <form action="#" method="POST">{{--{{route('car.destroy', $car->id)}}--}}
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success">Sold</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
