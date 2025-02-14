@extends('frontend.vcard.layout.master')
@section('content')
    <div class="login-page">
        <div class="login-box">
            <div class="login-logo">
                <img src="{{ asset('public/frontend/img/favicon.png') }}" alt="Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <b>Member</b> Login
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Sign in to start your session</p>
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            @foreach ($errors->all() as $error)
                                <strong>{{ $error }}</strong><br />
                            @endforeach
                        </div>
                    @endif

                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" name="username" class="form-control" placeholder="Username*" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Password*" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <button type="submit" class="btn btn-success btn-block">Sign In</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>

                    <p class="mb-1 mt-4">
                        <a href="">I forgot my password</a>
                    </p>
                    <p class="mb-0">
                        <a href="{{ route('signup') }}" class="text-center">Register a new membership</a>
                    </p>
                    <hr>
                    <a href="{{ route('member.search') }}" class="btn btn-warning">Search members</a>
                @endsection
