@extends('frontend.vcard.layout.master')
@section('content')
    <main class="main-box">

        <section class="container mt-5">
            <img class="d-block mx-auto mb-4" src="{{ asset('public/frontend/img/logo.jpg') }}" alt="" />
            <h1 class="h2 fw-bold text-center pb-3 text-info">Virtual Card Application</h1>
            <div class="d-flex justify-content-center">
                <a href="{{ route('signup') }}" class="btn btn-primary mr-2">Register</a>
                <a href="{{ route('member.login') }}" class="btn btn-success">Login</a>
            </div>
        </section>

        <section class="container">
            <div class="px-2 py-2 mb-5 text-center">
                <div class="row">
                    <div class="col-lg-12 mx-auto mt-4">
                        <div class="card card-info">
                            <div class="card-header">
                                <h2 class="card-title fw-bold h2">Use your email to find out your profile.
                                    Search
                                    by
                                    entering your email
                                    address.</h2>
                            </div>
                            <form action="{{ route('member.search.result') }}" method="GET">
                                @csrf
                                <div class="card-body">
                                    <div class="input-group mb-3">
                                        <div class="input-group input-group-lg">
                                            <input type="email" name="email" class="form-control"
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
    </main>
@endsection
