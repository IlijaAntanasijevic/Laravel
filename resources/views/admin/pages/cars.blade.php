@extends('layouts.admin')

@section('title') Available Cars @endsection
@section('content')
    <div class="row column1">

        {{--CARCARD PARTIALS FOLDER --}}

        @foreach($cars as $car)
            @component('admin.partials.carCard', ['car' => $car])@endcomponent
        @endforeach

    </div>
@endsection
