@extends('layouts.layout')

@section('title') Wish List @endsection

@section('content')
    <div class="featured-car content-area-2 ">
        <div class="container">
            <div class="main-title">
                @if(count($data))
                    <h1>Wish List</h1>
                @else
                    <h1 class="my-5 text-danger">Your wish list is empty</h1>
                @endif
            </div>
            <div class="row">
                @foreach($data as $item)
                    @component('pages.cars.homeCard', ['car' => $item->car, 'showOverlay' => false])
                    @endcomponent
                @endforeach
            </div>
        </div>
    </div>
@endsection
