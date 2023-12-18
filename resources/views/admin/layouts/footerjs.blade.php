<!-- Core -->
<script src="{{asset('dash/assets/bundles/libscripts.bundle.js')}}"></script>
<script src="{{asset('dash/assets/bundles/vendorscripts.bundle.js')}}"></script>
<script src="{{asset('dash/assets/bundles/c3.bundle.js')}}"></script>
<script src="{{asset('dash/assets/bundles/jvectormap.bundle.js')}}"></script>
<script src="{{asset('dash/assets/js/theme.js')}}"></script>
<script src="{{asset('dash/assets/js/pages/index.js')}}"></script>
<script src="{{asset('dash/assets/js/pages/todo-js.js')}}"></script>

<script src="{{asset('dash/assets/vendor/summernote/dist/summernote.js')}}"></script>
<script>
    // Show the message
    document.getElementById('myMessage').style.display = 'block';

    // Hide the message after 5 seconds
    setTimeout(function() {
        document.getElementById('myMessage').style.display = 'none';
    }, 5000);
</script>
<script>
    // Show the message
    document.getElementById('myerror').style.display = 'block';

    // Hide the message after 5 seconds
    setTimeout(function() {
        document.getElementById('myerror').style.display = 'none';
    }, 5000);
</script>

<!-- Jquery DataTable Plugin Js -->
<script src="{{asset('dash/assets/bundles/datatablescripts.bundle.js')}}"></script>
<script src="{{asset('dash/assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('dash/assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('dash/assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js')}}"></script>
<script src="{{asset('dash/assets/vendor/jquery-datatable/buttons/buttons.flash.min.js')}}"></script>
<script src="{{asset('dash/assets/vendor/jquery-datatable/buttons/buttons.html5.min.js')}}"></script>
<script src="{{asset('dash/assets/vendor/jquery-datatable/buttons/buttons.print.min.js')}}"></script>
<script src="{{asset('dash/assets/js/pages/tables/jquery-datatable.js')}}"></script>
@yield('js')