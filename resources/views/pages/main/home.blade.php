@extends('layouts.layout')

@section('title') Home @endsection

@section('content')
    @include('pages.cars.homeSearchBar')
    <div class="featured-car content-area-2">
        <div class="container">
            <div class="main-title">
                <h1>Newest Car</h1>
            </div>
            <div class="row" id="showCars">
               @foreach($cars as $car)
                    @component('pages.cars.homeCard', ['car' => $car , 'showOverlay' => true])
                    @endcomponent
                @endforeach

            </div>
            <div class="row justify-content-center h1 my-5">
                <div id="showMoreHome" data-page="1">View more</div>
            </div>
        </div>
    </div>
@endsection

@php
    $userId = Auth::id() ? Auth::id() : null;

@endphp

@section('custom_scripts')
    <script type="text/javascript">
        $(document).ready(function () {

            // ** Model Dropdown ** //
            $('#brandHome').change(function () {
                let brandId = $(this).val();
                if (brandId === '0') {
                    $('#modelHome').html('<option value="0">Model</option>');
                    $('#modelHome').attr('disabled', 'disabled');
                    return;
                }
                $.ajax({
                    url: "{{route('get.models')}}",
                    data: {
                        id: brandId
                    },
                    method: 'GET',
                    success: function (response) {
                        let options = '<option value="0">Model</option>';
                        response.forEach(function (model) {
                            options += `<option value="${model.id}">${model.name}</option>`;
                        });
                        options += `<option value='other'>Other</option>`;
                        $('#modelHome').html(options);
                        $('#modelHome').removeAttr('disabled');
                    }
                });
            });
            // ** End Model DDL ** //

            // ** Wishlist ** //
            $(document).on('click', '.wishList', function () {
                alert();
                let carId = $(this).data('id');
                let userId = @json($userId);


                if($(this).hasClass('checked')){
                    $.ajax({
                        url: '{{route('remove.wishlist')}}',
                        method: 'DELETE',
                        data: {
                            carId: carId,
                            userId: userId,
                            _token: '{{csrf_token()}}'
                        },
                        success: function(data) {
                            let message = data.message;
                            $('#carWish-'+carId).removeClass('checked');
                            $('#carWish-'+carId).html('<i class="fa fa-heart-o" aria-hidden="true"></i>')
                            toastr.warning(message)
                        },
                        error: function (xhr){
                            if(xhr.status === 401){
                                toastr.error('You must be logged in to add to wishlist');
                            }
                            else if(xhr.status === 404){
                                toastr.error('Car not found in wishlist.');
                            }
                            else {
                                toastr.error('Something went wrong');
                            }
                        }
                    })
                }
                else {
                    $.ajax({
                        url: '{{route('wishlist')}}',
                        method: 'POST',
                        data: {
                            carId: carId,
                            userId: userId,
                            _token: '{{csrf_token()}}'
                        },
                        success: function (data) {
                            let message = data.message;
                            $('#carWish-'+carId).addClass('checked');
                            $('#carWish-'+carId).html('<i class="fa fa-heart" aria-hidden="true"></i>')
                            toastr.success(message)
                        },
                        error: function (xhr){
                            if(xhr.status === 401){
                                toastr.error('You must be logged in to add to wishlist');
                            }
                            else {
                                toastr.error('Something went wrong');
                            }
                        }

                    })
                }
            })
            // ** End Wishlist ** //


            // ** View More ** //
            $('#showMoreHome').click(function () {
                let nextPage = parseInt($(this).data('page')) + 1;
                $(this).html('Loading...');
                loadCars(nextPage);
                $(this).data('page', nextPage);
            })



            function loadCars(page){
                $.ajax({
                    url: '/home?page=' + page,
                    method: 'GET',
                    success: function (data) {
                        console.log(data)
                            $('#showMoreHome').show();
                            $('#showMoreHome').html('View more');
                            $('#showCars').append(data.html);
                            if(!data.hasMore){
                                $('#showMoreHome').hide();
                            }
                    },
                    error: function (xhr) {
                        alert('Something went wrong')
                        console.log(xhr)
                    }
                })
            }
            // ** End View More ** //

        });




    </script>
@endsection
