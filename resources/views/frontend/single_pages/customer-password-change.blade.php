@extends('frontend.layouts.master')
@section('content')
    <main class="no-main">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="ps-breadcrumb__list">
                    <li class="active"><a href="{{ url('') }}">Home</a></li>
                    <li><a href="javascript:void(0);">Password Change</a></li>
                </ul>
            </div>
        </div>
        <section class="section--about ps-page--business">
            <div class="container">
                <div class="row">
                    <div style="margin-top:30px;" class="col-sm-3">
                        <ul class="prof">
                            <li class="{{ @$customer_account_title == 'profile_title' ? 'active_account' : '' }}"><a
                                    href="{{ route('dashboard') }}">My Profile</a></li>
                            {{-- <li class="{{(@$customer_account_title=='shopping_type_title')?'active_account':''}}"><a href="{{route('customer.shopping_type')}}">Shopping Type</a></li> --}}
                            <li class="{{ @$customer_account_title == 'password_change_title' ? 'active_account' : '' }}"><a
                                    href="{{ route('customer.passowrd.change') }}">Password Change</a></li>
                            {{-- <li class="{{(@$customer_account_title=='order_list_title')?'active_account':''}}"><a href="{{route('customer.order.list')}}">Order List</a></li> --}}
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                    <div style="margin:30px 0px;" class="col-sm-9">
                        <h3>Password Change</h3>
                        <form method="post" action="{{ route('customer.passowrd.update') }}" id="myForm">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-4 form-group--block">
                                    <label for="current_password">Current Passowrd</label>
                                    <input type="password" name="current_password" id="current_password"
                                        class="form-control">
                                </div>
                                <div class="col-md-4 form-group--block">
                                    <label for="new_password">New Password</label>
                                    <input type="password" name="new_password" id="new_password" class="form-control">
                                </div>
                                <div class="col-md-4 form-group--block">
                                    <label for="again_new_password">Again New Password</label>
                                    <input type="password" name="again_new_password" class="form-control">
                                </div>
                                <div class="col-md-4" style="padding-top:15px;">
                                    <button type="submit" class="custom_btn" style="border:1px solid;">Update
                                        Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>


    <script>
        $(function() {
            $("#myForm").validate({
                errorClass: 'text-danger',
                validClass: 'text-success',
                rules: {
                    new_password: {
                        required: true,
                        minlength: 4
                    },
                    again_new_password: {
                        required: true,
                        equalTo: "#new_password"
                    }
                },
                messages: {
                    new_password: {
                        required: "Please enter password",
                        minlength: "Password will be min 4!"
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
