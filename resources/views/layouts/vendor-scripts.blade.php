<!-- JAVASCRIPT -->
<script src="{{ URL::asset('/assets/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ URL::asset('/assets/libs/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{ URL::asset('/assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{ URL::asset('/assets/libs/node-waves/waves.min.js')}}"></script>
    <!-- apexcharts -->
    <script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js')}}"></script>
    <!-- dashboard init -->
    <!-- <script src="{{ URL::asset('/assets/js/pages/dashboard.init.js')}}"></script> -->
    <!-- App js -->
    <script src="{{ URL::asset('/assets/js/app.js')}}"></script>

    <script src="{{ URL::asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ URL::asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Buttons examples -->
    <script src="{{ URL::asset('assets/libs/jszip/jszip.min.js')}}"></script>
    <script src="{{ URL::asset('assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{ URL::asset('assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
    <!-- <script src="{{ URL::asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script> -->
    <script src="{{ URL::asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{ URL::asset('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
    <!-- Responsive examples -->
    <script src="{{ URL::asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <!-- Datatable init js -->
    <!-- <script src="{{ URL::asset('assets/js/datatables.init.js')}}"></script> -->
    <!-- Sweet Alerts js -->
    <script src="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{ URL::asset('/assets/libs/parsleyjs/parsley.min.js')}}"></script>

    <script src="{{ URL::asset('/assets/js/form-validation.init.js')}}"></script>
    <script src="{{ URL::asset('/assets/js/main.js')}}"></script>

    <script src="{{ URL::asset('/assets/libs/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/lightbox.init.js') }}"></script>

    <script src="{{ URL::asset('/assets/libs/toastr/toastr.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/toastr.init.js') }}"></script>
<script src="{{ URL::asset('assets/libs/select2/js/select2.min.js')}}"></script>
<script src="{{URL::asset('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>


@yield('script')

<!-- App js -->
<script src="{{ URL::asset('assets/js/app.min.js')}}"></script>

@yield('script-bottom')