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
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
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

                    @if (Auth::user()->status == 1)
                        <div class="col-md-8">
                            <!-- About Me Box -->
                            <div class="card">
                                <div class="card-header">

                                    <span>
                                        <a href="{{ route('customer.edit.profile') }}" class="btn btn-success">
                                            <i class="fa fa-edit"></i> Edit Contact Information
                                        </a>
                                    </span>

                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    @php
                                        $id = Auth::user()->id;
                                        $name = Str::lower(str_replace(' ', '-', Auth::user()->name));
                                        $HomeLink = "https://$_SERVER[HTTP_HOST]";
                                        $url = $HomeLink . '/member/' . $name . '/' . $id;
                                    @endphp

                                    <strong><i class="fas fa-pencil-alt mr-1"></i> Profile Link </strong>
                                    <p class="text-muted h5"><a href="{{ $url }}"
                                            target="_blank">{{ $url }}</a></p>
                                    <hr>

                                    <strong><i class="fas fa-pencil-alt mr-1"></i> Username (Can not be changed) </strong>
                                    <p class="text-muted h5">{{ Auth::user()->username ?? '' }}</p>
                                    <hr>

                                    <strong><i class="fas fa-pencil-alt mr-1"></i> Full Name </strong>
                                    <p class="text-muted h5">{{ Auth::user()->name ?? '' }}</p>
                                    <hr>

                                    <strong><i class="fas fa-pencil-alt mr-1"> Designation </i>
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

                                    {{-- <strong><i class="fas fa-pencil-alt mr-1"> Comapny Logo </i>
                            <p>
                                <img src="{{ !empty(Auth::user()->image) ? url('public/upload/member_images/' . Auth::user()->image) : url('public/frontend/img/logo.png') }}"
                                    class="img-circle elevation-2" alt="User Image" width="84" height="84">
                            </p>
                            <hr> --}}

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

                        <div class="col-md-4">
                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img src="{{ !empty(Auth::user()->image) ? url('public/upload/member_images/' . Auth::user()->image) : url('public/frontend/img/logo.png') }}"
                                            class="img-circle elevation-2" alt="User Image" width="128" height="128">
                                    </div>

                                    <h3 class="profile-username text-center">{{ Auth::user()->name ?? '' }}</h3>

                                    <p class="text-muted text-center h5">{{ Auth::user()->profession ?? '' }}</p>

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
                        </div>
                        <!-- /.col -->
                    @else
                        <p class="text-danger h5 fw-bold">
                            Your account is not active.
                            <br>
                            Please contact with the Web Administrator for account activation.
                            <br>
                            Email: shefat@aimseducation.co.uk
                        </p>
                    @endif

                </div> <!-- /.row -->
            </div> <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <script type="text/javascript" src="{{ asset('public/backend/js/clock.js') }}"></script>
@endsection
