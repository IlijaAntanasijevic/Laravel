<div class="{{$parentClass}}">
    @foreach($options as $option)
        <div {{$blockClass}}>
            <input @checked($checked == $option->$value) class="{{$fieldClass}}" type="checkbox" value="{{$option->$value}}" id="{{$option->$text}}-{{$option->$value}}" name="{{$name}}" />
            <label class="form-check-label" for="{{$option->$text}}-{{$option->$value}}">{{$option->$text}}</label>
        </div>
    @endforeach
</div>
