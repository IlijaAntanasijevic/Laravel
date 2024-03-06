@extends('layouts.layout')

@section('title') Home @endsection

@section('custom_links')
    <style>
        #titleError {
            display: none;
        }
    </style>
@endsection

@section('content')
    <div class="page_loader"></div>
    @include('pages.cars.homeSearchBar')
    <div class="featured-car content-area-2">
        <div class="container">
            <div class="main-title">
                <h1 id="homeTitle">Newest Car</h1>
                <h3 class="text-left" id="searchedTitle"></h3>
                <h1 id="titleError" class="text-danger">No cars found</h1>
            </div>
            <div class="row" id="showCars">
               @foreach($data as $car)
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
            $('.page_loader').remove();
            //loadCars(1);
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
                        $('#modelHome').html(options);
                        $('#modelHome').removeAttr('disabled');
                    }
                });
            });
            // ** End Model DDL ** //

            // ** Wishlist ** //
            $(document).on('click', '.wishList', function () {
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
                            $('#carWish-'+carId).removeClass('checked');
                            $('#carWish-'+carId).html('<i class="fa fa-heart-o" aria-hidden="true"></i>')
                            toastr.warning(data.message);
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
                console.log(nextPage);
                $(this).html('Loading...');
                loadCars(nextPage);
                $(this).data('page', nextPage);
            })


            // ** End View More ** //


            // ** Search ** //
            $('#search').click(function (e){
                $('#showMoreHome').data('page', 1);
                loadCars(1,true);

            })

            magnificGallery();
        });

        function loadCars(page,searched=false){
            let brandId = $('#brandHome').val();
            let modelId = $('#modelHome').val();
            let bodyId = $('#bodyHome').val();
            let maxPrice = $('#maxPriceHome').val();
            let yearFrom = $('#yearFromHome').val();
            let yearTo = $('#yearToHome').val();
            let queryString = `?page=${page}&brand=${brandId}&model=${modelId}&maxPrice=${maxPrice}&body=${bodyId}&yearFrom=${yearFrom}&yearTo=${yearTo}`;

            showSearchedTitle(brandId,modelId,bodyId,maxPrice,yearFrom,yearTo);
            $.ajax({
                url: '/home' + queryString,
                method: 'GET',
                success: function (data) {
                    $('#showMoreHome').show();
                    $('#showMoreHome').html('View more');
                    if(data.html == ''){
                        $('#showCars').html('');

                        $('#homeTitle').hide();
                        $('#titleError').show();
                        $('#titleError').html('No cars found');
                        toastr.warning('No cars found');
                    }
                    else if(searched && page == 1){
                        $('#showCars').html(data.html);
                        $('#titleError').hide();

                    }
                    else {
                        $('#showCars').append(data.html);
                        $('#titleError').hide();


                    }
                    magnificGallery();

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


        function magnificGallery() {
            $('.car-magnify-gallery').each(function () {
                $(this).magnificPopup({
                    delegate: 'a',
                    type: 'image',
                    gallery: {
                        enabled: true
                    }
                });
            });
        }

        function showSearchedTitle(brandId,modelId,bodyId,maxPrice,yearFrom,yearTo){
            let brandName = $('#brandHome option:selected').text();
            let modelName = $('#modelHome option:selected').text();
            let bodyName = $('#bodyHome option:selected').text();
            let title = 'Searched: ';
            if(brandId != 0){
                title += brandName + ', ';
            }
            if(modelId != 0){
                title +=  modelName + ', ';
            }
            if(bodyId != 0){
                title += bodyName + ', ';
            }
            if(maxPrice != 0){
                title += ' Max price: ' + maxPrice + ', ';
            }
            if(yearFrom != 0){
                title += ' Year from: ' + yearFrom + ', ';
            }
            if(yearTo != 0){
                title += ' Year to: ' + yearTo;
            }
            if(brandId == 0 && modelId == 0 && bodyId == 0 && maxPrice == 0 && yearFrom == 0 && yearTo == 0){
                $('#homeTitle').show();
                $('#searchedTitle').hide();
                $('#searchedTitle').html('');
            }
            else {
                let lastIndex = title.lastIndexOf(',');
                if (lastIndex !== -1) {
                    title = title.substring(0, lastIndex) + title.substring(lastIndex + 1);
                }
                $('#homeTitle').hide();
                $('#searchedTitle').html(title);
            }


        }





    </script>
@endsection
