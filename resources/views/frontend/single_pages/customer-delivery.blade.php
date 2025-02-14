@extends('frontend.layouts.master')
@section('content')
<main class="no-main">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="ps-breadcrumb__list">
                <li class="active"><a href="{{url('')}}">Home</a></li>
                <li><a href="javascript:void(0);">)Product Delivery Information</a></li>
            </ul>
        </div>
    </div>
    <section class="section--shopping-cart">
        <div class="container shopping-container">
            <h4 class="page__title">)Product Delivery Information</h4>
            <div class="shopping-cart__content">
                <div class="row m-0">
                    <div class="col-12 col-lg-4">
                        <div class="shopping-cart__products">
                            <img src="{{url('public/upload/delivery_gif.gif')}}" src="delivery_gif.gif" alt="Delivery" style="width: 100%;">
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="shopping-cart__right">
                            <div class="shopping-cart__total">
                                @foreach($order['order_details'] as $details)
                                @php
                                    $sub_total = $details->quantity*$details['product']['price'];
                                @endphp
                                <p class="shopping-cart__subtotal"><span>{{$details['product']['name']}}</span><span class="price">{{$details->quantity}} X 
                                {{$details['product']['price']}} =
                                {{$sub_total}}</span></p>
                                @endforeach
                                <p class="shopping-cart__subtotal"><span><b>Grand Total</b></span><span class="price-total">£ {{$order->order_total}}</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection