@extends('frontend.vcard.layout.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="mx-2 my-3">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        @if (Session::get('signupMessage'))
                            <script type="text/javascript" charset="utf-8" async defer>
                                swal("Good Job!", "You have successfully signed up, please check your email for login credentials!", "success");
                            </script>
                        @endif
                    </div>
                    <div class="col-sm-6">
                        <img src="{{ asset('public/frontend/img/favicon.png') }}" alt="Logo"
                            class="brand-image img-circle elevation-3" style="opacity: .8">
                        <span class="h4 fw-bold text-dark">Sign Up</span>
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
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Register for a new membership</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('member.store') }}" method="POST" id="vcardSignupForm">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Full name*">
                                        <font style="color: red;">{{ $errors->has('name') ? $errors->first('name') : '' }}
                                        </font>
                                    </div>
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" name="email" id="email" class="form-control"
                                            placeholder="Email*">
                                        <font style="color: red;">{{ $errors->has('email') ? $errors->first('email') : '' }}
                                        </font>
                                    </div>
                                    <div class="form-group">
                                        <label>Login Username</label>
                                        <input type="text" name="username" class="form-control"
                                            placeholder="Put email as Username, Username can not be changed later*">
                                        <font style="color: red;">
                                            {{ $errors->has('username') ? $errors->first('username') : '' }}
                                        </font>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" id="password" class="form-control"
                                            placeholder="Password*">
                                    </div>
                                    <div class="form-group">
                                        <label>Retype Password</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                            class="form-control" placeholder="Retype password*">
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-secondary"
                                            onclick="togglePasswordVisibility()">Show/Hide Passwords</button>
                                        <script>
                                            function togglePasswordVisibility() {
                                                var passwordField = document.getElementById('password');
                                                var confirmPasswordField = document.getElementById('password_confirmation');

                                                if (passwordField.type === 'password') {
                                                    passwordField.type = 'text';
                                                    confirmPasswordField.type = 'text';
                                                } else {
                                                    passwordField.type = 'password';
                                                    confirmPasswordField.type = 'password';
                                                }
                                            }
                                        </script>
                                    </div>
                                    <div class="form-group mb-0">
                                        <div class="icheck-primary">
                                            <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                            <label for="agreeTerms">
                                                I agree to the <a
                                                    href="https://aimseducation.co.uk/privacy-policy/">terms*</a>
                                            </label>
                                        </div>

                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info btn-lg">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->

                        <p class="mb-0">
                            <a href="{{ route('member.login') }}" class="text-center">Already a member? Login Here</a>
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
            $("#vcardSignupForm").validate({
                errorClass: 'text-danger',
                validClass: 'text-success',
                rules: {
                    name: {
                        required: true,
                        maxlength: 150,
                        minlength: 4,
                        // lettersonly: true,
                    },
                    email: {
                        required: true,
                        remote: {
                            url: "{{ route('member.reg.email.check') }}",
                            type: "GET",
                            data: {
                                username: function() {
                                    return $('#email').val();
                                }
                            },
                        },
                    },
                    username: {
                        required: true,
                        maxlength: 150,
                        minlength: 6,
                        remote: {
                            url: "{{ route('member.reg.username.check') }}",
                            type: "GET",
                            data: {
                                username: function() {
                                    return $('#email').val();
                                }
                            },
                        },
                    },
                    password: {
                        required: true,
                        pwcheck: true,
                        minlength: 8
                    },
                    password_confirmation: {
                        required: true,
                        equalTo: "#password"
                    },
                    // captcha: {
                    //     required: true,
                    // },
                    terms: {
                        required: true
                    }
                },
                messages: {
                    name: {
                        required: 'Full name is required',
                        maxlength: 'Maximum 150 character is acceptable',
                        minlength: 'Minimum 4 character is acceptable',
                        lettersonly: 'Only Alpha is acceptable',
                    },
                    email: {
                        email: 'Please enter a <em>valid</em> email address',
                        required: 'Please enter email address',
                        remote: 'Email address is already exists!',
                    },
                    password: {
                        required: "Please enter password",
                        pwcheck: "First letter capital,One small letter & Minimum 1 letter numeric",
                        minlength: "Password will be min 8!"
                    },
                    password_confirmation: {
                        required: "Please confirm password",
                        equalTo: "Confirm password does not match!"
                    },
                    // captcha: {
                    //     required: "Please enter captcha code",
                    // },
                    terms: {
                        required: "Please accept terms"
                    }
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

            $.validator.addMethod("pwcheck", function(value) {
                return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
                    &&
                    /[a-z]/.test(value) // has a lowercase letter
                    &&
                    /\d/.test(value) // has a digit
            });
        });
    </script>
@endsection
