

<div class="search-area" id="search-area-1">
    <div class="container">
        <div class="search-area-inner">
            <div class="search-contents ">
                <form
                    action="https://storage.googleapis.com/theme-vessel-items/checking-sites-2/car-shop-html/HTML/main/index.html"
                    method="GET">
                    <div class="row">
                        <div class="col-6 col-lg-3 col-md-3">
                                <x-drop-down
                                name="brandHome"
                                id="brandHome"
                                first-option-text="Brand"
                                :options="$brands"
                                add-other-option="true"/>
                        </div>
                        <div class="col-6 col-lg-3 col-md-3">
                                <x-drop-down
                                    name="model"
                                    id="modelHome"
                                    first-option-text="Model"
                                    :options="[]"
                                    disabled="true"/>
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
                                <button class="search-button btn-md btn-color" type="submit">Search</button>
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
                            <a class="text-warning h5" id="searchMore">Search more...</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@section('custom_scripts')
    <script>
        $(document).ready(function () {
            $('#brandHome').change(function () {
                let brandId = $(this).val();
                if (brandId === '0') {
                    $('#modelHome').html('<option value="0">Model</option>');
                    $('#modelHome').attr('disabled', 'disabled');
                    return;
                }
                $.ajax({
                    url: "{{route('get.models')}}",
                    data: {
                      id: brandId
                    },
                    method: 'GET',
                    success: function (response) {
                        let options = '<option value="0">Model</option>';
                        response.forEach(function (model) {
                            options += `<option value="${model.id}">${model.name}</option>`;
                        });
                        options += `<option value='other'>Other</option>`;
                        $('#modelHome').html(options);
                        $('#modelHome').removeAttr('disabled');
                    }
                });
            });
        });
    </script>
@endsection
