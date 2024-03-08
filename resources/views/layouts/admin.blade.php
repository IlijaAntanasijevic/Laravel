<!DOCTYPE html>
<html lang="en">
@include('admin.fixed.head')

<body class="dashboard dashboard_1">
<div class="full_container">
    <div class="inner_container">
        @include('admin.fixed.sidebar')
        @include('admin.fixed.topBar')

        @yield('content')
    </div>



</div>
@include('admin.fixed.scripts')

</body>
</html>
