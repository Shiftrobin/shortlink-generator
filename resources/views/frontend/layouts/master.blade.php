<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    {{-- <link href="{{asset('public/frontend')}}/img/favicon.png" rel="apple-touch-icon"> --}}
    <link href="{{ asset('public/frontend') }}/img/favicon.png" rel="shortcut icon" type="image/png">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Application</title>
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700&amp;amp;subset=latin-ext"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/fonts/Linearicons/Font/demo-files/demo.css">
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/plugins/noUiSlider/nouislider.css">
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/plugins/font-awesome/css/font-awesome.min.css">
    <!-- jQuery -->
    <script src="{{ asset('public/backend') }}/plugins/jquery/jquery.min.js"></script>
    <link rel="stylesheet"
        href="{{ asset('public/frontend') }}/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css">
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/plugins/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/plugins/owl-carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/plugins/slick/slick.css">
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/plugins/lightGallery/dist/css/lightgallery.min.css">
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/css/style.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('public/backend') }}/plugins/daterangepicker/daterangepicker.css">
    <style type="text/css">
        .notifyjs-corner {
            z-index: 10000 !important;
        }

        .prof li {
            background: #FF7200;
            padding: 7px;
            margin: 3px;
            border-radius: 15px;
            list-style-type: none;
        }

        .prof li.active_account {
            background: #26901B;
            padding: 7px;
            margin: 3px;
            border-radius: 15px;
            list-style-type: none;
        }

        .prof li a {
            color: #fff;
            padding-left: 15px;
        }

        .custom_btn {
            background: #FF7200;
            padding: 5px;
            margin: 3px;
            border-radius: 5px;
            color: #fff;
        }
    </style>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.js"></script>
    <!-- Sweet alert -->
    <script src="{{ asset('public/backend') }}/sweetalert/sweetalert.js"></script>
    <link href="{{ asset('public/backend') }}/sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('public/backend') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- DataTables -->
    <script src="{{ asset('public/backend') }}/plugins/datatables/jquery.dataTables.js"></script>
    <script src="{{ asset('public/backend') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <script>
        $(function() {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "pageLength": 100,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
            });
        });
    </script>
</head>

