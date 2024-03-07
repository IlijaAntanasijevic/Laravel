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
                        <tr class="my-3" id="carBlock-{{$car->id}}">
                            <td>{{$car->model['brand']->name}}</td>
                            <td>{{$car->model['name']}}</td>
                            <td>{{$car->year}}</td>
                            <td>{{$car->price}}</td>
                            <td>
                                <a href="{{route('cars.show', $car->id)}}" class="btn btn-info">Show</a>
                            </td>
                            <td>
                                <a href="{{route('profile.cars.edit',$car->id)}}" class="btn btn-warning">Edit</a>
                            </td>
                            <td>
                                <a href="#" class="btn btn-success sold" id="{{$car->id}}">Sold</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection

@section('custom_scripts')
    <script>
        $('.sold').click(function (e) {
            e.preventDefault();
            let id = $(this).attr('id');
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#8bee6b",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, sold it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    soldCar(id);
                }
            });

        });

       function soldCar(id) {
           $.ajax({
               url: `{{route('profile.cars.sold')}}`,
               method: 'PATCH',
               data: {
                   "_token": "{{ csrf_token() }}",
                   "id": id
               },
               success: function () {
                   $('#carBlock-' + id).remove();
                   Swal.fire({
                       title: "Success!",
                       text: "Car is sold.",
                       icon: "success"
                   });
               },
               error: function (xhr) {
                   Swal.fire("Server error", "Changes are not saved", "error");
                   console.log(xhr)
               }
           })
       }

    </script>


@endsection
