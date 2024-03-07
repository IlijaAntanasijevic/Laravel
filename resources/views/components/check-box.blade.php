<div class="{{$parentClass}}">
    @foreach($options as $option)
        <div {{$blockClass}}>
            <input @checked(in_array($option->$value,$checked)) class="{{$fieldClass}}" type="checkbox" value="{{$option->$value}}" id="{{$option->$text}}-{{$option->$value}}" name="{{$name}}" />
            <label class="form-check-label" for="{{$option->$text}}-{{$option->$value}}">{{$option->$text}}</label>
        </div>
    @endforeach
        @if($error)
            <p class="text-danger"> {{ $error }}</p>
        @endif
</div>
