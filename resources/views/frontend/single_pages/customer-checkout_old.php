@extends('frontend.layouts.master')
@section('content')
<main class="no-main">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="ps-breadcrumb__list">
                <li class="active"><a href="{{url('')}}">Home</a></li>
                <li><a href="javascript:void(0);">Billing Information</a></li>
            </ul>
        </div>
    </div>
    @php
        use App\Http\Controllers\Frontend\CheckoutController;
            $contents = Cart::content();
    @endphp
    <section class="section--shopping-cart">
        <div class="container shopping-container">
            <h2 class="page__title">Billing Information</h2>
            <div class="shopping-cart__content">
                <div class="row m-0">
                    <div class="col-12 col-lg-6">
                        <div class="shopping-cart__products">
                            <div class="login__box">
                                <form method="POST" action="{{route('customer.checkout.store')}}" id="checkoutForm">
                                    @csrf
                                    <div class="login__content">
                                        <label>Full Name: <span style="color:red;font-weight: bold;">*</span></label>
                                    </div>
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="name"  style="font-size:17px">
                                    </div>
                                    <font color="red">{{($errors->has('name'))?($errors->first('name')):''}}</font>

                                    <div class="login__content">
                                        <label>Email Address: <span style="color:red;font-weight: bold;">*</span></label>
                                    </div>
                                    <div class="input-group">
                                        <input class="form-control" type="email" name="email"  style="font-size:17px">
                                    </div>
                                    <font color="red">{{($errors->has('email'))?($errors->first('email')):''}}</font>

                                    <div class="login__content">
                                        <label>Mobile No: <span style="color:red;font-weight: bold;">*</span></label>
                                    </div>
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="mobile_no"  style="font-size:17px">
                                    </div>
                                    <font color="red">{{($errors->has('mobile_no'))?($errors->first('mobile_no')):''}}</font>

                                    <div class="login__content">
                                        <label>Delivery Address: <span style="color:red;font-weight: bold;">*</span></label>
                                    </div>
                                    <div class="input-group">
                                        <textarea class="form-control" name="address" style="font-size:17px"></textarea>
                                    </div>
                                    <font color="red">{{($errors->has('address'))?($errors->first('address')):''}}</font>

                                    <div class="input-group">
                                        <button type="submit" class="btn shopping-cart__checkout" style="background-color: #ff7200;">
                                            Submit
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="shopping-cart__right">
                            <div class="shopping-cart__total">
                                @php
                                    $contents = Cart::content();
                                    $total = 0;
                                @endphp
                                @foreach($contents as $content)
                                <p class="shopping-cart__subtotal"><span>{{$content->qty}} X {{$content->name}}</span><span class="price">£ {{$content->subtotal}}</span></p>
                                @php
                                    $total += $content->subtotal;
                                @endphp
                                @endforeach
                                <p class="shopping-cart__subtotal"><span>Subtotal</span><span class="price">£ {{$total}}</span></p>
                                <p class="shopping-cart__shipping">Shipping<br><span>FREE SHIPPING</span><br>Estimate for <b>United Kingdom</b></p>
                                <p class="shopping-cart__subtotal"><span><b>TOTAL</b></span><span class="price-total">£ {{$total}}</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script type="text/javascript">
    $(document).ready(function () {
        $('#checkoutForm').validate({
            rules: {
                name: {
                    required: true,
                },
                mobile_no: {
                    required: true,
                },
                address : {
                    required : true,
                }
            },
            messages: {
                name : {
                    required : 'Please enter your full name',
                },
                mobile_no : {
                    required : 'Please enter your mobile no',
                },
                address : {
                    required : 'Please enter your address',
                }
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>

@endsection