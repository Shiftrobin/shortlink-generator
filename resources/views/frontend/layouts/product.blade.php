<section class="section-flashdeal--default ps-home--block" style="padding-bottom: 10px;">
    <div class="container">
        <div class="ps-block__header">
            <h3 class="ps-block__title">Sales</h3>
            <a class="ps-block__view" href="{{route('all.sales.list')}}">View all<i class="icon-chevron-right"></i></a>
        </div>
        <div class="flashdeal--content">
            <div class="owl-carousel" data-owl-auto="false" data-owl-loop="false" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="6" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="6" data-owl-duration="1000" data-owl-mousedrag="on">
                @foreach($sales_products as $product)
                <div class="ps-product--standard" style="border: 1px dotted;min-height: 360px;"><a href="{{route('products.details.info',$product->slug)}}"><img class="ps-product__thumbnail" src="{{asset('public/upload/product_images/'.$product->image)}}" alt="alt" /></a>
                    <div class="ps-product__content">
                        @if(Session::get('sale_type_id')==NULL)
                        <p class="ps-product-price-block">
                            <span class="ps-product__sale">
                                Col: £ {{$product->current_collective_price}}
                            </span>
                            <span class="ps-product__price">
                                @if($product->old_collective_price!='0')£ {{$product->old_collective_price}}@endif
                            </span><br>
                        </p>
                        <p class="ps-product-price-block">
                            <span class="ps-product__sale">
                                Del: £ {{$product->current_delivery_price}}
                            </span>
                            <span class="ps-product__price">
                                @if($product->old_delivery_price!='0')£ {{$product->old_delivery_price}}@endif
                            </span><br>
                        </p>
                        @elseif(Session::get('sale_type_id')=="1")
                        <p class="ps-product-price-block">
                            <span class="ps-product__sale">
                                Col: £ {{$product->current_collective_price}}
                            </span>
                            <span class="ps-product__price">
                                @if($product->old_collective_price!='0')£ {{$product->old_collective_price}}@endif
                            </span><br>
                        </p>
                        @elseif(Session::get('sale_type_id')=="2")
                        <p class="ps-product-price-block">
                            <span class="ps-product__sale">
                                Del: £ {{$product->current_delivery_price}}
                            </span>
                            <span class="ps-product__price">
                                @if($product->old_delivery_price!='0')£ {{$product->old_delivery_price}}@endif
                            </span><br>
                        </p>
                        @endif
                        <a href="{{route('products.details.info',$product->slug)}}">
                            <h5 class="ps-product__name">{{$product->name}}</h5>
                        </a>
                    </div>
                    <div class="ps-product__content">
                        <form id='myform' method='POST' action="{{route('insert.cart')}}">
                          @csrf
                            <div class="def-number-input number-input safari_only" style="margin-bottom:5px">
                                <a class="minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" style="background-color:#f7f7f7border: none;display: flex;align-items: center;justify-content: center;font-size: 13px;padding: 8px;cursor: pointer;"><i class="icon-minus"></i></a>
                                <input type="hidden" name="id" value="{{$product->id}}">
                                <input class="quantity" min="1" name="qty" value="1" type="number" />
                                <a class="plus" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" style="background-color:#f7f7f7border: none;display: flex;align-items: center;justify-content: center;font-size: 13px;padding: 8px;cursor: pointer;"><i class="icon-plus"></i></a>
                            </div>
                          <button class="ps-product__addcart" type="submit">Add to Cart</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>