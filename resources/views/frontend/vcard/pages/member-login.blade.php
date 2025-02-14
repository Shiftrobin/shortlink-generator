@extends('frontend.vcard.layout.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="mx-2 my-3">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <img src="{{ asset('public/frontend/img/favicon.png') }}" alt="Logo"
                            class="brand-image img-circle elevation-3" style="opacity: .8">
                        <span class="h4 fw-bold text-dark"> Member Login</span>
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible mt-4">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                @foreach ($errors->all() as $error)
                                    <strong>{{ $error }}</strong><br />
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-7">
                        <!-- jquery validation -->
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Sign in to start your session</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('login') }}" method="POST" id="vcardLoginForm">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" class="form-control" placeholder="Username*">
                                        <font style="color: red;">{{ $errors->has('name') ? $errors->first('name') : '' }}
                                        </font>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" id="password" class="form-control"
                                            placeholder="Password*">
                                    </div>

                                    <div class="form-group">
                                        <button type="button" class="btn btn-secondary"
                                            onclick="togglePasswordVisibility()"> Show/Hide Password</button>
                                        <script>
                                            function togglePasswordVisibility() {
                                                var passwordField = document.getElementById('password');
                                                if (passwordField.type === 'password') {
                                                    passwordField.type = 'text';
                                                } else {
                                                    passwordField.type = 'password';
                                                }
                                            }
                                        </script>
                                    </div>
                                    <div class="form-group">
                                        {{-- google captcha v2 --}}
                                        {{-- {!! NoCaptcha::renderJs() !!}
                                    {!! NoCaptcha::display() !!} --}}
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-lg btn-success">Login</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->

                        <p class="mb-1 mt-4">
                            {{-- <a href="">I forgot my password</a> --}}
                        </p>
                        <p class="mb-0">
                            <a href="{{ route('signup') }}" class="text-center">Register for a new membership</a>
                        </p>
                        <hr>
                        <a href="{{ route('member.search') }}" class="btn btn-warning">Search members</a>

                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-5 pr-5 my-auto">
                        <img src="{{ asset('public/frontend/img/login.jpg') }}" alt="">
                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <script>
        $(function() {
            $("#vcardLoginForm").validate({
                errorClass: 'text-danger',
                validClass: 'text-success',
                rules: {
                    username: {
                        required: true
                    },
                },
                password: {
                    required: true
                },
                // captcha: {
                //     required: true
                // },
                messages: {
                    name: {
                        required: 'Please enter username',
                    },
                    password: {
                        required: "Please enter password",
                    },
                    // captcha: {
                    //     required: "Please solve captcha",
                    // }
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });

        });
    </script>

@endsection
