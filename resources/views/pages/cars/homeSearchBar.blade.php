<div class="search-area" id="search-area-1">
    <div class="container">
        <div class="search-area-inner">
            <div class="search-contents ">
                <form
                    action="https://storage.googleapis.com/theme-vessel-items/checking-sites-2/car-shop-html/HTML/main/index.html"
                    method="GET">
                    <div class="row">
                        <div class="col-6 col-lg-3 col-md-3">
                            <div class="form-group">
                                <select class="selectpicker search-fields"  name="brandHome" id="brandHome">
                                    <option value="0">Brand</option>
                                    @foreach($brands as $brand)
                                        <option value="{{$brand['id']}}" >{{$brand['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-3">
                            <div class="form-group">
                                <select class="selectpicker search-fields" name="modelHome" id="modelHome" disabled="disabled">
                                    <option value="0">Model</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-3">
                            <div class="form-group">
                                <input type="number" class="search-fields" id="maxPriceHome" name="maxPriceHome" placeholder="Max price">
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-3">
                            <div class="form-group">
                                <button class="search-button btn-md btn-color" type="submit">Search</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-lg-3 col-md-3">
                            <div class="form-group">
                                <select class="selectpicker search-fields" name="bodyHome" id="bodyHome" disabled="disabled">
                                    <option value="0">Body</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-3">
                            <div class="form-group">
                                <select class="selectpicker search-fields" name="yearFromHome" id="yearFromHome">
                                    <option value="0">Year from</option>
                                    @for($i = 2024; $i >= 1990; $i--)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-3">
                            <div class="form-group">
                                <select class="selectpicker search-fields" name="yearToHome" id="yearToHome">
                                    <option value="0">Year To</option>
                                    @for($i = 2024; $i >= 1990; $i--)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-3 text-center mt-2">
                            <a class="text-warning h5" id="searchMore">Search more...</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
