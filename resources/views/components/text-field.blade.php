
<div class="form-group {{$parentClass}}">
    @if($label)
        <label for="{{$id}}">{{$label}}</label>
    @endif

    <input type="{{$type}}" class="search-fields {{$fieldClass}}" id="{{$id}}" name="{{$name}}" placeholder="{{$placeholder}}">
    @if($error)
        <div class="alert alert-danger">
           <p> {{ $error }}</p>
        </div>
    @endif
</div>
