@extends('layouts.layout')

@section('title') 404 @endsection

@section('content')
    <div class="pages-404">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="error404-content">
                        <div class="error404">4<span>0</span>4</div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="nobottomborder">
                        <h1>Ooops, This Page Could Not Be Found!</h1>
                        <p>The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
                        <div class="row">
                            <div class="col-xl-9 col-lg-10 col-md-8 col-sm-10 col-xs-10">
                                <div class="coming-form clearfix">
                                    <div class="hr"></div>
                                </div>
                                <a href="{{url()->previous()}}" class="btn btn-danger mt-3" style="padding-top: 12px;">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