<body>
    @include('frontend.layouts.header')
    <main class="no-main">
        @yield('content')
        @include('frontend.layouts.modal')
        @include('frontend.layouts.recent-viewed')
    </main>

    @if (Session::get('cardLoginMessage'))
        <script type="text/javascript" charset="utf-8" async defer>
            swal("Sorry!", "Please login then Add to Cart Product!", "error");
        </script>
    @endif
    @if (Session::get('loginMessage'))
        <script type="text/javascript" charset="utf-8" async defer>
            swal("Good Job!", "You have successfully verified,please login!", "success");
        </script>
    @endif
    @if (Session::get('signupMessage'))
        <script type="text/javascript" charset="utf-8" async defer>
            swal("Good Job!", "You have successfully signed up,please verify your email!", "success");
        </script>
    @endif
    @if (Session::get('verificatioErrorMessage'))
        <script type="text/javascript" charset="utf-8" async defer>
            swal("Sorry!", "email or verification code does not match!", "error");
        </script>
    @endif
    @if (Session::get('emailResetErrorMessage'))
        <script type="text/javascript" charset="utf-8" async defer>
            swal("Sorry!", "Email does not match! Please try again!", "error");
        </script>
    @endif
    @if (Session::get('verificationCodeErrorMessage'))
        <script type="text/javascript" charset="utf-8" async defer>
            swal("Sorry!", "Verification Code does not match! Please Try again!", "error");
        </script>
    @endif
    @if (Session::get('shoppingTypeMessage'))
        <script type="text/javascript" charset="utf-8" async defer>
            swal("Sorry!", "Please select shopping type then Add to Cart Product!", "error");
        </script>
    @endif
    @if (Session::get('shoppingTypeCongratulation'))
        <script type="text/javascript" charset="utf-8" async defer>
            swal("Good Job!", "Shopping Type Process successfully completed,now you can add to Cart Product", "success");
        </script>
    @endif
    @if (Session::get('shoppingQtyMessage'))
        <script type="text/javascript" charset="utf-8" async defer>
            swal("Sorry!", "You can buy maxim 5 Quantity", "error");
        </script>
    @endif
    @if (Session::get('shoppingMinQtyMessage'))
        <script type="text/javascript" charset="utf-8" async defer>
            swal("Sorry!", "You have to order minimum £ 150 !", "error");
        </script>
    @endif
    @if (Session::get('productAddMessage'))
        <script type="text/javascript" charset="utf-8" async defer>
            swal("Good Job!", "Product added successfully!", "success");
        </script>
    @endif
    @if (Session::get('productUpdateMessage'))
        <script type="text/javascript" charset="utf-8" async defer>
            swal("Good Job!", "Product updated successfully!", "success");
        </script>
    @endif
    @if (Session::get('productDeleteMessage'))
        <script type="text/javascript" charset="utf-8" async defer>
            swal("Good Job!", "Product deleted successfully!", "success");
        </script>
    @endif
    @if (Session::get('subscribeMessage'))
        <script type="text/javascript" charset="utf-8" async defer>
            swal("Good Job!", "You have successfully subscribed!", "success");
        </script>
    @endif
    @if (Session::get('contactMessage'))
        <script type="text/javascript" charset="utf-8" async defer>
            swal("Good Job!", "Your message is successfully sent!", "success");
        </script>
    @endif
    @if (Session::get('reviewMessage'))
        <script type="text/javascript" charset="utf-8" async defer>
            swal("Good Job!", "Review is successfully added!", "success");
        </script>
    @endif

    @include('frontend.layouts.footer')
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('public/backend') }}/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="{{ asset('public/frontend') }}/plugins/popper.min.js"></script>
    <script src="{{ asset('public/frontend') }}/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('public/frontend') }}/plugins/owl-carousel/owl.carousel.min.js"></script>
    <script src="{{ asset('public/frontend') }}/plugins/jquery.matchHeight-min.js"></script>
    <script src="{{ asset('public/frontend') }}/plugins/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
    <script src="{{ asset('public/frontend') }}/plugins/select2/dist/js/select2.min.js"></script>
    <script src="{{ asset('public/frontend') }}/plugins/slick/slick.js"></script>
    <script src="{{ asset('public/frontend') }}/plugins/lightGallery/dist/js/lightgallery-all.min.js"></script>
    <script src="{{ asset('public/frontend') }}/plugins/noUiSlider/nouislider.min.js"></script>
    <!-- custom code-->
    <script src="{{ asset('public/frontend') }}/js/main.js"></script>
    <!-- jquery-validation -->
    <script src="{{ asset('public/backend') }}/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="{{ asset('public/backend') }}/plugins/jquery-validation/additional-methods.min.js"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('public/backend') }}/plugins/moment/moment.min.js"></script>
    <script src="{{ asset('public/backend') }}/plugins/daterangepicker/daterangepicker.js"></script>
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
    <!-- Start Java Script for Date time Picker -->
    <script type="text/javascript">
        $(function() {
            $('.singledatepicker').daterangepicker({
                    singleDatePicker: true,
                    showDropdowns: true,
                    autoUpdateInput: false,
                    // drops: "up",
                    autoApply: true,
                    locale: {
                        format: 'YYYY-MM-DD',
                        daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                        firstDay: 0
                    },
                    minDate: '01/01/1930',
                },
                function(start) {
                    this.element.val(start.format('YYYY-MM-DD'));
                    this.element.parent().parent().removeClass('has-error');
                },
                function(chosen_date) {
                    this.element.val(chosen_date.format('YYYY-MM-DD'));
                });

            $('.singledatepicker').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('YYYY-MM-DD'));
            });
        });
    </script>
    <!-- End Java Script for Data time Picker -->

    {{-- image upload show --}}
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

    @stack('page_scripts')
</body>

</html>
