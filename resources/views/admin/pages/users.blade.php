@extends('layouts.admin')

@section('title') Users @endsection
@section('content')
    <div class="row column1">
        <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
                <div class="full price_table padding_infor_info">
                    <div class="row">


                        @foreach($users as $user)
                            @component('admin.partials.userCard', ['user' => $user])@endcomponent
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
