@extends('frontend.layouts.master')
@section('content')
<main class="no-main">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="ps-breadcrumb__list">
                <li class="active"><a href="{{url('')}}">Home</a></li>
                <li><a href="javascript:void(0);">My Account</a></li>
            </ul>
        </div>
    </div>
    <section class="section--login">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="login__box">
                        <div class="login__header">
                            <h3 class="login__login">LOGIN</h3>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="login__content">
                                <div class="login__label">Login to your account. <br>
                                    @if($errors->any())
                                    <div class="alert alert-danger alert-dismissible">
                                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                                      @foreach($errors->all() as $error)
                                      <strong>{{$error}}</strong><br/>
                                      @endforeach
                                    </div>
                                    @endif
                                </div>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="username" placeholder="Username" style="font-size:17px">
                                </div>
                                <div class="input-group group-password">
                                    <input class="form-control" type="password" name="password" placeholder="Password" style="font-size:17px">
                                    <div class="input-group-append">
                                        <button class="btn forgot-pass" type="button"><a href="{{route('reset.password')}}">Forgot?</a></button>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-login" type="submit">Login</button>
                                <p>Don't Have account ? <a href="{{route('customer.signup')}}">Please register here.</a></p>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    {{-- <h3 class="login__title">Advantages Of Becoming A Member</h3>
                    <p class="login__description"> <b>Famart Buyer Protection </b>has you covered from click to delivery.<br>Sign up or sign in and you will be able to: </p>
                    <div class="login__orther">
                        <p> <i class="icon-truck"></i>Easily Track Orders, Hassle free Returns</p>
                        <p> <i class="icon-alarm2"></i>Get Relevant Alerts and Recommendation</p>
                        <p><i class="icon-star"></i>Wishlist, Reviews, Ratings and more.</p>
                    </div>
                    <div class="login__vourcher">
                        <div class="vourcher-money"><span class="unit">$</span><span class="number">25</span></div>
                        <div class="vourcher-content">
                            <h4 class="vourcher-title">GIFT VOURCHER FOR FISRT PURCHASE</h4>
                            <p>We give $25 as a small gift for your first purchase.<br>Welcome to Farmart Market!</p>
                        </div>
                    </div> --}}

                    <div class="login__box">
                        <img src="{{asset('public/frontend')}}/img/membership.png" class="rounded" alt="">
                    </div>    

                   
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
