@extends('frontend.vcard.layout.master')
@section('content')
    <div class="register-page">

        <div class="register-box pt-5 mt-5">
            @if (Session::get('signupMessage'))
                <script type="text/javascript" charset="utf-8" async defer>
                    swal("Good Job!", "You have successfully signed up, please check your email for login credentials!", "success");
                </script>
            @endif


            <div class="register-logo pt-5 mt-5">
                <br>
                <img src="{{ asset('public/frontend/img/favicon.png') }}" alt="Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <b>Sign</b>Up
            </div>

            <div class="card">
                <div class="card-body register-card-body">
                    <p class="login-box-msg">Register a new membership</p>
                    <div id="nameff"></div>

                    <form action="{{ route('member.store') }}" method="POST" id="vcardSignupForm">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" name="name" class="form-control" placeholder="Full name*">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                            <font style="color: red;">{{ $errors->has('name') ? $errors->first('name') : '' }}</font>
                        </div>
                        <div class="input-group mb-3">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email*">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                            <font style="color: red;">{{ $errors->has('email') ? $errors->first('email') : '' }}</font>
                        </div>
                        <div class="input-group mb-3">

                            <input type="text" name="username" class="form-control"
                                placeholder="Put email as Username, username can not be changed later*">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                            <font style="color: red;">{{ $errors->has('username') ? $errors->first('username') : '' }}
                            </font>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Password*">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                                placeholder="Retype password*">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <button type="button" class="btn btn-secondary" onclick="togglePasswordVisibility()">Show/Hide Passwords</button>
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
                        <div class="row">

                            <div class="col-12">
                                {{-- google captcha v2 --}}
                                {{-- {!! NoCaptcha::renderJs() !!}
                                {!! NoCaptcha::display() !!} --}}
                            </div>

                            {{-- //captcha  --}}
                            {{-- <div class="col-7">
                                <div class="captcha" style="margin-top:30px">
                                    <span>{!! captcha_img('math') !!}</span>
                                    <button type="button" class="btn btn-danger reload" id="reload">
                                        &#x21bb;
                                    </button>
                                </div>
                            </div>
                            <div class="col-5" style="margin-top:30px">
                                <input type="text" class="form-control" name="captcha" placeholder="Enter Captcha"
                                    style="font-size:17px" required>
                                <font style="color: red;">{{ $errors->has('captcha') ? $errors->first('captcha') : '' }}
                                </font>
                            </div> --}}
                        </div>
                        <div class="row mt-5">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                    <label for="agreeTerms">
                                        I agree to the <a href="https://aimseducation.co.uk/privacy-policy/">terms*</a>
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Register</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>

                    <a href="{{ route('member.login') }}" class="text-center">I already have a membership</a>
                    <hr>
                    <a href="{{ route('member.search') }}" class="btn btn-warning mx-auto">Search members</a>

                    {{-- <script>
                        //captch
                        $('#reload').click(function() {
                            $.ajax({
                                type: 'GET',
                                url: 'reload-captcha',
                                success: function(data) {
                                    $(".captcha span").html(data.captcha)
                                }
                            });
                        });
                    </script> --}}

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
                                        //lettersonly: true,
                                    },
                                    email: {
                                        // email: true,
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
                                    captcha: {
                                        required: true,
                                    },
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
                                    captcha: {
                                        required: "Please enter captcha code",
                                    },
                                    terms: {
                                        required: "Please accept terms"
                                    }
                                },
                                // errorElement: 'span',
                                // errorPlacement: function(error, element) {
                                //     error.addClass('invalid-feedback');
                                //     element.closest('.form-group').append(error);
                                // },
                                // highlight: function(element, errorClass, validClass) {
                                //     $(element).addClass('is-invalid');
                                // },
                                // unhighlight: function(element, errorClass, validClass) {
                                //     $(element).removeClass('is-invalid');
                                // }
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
