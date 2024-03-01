<div class="form-group {{$parentClass}}">
    <select class="selectpicker search-fields {{ $selectClass }}"  name="{{$name}}" id="{{$id}}"  {{$disabled ? 'disabled=disabled' : ''}}>

        @if($firstOptionText)
            <option value="{{$firstOptionValue}}">{{$firstOptionText}}</option>
        @endif

        @foreach($options as $option)
            <option value="{{$option->$value}}" @selected($selected == $option->$value)>{{$option->$text}}</option>
        @endforeach

        @if($addOtherOption)
                <option value="other">Other</option>
        @endif
    </select>
</div>
