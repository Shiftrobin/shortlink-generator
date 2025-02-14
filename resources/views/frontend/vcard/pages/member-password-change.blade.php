@extends('backend.layouts.member-master')
@section('content')
    <style type="text/css">
        h4 {
            padding-top: 10px;
        }

        .card_body {
            border-radius: 10px;
            text-align: center;
        }

        .card-clock {
            background: transparent;
            border: none;
        }
    </style>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Edit Password | <a href="{{ route('dashboard') }}"
                                class="btn btn-warning">Back to profile</a> </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit profile</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#about" data-toggle="tab">
                                            Update your Password
                                        </a>
                                    </li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">

                                    <div class="tab-pane active" id="about">
                                        <form class="form-horizontal" method="post"
                                            action="{{ route('customer.passowrd.update') }}" id="myForm">
                                            @csrf


                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Current Passowrd</label>
                                                <div class="col-sm-10">
                                                    <input type="password" name="current_password" class="form-control"
                                                        placeholder="Current Passowrd">
                                                    <font color="red">
                                                        {{ $errors->has('current_password') ? $errors->first('current_password') : '' }}
                                                    </font>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">New Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" name="new_password" id="new_password"
                                                        class="form-control" placeholder="New Password">
                                                    <font color="red">
                                                        {{ $errors->has('new_password') ? $errors->first('new_password') : '' }}
                                                    </font>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Again New Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" name='again_new_password' id="again_new_password"
                                                        class="form-control" placeholder="Again New Password">
                                                    <font color="red">
                                                        {{ $errors->has('again_new_password') ? $errors->first('again_new_password') : '' }}
                                                    </font>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->

                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                    <!-- /.col -->

                    <div class="col-md-3">
                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img src="{{ !empty(Auth::user()->image) ? url('public/upload/member_images/' . Auth::user()->image) : url('public/frontend/img/logo.png') }}"
                                        class="img-circle elevation-2" alt="User Image" width="128" height="128">
                                </div>

                                <h3 class="profile-username text-center">{{ Auth::user()->name ?? '' }}</h3>

                                <p class="text-muted text-center">{{ Auth::user()->profession ?? '' }}</p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <a href="tel:{{ Auth::user()->mobile ?? '' }}" target="_blank"
                                            class="btn btn-success btn-block"><b>
                                                <i class="fas fa-mobile-alt"></i>
                                                Phone</b></a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="{{ Auth::user()->facebook_link ?? '' }}" target="_blank"
                                            class="btn btn-primary btn-block"><b>
                                                <i class="fab fa-facebook-square"></i> Facebook</b></a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="{{ Auth::user()->twitter_link ?? '' }}" target="_blank"
                                            class="btn btn-dark btn-block"><b>
                                                <i class="fab fa-twitter-square"></i> Twitter</b></a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="{{ Auth::user()->whatsapp_link ?? '' }}" target="_blank"
                                            class="btn btn-success btn-block"><b>
                                                <i class="fab fa-whatsapp-square"></i> Whatsapp</b></a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="{{ Auth::user()->linkedin_link ?? '' }}" target="_blank"
                                            class="btn btn-info btn-block"><b>
                                                <i class="fab fa-linkedin"></i> Linkedin</b></a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="{{ Auth::user()->instagram_link ?? '' }}" target="_blank"
                                            class="btn btn-danger btn-block"><b>
                                                <i class="fab fa-instagram-square"></i> Instagram </b></a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="{{ Auth::user()->youtube_link ?? '' }}" target="_blank"
                                            class="btn btn-danger btn-block"><b>
                                                <i class="fab fa-youtube"></i> Youtube </b></a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="{{ Auth::user()->messenger_Link ?? '' }}" target="_blank"
                                            class="btn btn-primary btn-block"><b>
                                                <i class="fab fa-facebook-messenger"></i> Messenger </b></a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- About Me Box -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Contact Information</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                                <strong><i class="fas fa-pencil-alt mr-1"></i> Username (Can not be changed) </strong>
                                <p class="text-muted h5">{{ Auth::user()->username ?? '' }}</p>
                                <hr>

                                <strong><i class="fas fa-pencil-alt mr-1"></i> Full Name </strong>
                                <p class="text-muted h5">{{ Auth::user()->name ?? '' }}</p>
                                <hr>

                                <strong><i class="fas fa-pencil-alt mr-1"> Desination </i>
                                </strong>
                                <p class="text-muted h5">
                                    {{ Auth::user()->profession ?? '' }}
                                </p>
                                <hr>

                                <strong><i class="fas fa-pencil-alt mr-1"></i> Email </strong>
                                <p class="text-muted h5">{{ Auth::user()->email ?? '' }}</p>
                                <hr>

                                <strong><i class="fas fa-pencil-alt mr-1"></i> Mobile Number </strong>
                                <p class="text-muted h5">{{ Auth::user()->mobile ?? '' }}</p>
                                <hr>

                                <strong><i class="fas fa-pencil-alt mr-1"></i> Alternative Mobile Number </strong>
                                <p class="text-muted h5">{{ Auth::user()->mobile2 ?? '' }}</p>
                                <hr>

                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Country </strong>
                                <p class="text-muted h5">{{ Auth::user()->country ?? '' }}</p>
                                <hr>

                                <strong><i class="fas fa-pencil-alt mr-1"></i> Address </strong>
                                <p class="text-muted h5">{{ Auth::user()->address ?? '' }}</p>
                                <hr>


                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->



                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <script>
        $(function() {
            $("#myForm").validate({
                errorClass: 'text-danger',
                validClass: 'text-success',
                rules: {
                    new_password: {
                        required: true,
                        minlength: 6
                    },
                    again_new_password: {
                        required: true,
                        equalTo: "#new_password"
                    }
                },
                messages: {
                    new_password: {
                        required: "Please enter password",
                        minlength: "Password will be min 6!"
                    },
                    again_new_password: {
                        required: "Please enter confirm password",
                        equalTo: "Confirm password does not match!"
                    }
                }
            });

        });
    </script>
@endsection
