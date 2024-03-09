<div class="col-md-6 col-lg-4 ">
    <div class="full white_shd margin_bottom_30 ">
        <div class="d-flex justify-content-around mt-3">
            <div class="w-50">
                <img src="{{asset('assets/img') .'/'. $car->primary_image}}" alt="primaryImage-{{$car->name}}" class="w-100"/>
            </div>
            <div class="ml-3">
                <h4>{{$car->name}}</h4>
                <p>{{$car->model['name']}}</p>
                <p>Developer</p>
            </div>

        </div>
        <div class="d-flex justify-content-around pb-4 mt-4">
            <a href="{{route('admin.car.show',[$car->id])}}" class="btn btn-primary">View</a>
            @if($car->is_published)
                <p class="btn btn-success m-0">Published</p>
            @else
                <a href="#" class="btn btn-warning approveCar" id="{{$car->id}}">Approval</a>
            @endif
        </div>
    </div>
</div>
