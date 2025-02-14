@extends('frontend.layouts.master')
@section('content')
<main class="no-main">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="ps-breadcrumb__list">
                <li class="active"><a href="{{url('')}}">Home</a></li>
                <li><a href="javascript:void(0);">Shopping Cart</a></li>
            </ul>
        </div>
    </div>
    <section class="section--shopping-cart">
        <div class="container shopping-container">
            <h2 class="page__title">Shopping Cart</h2>
            <div class="shopping-cart__content">
                <div class="row m-0">
                    @if(Session::get('shopping_type_msg'))
                    <div class="col-12 col-lg-12">
                        <div class="alert alert-primary alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>{{Session::get('shopping_type_msg')}}</strong>
                        </div>
                    </div>
                    @endif
                    <div class="col-12 col-lg-9">
                        <div class="shopping-cart__products">
                            <div class="shopping-cart__table">
                                <div class="shopping-cart-light">
                                    <div class="shopping-cart-row">
                                        <div class="cart-product">Product</div>
                                        <div class="cart-price">Price</div>
                                        <div class="cart-price">VAT</div>
                                        <div class="cart-quantity">Quantity</div>
                                        <div class="cart-total">Total VAT</div>
                                        <div class="cart-total">Total</div>
                                        <div class="cart-action"> </div>
                                    </div>
                                </div>
                                @php
                                $contents = Cart::content();
                                    $total = 0;
                                    $grand_total_vat = 0;
                                @endphp


                                <div class="shopping-cart-body">
                                    @foreach($contents as $content)
                                    @php
                                        $total_vat = $content->options->vat/100*$content->subtotal;
                                    @endphp
                                    <div class="shopping-cart-row">
                                        <div class="cart-product">
                                            <div class="ps-product--mini-cart"><img class="ps-product__thumbnail" src="{{asset('public/upload/product_images/'.$content->options->image)}}" alt="alt" />
                                                <div class="ps-product__content">
                                                    <h5>{{$content->name}}</h5>
                                                    <p class="ps-product__meta">Price: <span class="ps-product__price">£ {{$content->price}}</span></p>
                                                    <p class="ps-product__meta">VAT: <span class="ps-product__price">{{$content->options->vat}} %</span></p>
                                                    <form method="post" action="{{route('update.cart')}}">
                                                    @csrf
                                                        <input type="hidden" name="rowId" value="{{$content->rowId}}">
                                                        <div class="def-number-input number-input safari_only">
                                                            <button class="minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i class="icon-minus"></i></button>
                                                            <input class="quantity" min="1" name="qty" value="{{$content->qty}}" type="number" />
                                                            <button class="plus" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i class="icon-plus"></i></button>
                                                        </div>
                                                    </form>
                                                    
                                                    <span class="ps-product__total">Total VAT: <span>£ {{$total_vat}} </span></span> <br>
                                                    <span class="ps-product__total">Total: <span>£ {{$content->subtotal}} </span></span>
                                                </div>
                                                <div class="ps-product__remove"><a href="{{route('delete.cart',$content->rowId)}}"><i class="icon-trash2"></i></a></div>
                                            </div>
                                        </div>
                                        <div class="cart-price"><span class="ps-product__price">£ {{$content->price}}</span>
                                        </div>
                                        <div class="cart-price"><span class="ps-product__price"> {{$content->options->vat}} %</span>
                                        </div>
                                        <div class="cart-quantity">
                                            <form method="post" action="{{route('update.cart')}}">
                                                @csrf
                                                <input type="hidden" name="rowId" value="{{$content->rowId}}">
                                                <div class="def-number-input number-input safari_only">
                                                    <button class="minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i class="icon-minus"></i></button>
                                                    <input class="quantity" min="1" name="qty" value="{{$content->qty}}" type="number" />
                                                    <button class="plus" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i class="icon-plus"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="cart-total"> <span class="ps-product__total">£ {{$total_vat}} </span>
                                        </div>
                                        <div class="cart-total"> <span class="ps-product__total">£ {{$content->subtotal}} </span>
                                        </div>
                                        <div class="cart-action"> <a href="{{route('delete.cart',$content->rowId)}}"><i class="icon-trash2"></i></a></div>
                                    </div>
                                    @php
                                        $total += $content->subtotal;
                                        $grand_total_vat += $total_vat;
                                        $grand_total = $total+$grand_total_vat;
                                    @endphp
                                    @endforeach
                                </div>
                            </div>
                            <div class="shopping-cart__step">
                                <a class="button left" href="{{url('')}}"><i class="icon-arrow-left"></i>Continue Shopping</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="shopping-cart__right">
                            <div class="shopping-cart__total">
                                <p class="shopping-cart__subtotal"><span>Subtotal</span>
                                    <span class="price">
                                        £ 
                                        @if(is_float($total))
                                        {{$total}}
                                        @else
                                        {{number_format((float)$total, 2, '.', '')}}
                                        @endif
                                    </span>
                                </p>
                                <p class="shopping-cart__subtotal"><span>VAT</span>
                                    <span class="price">
                                        £ 
                                        @if(is_float($grand_total_vat))
                                        {{$grand_total_vat}}
                                        @else
                                        {{number_format((float)$grand_total_vat, 2, '.', '')}}
                                        @endif
                                    </span>
                                </p>
                                <p class="shopping-cart__shipping"><span>SHIPPING CHARGE:</span> <b>FREE</b></p>
                                <p class="shopping-cart__subtotal"><span><b>TOTAL</b></span>
                                    <span class="price-total">
                                        £ 
                                        @if(is_float($grand_total))
                                        {{$grand_total}}
                                        @else
                                        {{number_format((float)$grand_total, 2, '.', '')}}
                                        @endif
                                    </span>
                                </p>
                            </div>
                            @if(@Auth::user()->id != NULL && Session::get('sale_type_id') !=NULL)
                            <a class="btn shopping-cart__checkout" href="{{route('customer.payment')}}">Check Out</a>
                            @else
                            <a class="btn shopping-cart__checkout" href="{{route('customer.login')}}">Check Out</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection