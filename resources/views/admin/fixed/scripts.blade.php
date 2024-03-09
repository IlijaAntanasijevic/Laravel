<!-- Sweet alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- jQuery -->
<script src="{{asset('assets/admin/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/admin/js/popper.min.js')}}"></script>
<script src="{{asset('assets/admin/js/bootstrap.min.js')}}"></script>
<!-- wow animation -->
<script src="{{asset('assets/admin/js/animate.js')}}"></script>
<!-- select country -->
<script src="{{asset('assets/admin/js/bootstrap-select.js')}}"></script>
<!-- owl carousel -->
<script src="{{asset('assets/admin/js/owl.carousel.js')}}"></script>
<!-- chart js -->
<script src="{{asset('assets/admin/js/Chart.min.js')}}"></script>
<script src="{{asset('assets/admin/js/Chart.bundle.min.js')}}"></script>
<script src="{{asset('assets/admin/js/utils.js')}}"></script>
<script src="{{asset('assets/admin/js/analyser.js')}}"></script>
<!-- nice scrollbar -->
<script src="{{asset('assets/admin/js/perfect-scrollbar.min.js')}}"></script>
<script>
    var ps = new PerfectScrollbar('#sidebar');
</script>
<!-- custom js -->
<script src="{{asset('assets/admin/js/custom.js')}}"></script>
<script src="{{asset('assets/admin/js/chart_custom_style1.js')}}"></script>
<script src="{{asset('assets/admin/js/main.js')}}"></script>


@yield('custom_scripts')

