
<div class="{{$parentClass}}">
    @if($label)
        <label for="{{$id}}">{{$label}}</label>
    @endif

    <input type="{{$type}}" class="{{$fieldClass}}" id="{{$id}}" name="{{$name}}" placeholder="{{$placeholder}}" value="{{$value}}" {{$disabled ? 'disabled' : ''}}/>
    @if($error)
           <p class="text-danger"> {{ $error }}</p>
    @endif

</div>
