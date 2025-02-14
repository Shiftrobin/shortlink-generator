@if (session()->has('success'))
    <script type="text/javascript">
        $(function() {
            $.notify("{{ session()->get('success') }}", {
                globalPosition: 'top right',
                className: 'success'
            });
        });
    </script>
@endif
@if (session()->has('error'))
    <script type="text/javascript">
        $(function() {
            $.notify("{{ session()->get('error') }}", {
                globalPosition: 'top right',
                className: 'error'
            });
        });
    </script>
@endif



<footer class="py-3">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3 h4 fw-bold">
        <li class="nav-item"><a href="https://vcard.aimseducation.co.uk" class="nav-link px-2">Home</a></li>
        <li class="nav-item"><a href="https://aimseducation.co.uk/services-for-students/"
                class="nav-link px-2">Services</a></li>
        <li class="nav-item"><a href="https://experts.aimseducation.co.uk/" class="nav-link px-2">Experts</a></li>
        <li class="nav-item"><a href="https://courses.aimseducation.co.uk/" class="nav-link px-2">Course Finder</a></li>
        <li class="nav-item"><a href="https://aimseducation.co.uk/university-finding/" class="nav-link px-2">University
                Finder</a></li>
        <li class="nav-item"><a href="https://aimseducation.co.uk/apply-now/" class="nav-link px-2">Apply Now</a></li>
        <li class="nav-item"><a href="https://aimseducation.co.uk/contact/" class="nav-link px-2">Contact</a></li>
    </ul>
    <p class="text-center text-muted">Copyright &copy; {{ now()->year }} AIMS Education</p>
</footer>




<!-- jQuery -->
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('public/backend') }}/plugins/jquery-ui/jquery-ui.min.js" data-pagespeed-no-defer></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('public/backend') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{ asset('public/backend') }}/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{ asset('public/backend') }}/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{ asset('public/backend') }}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{ asset('public/backend') }}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('public/backend') }}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{ asset('public/backend') }}/plugins/moment/moment.min.js"></script>
<script src="{{ asset('public/backend') }}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('public/backend') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
</script>
<!-- Summernote -->
<script src="{{ asset('public/backend') }}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('public/backend') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('public/backend') }}/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('public/backend') }}/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('public/backend') }}/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="{{ asset('public/backend') }}/plugins/datatables/jquery.dataTables.js"></script>
<script src="{{ asset('public/backend') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- jquery-validation -->
<script src="{{ asset('public/backend') }}/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="{{ asset('public/backend') }}/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- Select2 -->
<script src="{{ asset('public/backend') }}/plugins/select2/js/select2.full.min.js"></script>
<script type="text/javascript" src="{{ asset('public/backend/ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/backend/ckfinder/ckfinder.js') }}"></script>
<script>
    $(function() {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "pageLength": 100,
            "lengthChange": true,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": true,
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(document).on('click', '#delete', function() {
            var actionTo = $(this).attr('href');
            var token = $(this).attr('data-token');
            var id = $(this).attr('data-id');
            swal({
                    title: "Are you sure?",
                    type: "success",
                    showCancelButton: true,
                    confirmButtonClass: 'btn-success',
                    confirmButtonText: 'Yes',
                    cancelButtonText: "No",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            url: actionTo,
                            type: 'post',
                            data: {
                                id: id,
                                _token: token
                            },
                            success: function(data) {
                                swal({
                                        title: "Deleted!",
                                        type: "success"
                                    },
                                    function(isConfirm) {
                                        if (isConfirm) {
                                            $('.' + id).fadeOut();
                                        }
                                    });
                            }
                        });
                    } else {
                        swal("Cancelled", "", "error");
                    }
                });
            return false;
        });
    });
</script>

<script>
    $(document).ready(function() {
        $(document).on('click', '#approve', function() {
            var actionTo = $(this).attr('href');
            var token = $(this).attr('data-token');
            var id = $(this).attr('data-id');
            swal({
                    title: "Are you sure?",
                    type: "success",
                    showCancelButton: true,
                    confirmButtonClass: 'btn-primary',
                    confirmButtonText: 'Yes',
                    cancelButtonText: "No",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            url: actionTo,
                            type: 'post',
                            data: {
                                id: id,
                                _token: token
                            },
                            success: function(data) {
                                swal({
                                        title: "Approved!",
                                        type: "success"
                                    },
                                    function(isConfirm) {
                                        if (isConfirm) {
                                            $('.' + id).fadeOut();
                                        }
                                    });
                            }
                        });
                    } else {
                        swal("Cancelled", "", "error");
                    }
                });
            return false;
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#image2').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage2').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
<script type="text/javascript">
    $(function() {
        $('.select2').select2();
    })
</script>
@stack('page_scripts')
</body>

</html>
