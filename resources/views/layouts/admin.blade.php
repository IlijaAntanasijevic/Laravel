<!DOCTYPE html>
<html lang="en">
@include('admin.fixed.head')

<body class="dashboard dashboard_1">
<div class="full_container">
    <div class="inner_container">
        @include('admin.fixed.sidebar')

        <div id="content">
            @include('admin.fixed.topBar')
            <div class="midde_cont">
                <div class="container-fluid">
                    <div class="row column_title">
                        <div class="col-md-12">
                            <div class="page_title">
                                <h2>@yield('title')</h2>
                            </div>
                        </div>
                    </div>
                    @yield('content')

                </div>
            </div>
        </div>
    </div>



</div>
@include('admin.fixed.scripts')

</body>
</html>
