@extends('layouts.admin')

@section('content')
    <div class="row column1">
        @foreach($cars as $car)
            @component('admin.partials.carCard', ['car' => $car])@endcomponent
        @endforeach
    </div>
@endsection
