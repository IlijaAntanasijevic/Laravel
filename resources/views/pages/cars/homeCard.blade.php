@php
    $inWishList = $car->wishlist->where('user_id',Auth::id())->first();
@endphp
<div class="col-lg-4 col-md-6 col-sm-6" >
    <div class="car-box ">
        <!-- car img -->
        <div class="car-thumbnail">
            <a href="{{route('cars.show', ['car' => $car->id])}}" class="car-img">
                <img src="{{asset('assets/img/' . $car->primary_image)}}" alt="{{$car->name}}" class="img-fluid">
            </a>
            <div class="car-overlay {{$showOverlay ? '' : 'd-none'}}">
                <a href="{{route('cars.show', ['car' => $car->id])}}" class="overlay-link">
                    <i class="fa fa-info"></i>
                </a>
                <span class="overlay-link wishList {{$inWishList ? 'checked' : ''}}" data-id="{{$car->id}}" id="carWish-{{$car->id}}">
                    <i class="fa fa-heart{{$inWishList != null ? '' : '-o'}} "></i>
                </span>

                <div class="car-magnify-gallery">
                    <a href="{{asset('assets/img/' . $car->images[0]['path'])}}" class="overlay-link">
                        <i class="fa fa-expand"></i>
                    </a>
                    @foreach($car->images as $image)
                        <a href="{{asset('assets/img/' . $image['path'])}}" class="hidden" ></a>
                    @endforeach
                </div>
            </div>
        </div>
        <ul class="facilities-list clearfix">
            <li class="bordered-right">
                <i class="flaticon-car"></i>
                {{$car->model->body['name']}}
            </li>
            <li class="bordered-right">
                <i class="flaticon-road-with-broken-line"></i>
                {{number_format($car->kilometers)}} km
            </li>
            <li>
                <i class="flaticon-gas-pump"></i>
                {{$car->engine->fuel['name']}}
            </li>
        </ul>
        <!-- detail -->
        <div class="detail">
            <!-- title -->
            <h1 class="title">
                <a href="{{route('cars.show', ['car' => $car->id])}}">{{$car->name}}</a>
            </h1>
            <!-- Location -->
            <div class="location d-flex justify-content-between">
                <a href="car-details.html">
                    <i class="fa fa-map-marker"></i>
                    {{$car->user['address']}}
                </a>
                <p class="text-dark font-weight-bold home-car-price">
                    {{number_format($car->price,0,' ','.')}}$
                </p>
            </div>
        </div>
    </div>
</div>

@php
    $userId = Auth::id() ? Auth::id() : null;

@endphp

@section('custom_scripts')
    <script>

           $('.wishList').click(function (){
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
    </script>
@endsection


