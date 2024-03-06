<div class="{{$parentClass}}">
    @if($label)
        <label for="{{$id}}" class="form-label">{{$label}}</label>
    @endif

    <select class="{{ $selectClass }}"  name="{{$name}}" id="{{$id}}"  {{$disabled ? 'disabled=disabled' : ''}}>

        @if($firstOptionText)
            <option value="{{$firstOptionValue}}">{{$firstOptionText}}</option>
        @endif

        @foreach($options as $option)
            <option value="{{$option->$value}}" @selected($selected == $option->$value)>{{ucfirst($option->$text)}}</option>
        @endforeach
           {{-- @foreach($options as $option)
                <option value="{{$option->$value}}" {{ $selected == $option->$value ? 'selected' : '' }}>{{ ucfirst($option->$text) }}</option>
            @endforeach
            --}}

        @if($addOtherOption)
                <option value="other">Other</option>
        @endif
    </select>
        @if($error)
            <p class="text-danger"> {{ $error }}</p>
        @endif
</div>
