<!DOCTYPE html>
<html lang="en">

    @include('fixed.head')

<body id="top">
    @include('fixed.topHeader')
    @include('fixed.navigation')

    @yield('content')

    @include('fixed.footer')
    @include('fixed.scripts')

</body>
</html>
