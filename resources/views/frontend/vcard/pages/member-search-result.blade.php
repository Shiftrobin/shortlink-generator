@extends('frontend.vcard.layout.master')
@section('content')
    <main class="main-box">

        <section class="container mt-5">
            <img class="d-block mx-auto" src="{{ asset('public/frontend/img/logo.jpg') }}" alt="" />
            <h1 class="h2 fw-bold text-center pb-3 text-info">Virtual Card Application</h1>
            <div class="d-flex justify-content-center">
                <a href="{{ route('signup') }}" class="btn btn-primary mr-2">Register</a>
                <a href="{{ route('member.login') }}" class="btn btn-success">Login</a>
            </div>
        </section>

        <section class="container">
            <div class="px-2 py-2 pt-5 text-center">
                <div class="row">
                    <div class="col-lg-12 mx-auto">
                        <div class="card card-success">
                            <div class="card-header">
                                <h2 class="card-title">Use your email to find out your profile. Search by entering your
                                    email
                                    address.</h2>
                            </div>
                            <form action="{{ route('member.search') }}" method="GET">
                                <div class="card-body">
                                    <div class="input-group mb-3">
                                        <div class="input-group input-group-lg">
                                            <input type="text" class="form-control"
                                                placeholder="Enter your email address" required>
                                            <span class="input-group-append">
                                                <button type="submit" class="btn btn-info btn-flat">Search</button>
                                            </span>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="container">
            <div class="px-2 py-2 mb-5 text-center">
                <div class="row">

                    <div class="col-md-4 mx-auto">
                        <!-- Widget: user widget style 1 -->
                        <div class="card card-widget widget-user">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-info">
                                <h3 class="widget-user-username">{{ $user->name }}</h3>
                                <h5 class="widget-user-desc">{{ $user->profession }}</h5>
                            </div>
                            <div class="widget-user-image">
                                <img src="{{ !empty($user->image) ? url('public/upload/member_images/' . $user->image) : url('public/frontend/img/logo.png') }}"
                                    class="img-circle elevation-2" alt="User Image" width="128" height="128">
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-sm-12 mx-auto">
                                        <div class="description-block">

                                            <a href="{{ url('member', [
                                                'name' => Str::lower(str_replace(' ', '-', $user->name)),
                                                'id' => $user->id,
                                            ]) }}"
                                                class="btn btn-warning btn-lg">Find Out Details</a>

                                        </div>
                                        <!-- /.description-block -->
                                    </div>

                                </div>
                                <!-- /.row -->
                            </div>
                        </div>
                        <!-- /.widget-user -->
                    </div>
                    <!-- /.col -->

                </div>
            </div>
        </section>

    </main>
@endsection
