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
                    </tr>
                    </thead>
                    <tbody>
                    @for($i = 1; $i < 10; $i++)
                        <tr class="text-center">
                            <td>{{$i}}</td>
                            <td>Car {{$i}}</td>
                            <td>Model {{$i}}</td>
                            <td>Brand {{$i}}</td>
                            <td>10</td>
                        </tr>
                    @endfor
                    </tbody>
            </table>
        </div>
    </div>

@endsection
