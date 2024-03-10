@extends('layouts.layout')

@section('title')
    Wish List
@endsection

@section('content')
    <div class="page_loader"></div>
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
                    @component('pages.partials.homeCard', ['car' => $item->car, 'showOverlay' => false,'showSoldText' => true])
                    @endcomponent

                @endforeach
            </div>
        </div>
    </div>
@endsection


@section('custom_scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.page_loader').remove();
        });
        $('.wishlistRemove').click(function (e){
            e.preventDefault();
            let userId = {{auth()->id()}};
            let id = $(this).attr('id');

            $.ajax({
                url: "{{route('remove.wishlist')}}",
                method: 'DELETE',
                data: {
                    _token: '{{csrf_token()}}',
                    carId: id,
                    userId: userId
                },
                success: function () {
                    $('#carBox-' + id).remove();
                    toastr.success('Car removed from wish list');

                },
                error: function (xhr) {
                    console.log(xhr)
                    toastr.error('Server error');
                }
            });
        });

    </script>
@endsection
