

<div class="search-area" id="search-area-1">
    <div class="container">
        <div class="search-area-inner">
            <div class="search-contents ">
                <form action="#" method="GET">
                    <div class="row">
                        <div class="col-6 col-lg-3 col-md-3">
                                <x-drop-down
                                name="brandHome"
                                id="brandHome"
                                first-option-text="Brand"
                                :options="$brands"
                                :selected="old('brandHome')"/>
                        </div>
                        <div class="col-6 col-lg-3 col-md-3">
                                <x-drop-down
                                    name="model"
                                    id="modelHome"
                                    first-option-text="Model"
                                    :options="[]"
                                    disabled="true"
                                    :selected="old('modelHome')"/>
                        </div>
                        <div class="col-6 col-lg-3 col-md-3">
                            <x-text-field
                                type="number"
                                name="maxPriceHome"
                                id="maxPriceHome"
                                placeholder='Max price'
                                parent-class="form-group"
                                field-class="search-fields"/>
                        </div>
                        <div class="col-6 col-lg-3 col-md-3">
                            <div class="form-group">
                                <span class="search-button btn-md btn-color text-center d-block" id="search">Search</span>
                            </div>
                        </div>
                        </div>

                    <div class="row">
                        <div class="col-6 col-lg-3 col-md-3">
                            <x-drop-down
                                name="bodyHome"
                                id="bodyHome"
                                first-option-text="Body"
                                :options="$bodies"/>
                        </div>
                        <div class="col-6 col-lg-3 col-md-3">
                            <div class="form-group">
                                <select class="selectpicker search-fields" name="yearFromHome" id="yearFromHome">
                                    <option value="0">Year from</option>
                                    @for($i = 2024; $i >= 1980; $i--)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-3">
                            <div class="form-group">
                                <select class="selectpicker search-fields" name="yearToHome" id="yearToHome">
                                    <option value="0">Year To</option>
                                    @for($i = 2024; $i >= 1980; $i--)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-3 text-center mt-2">
                            <a class="text-warning h5" href="{{route('search-index')}}" id="searchMore">Search more...</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

