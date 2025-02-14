<section class="section-categories--default">
    <div class="container">
        <div class="categories--floating"><a class="floating-item" href="#freshFoodBlock"><i class="icon-apple"></i></a><a class="floating-item" href="#foodCupboardBlock"><i class="icon-ice-cream2"></i></a><a class="floating-item" href="#readyMealBlock"><i class="icon-platter"></i></a><a class="floating-item" href="#drinkTeaBlock"><i class="icon-glass2"></i></a><a class="floating-item" href="#kitchenBlock"><i class="icon-dinner"></i></a>
        </div>
    </div>
</section>
<section class="section-recommendations--default ps-home--block">
    <div class="container">
        <div class="ps-block__header mobile">
            <h3 class="ps-block__title">Recommendations</h3>
            <div class="ps-block__list">
                <ul>
                    <li class="menu-item"><a href="{{route('all.new-arrival.list')}}" style="color: #26901b;text-decoration: underline;font-weight: bold;">New Arrivals</a></li>
                    <li class="menu-item"><a href="{{route('all.best-seller.list')}}">Best Seller</a></li>
                </ul>
            </div>
        </div>
        <div class="recommendations__content">
            <div class="owl-carousel" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="3" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="3" data-owl-item-xl="3" data-owl-duration="1000" data-owl-mousedrag="on">
                @if($new_arrivals['0']->count()>="1")
                <div class="recommendation-carousel">
                    @if($new_arrivals['0']->count()>="1")
                    <div class="ps-product--vertical"><a href="{{route('products.details.info',@$new_arrivals['0']->slug)}}">
                        <img class="ps-product__thumbnail" src="{{asset('public/upload/product_images/'.@$new_arrivals['0']->image)}}" alt="alt" /></a>
                        <div class="ps-product__content">
                            <h5><a class="ps-product__name" href="{{route('products.details.info',@$new_arrivals['0']->slug)}}">{{@$new_arrivals['0']->name}}</a></h5>
                            <p class="ps-product-price-block">
                                <span class="ps-product__sale">
                                    Col: £ {{@$new_arrivals['0']->current_collective_price}}
                                </span>
                                <span class="ps-product__price">
                                    @if(@$new_arrivals['0']->old_collective_price !='0') 
                                        £ {{@$new_arrivals['0']->old_collective_price}}
                                    @endif
                                </span>
                            </p>
                            <p class="ps-product-price-block">
                                <span class="ps-product__sale">
                                    Del: £ {{@$new_arrivals['0']->current_delivery_price}}
                                </span><span class="ps-product__price">
                                    @if(@$new_arrivals['0']->old_delivery_price !='0')
                                        £ {{@$new_arrivals['0']->old_delivery_price}}
                                    @endif
                                </span>
                            </p>
                        </div>
                    </div>
                    @endif
                    @if($new_arrivals['0']->count()>="2")
                    <div class="ps-product--vertical"><a href="{{route('products.details.info',@$new_arrivals['1']->slug)}}">
                        <img class="ps-product__thumbnail" src="{{asset('public/upload/product_images/'.@$new_arrivals['1']->image)}}" alt="alt" /></a>
                        <div class="ps-product__content">
                            <h5><a class="ps-product__name" href="{{route('products.details.info',@$new_arrivals['1']->slug)}}">{{@$new_arrivals['1']->name}}</a></h5>
                            <p class="ps-product-price-block">
                                <span class="ps-product__sale">
                                    Col: £ {{@$new_arrivals['1']->current_collective_price}}
                                </span>
                                <span class="ps-product__price">
                                    @if(@$new_arrivals['1']->old_collective_price !='0') 
                                        £ {{@$new_arrivals['1']->old_collective_price}}
                                    @endif
                                </span>
                            </p>
                            <p class="ps-product-price-block">
                                <span class="ps-product__sale">
                                    Del: £ {{@$new_arrivals['1']->current_delivery_price}}
                                </span><span class="ps-product__price">
                                    @if(@$new_arrivals['1']->old_delivery_price !='0')
                                        £ {{@$new_arrivals['1']->old_delivery_price}}
                                    @endif
                                </span>
                            </p>
                        </div>
                    </div>
                    @endif
                    @if($new_arrivals['0']->count()>="3")
                    <div class="ps-product--vertical"><a href="{{route('products.details.info',@$new_arrivals['2']->slug)}}">
                        <img class="ps-product__thumbnail" src="{{asset('public/upload/product_images/'.@$new_arrivals['2']->image)}}" alt="alt" /></a>
                        <div class="ps-product__content">
                            <h5><a class="ps-product__name" href="{{route('products.details.info',@$new_arrivals['2']->slug)}}">{{@$new_arrivals['2']->name}}</a></h5>
                            <p class="ps-product-price-block">
                                <span class="ps-product__sale">
                                    Col: £ {{@$new_arrivals['2']->current_collective_price}}
                                </span>
                                <span class="ps-product__price">
                                    @if(@$new_arrivals['2']->old_collective_price !='0') 
                                        £ {{@$new_arrivals['2']->old_collective_price}}
                                    @endif
                                </span>
                            </p>
                            <p class="ps-product-price-block">
                                <span class="ps-product__sale">
                                    Del: £ {{@$new_arrivals['2']->current_delivery_price}}
                                </span><span class="ps-product__price">
                                    @if(@$new_arrivals['2']->old_delivery_price !='0')
                                        £ {{@$new_arrivals['2']->old_delivery_price}}
                                    @endif
                                </span>
                            </p>
                        </div>
                    </div>
                    @endif
                </div>
                @endif
                @if($new_arrivals['0']->count()>="4")
                <div class="recommendation-carousel">
                    @if($new_arrivals['0']->count()>="4")
                    <div class="ps-product--vertical"><a href="{{route('products.details.info',@$new_arrivals['3']->slug)}}">
                        <img class="ps-product__thumbnail" src="{{asset('public/upload/product_images/'.@$new_arrivals['3']->image)}}" alt="alt" /></a>
                        <div class="ps-product__content">
                            <h5><a class="ps-product__name" href="{{route('products.details.info',@$new_arrivals['3']->slug)}}">{{@$new_arrivals['3']->name}}</a></h5>
                            <p class="ps-product-price-block">
                                <span class="ps-product__sale">
                                    Col: £ {{@$new_arrivals['3']->current_collective_price}}
                                </span>
                                <span class="ps-product__price">
                                    @if(@$new_arrivals['3']->old_collective_price !='0') 
                                        £ {{@$new_arrivals['3']->old_collective_price}}
                                    @endif
                                </span>
                            </p>
                            <p class="ps-product-price-block">
                                <span class="ps-product__sale">
                                    Del: £ {{@$new_arrivals['3']->current_delivery_price}}
                                </span><span class="ps-product__price">
                                    @if(@$new_arrivals['3']->old_delivery_price !='0')
                                        £ {{@$new_arrivals['3']->old_delivery_price}}
                                    @endif
                                </span>
                            </p>
                        </div>
                    </div>
                    @endif
                    @if($new_arrivals['0']->count()>="5")
                    <div class="ps-product--vertical"><a href="{{route('products.details.info',@$new_arrivals['4']->slug)}}">
                        <img class="ps-product__thumbnail" src="{{asset('public/upload/product_images/'.@$new_arrivals['4']->image)}}" alt="alt" /></a>
                        <div class="ps-product__content">
                            <h5><a class="ps-product__name" href="{{route('products.details.info',@$new_arrivals['4']->slug)}}">{{@$new_arrivals['4']->name}}</a></h5>
                            <p class="ps-product-price-block">
                                <span class="ps-product__sale">
                                    Col: £ {{@$new_arrivals['4']->current_collective_price}}
                                </span>
                                <span class="ps-product__price">
                                    @if(@$new_arrivals['4']->old_collective_price !='0') 
                                        £ {{@$new_arrivals['4']->old_collective_price}}
                                    @endif
                                </span>
                            </p>
                            <p class="ps-product-price-block">
                                <span class="ps-product__sale">
                                    Del: £ {{@$new_arrivals['4']->current_delivery_price}}
                                </span><span class="ps-product__price">
                                    @if(@$new_arrivals['4']->old_delivery_price !='0')
                                        £ {{@$new_arrivals['4']->old_delivery_price}}
                                    @endif
                                </span>
                            </p>
                        </div>
                    </div>
                    @endif
                    @if($new_arrivals['0']->count()>="6")
                    <div class="ps-product--vertical"><a href="{{route('products.details.info',@$new_arrivals['5']->slug)}}">
                        <img class="ps-product__thumbnail" src="{{asset('public/upload/product_images/'.@$new_arrivals['5']->image)}}" alt="alt" /></a>
                        <div class="ps-product__content">
                            <h5><a class="ps-product__name" href="{{route('products.details.info',@$new_arrivals['5']->slug)}}">{{@$new_arrivals['5']->name}}</a></h5>
                            <p class="ps-product-price-block">
                                <span class="ps-product__sale">
                                    Col: £ {{@$new_arrivals['5']->current_collective_price}}
                                </span>
                                <span class="ps-product__price">
                                    @if(@$new_arrivals['5']->old_collective_price !='0') 
                                        £ {{@$new_arrivals['5']->old_collective_price}}
                                    @endif
                                </span>
                            </p>
                            <p class="ps-product-price-block">
                                <span class="ps-product__sale">
                                    Del: £ {{@$new_arrivals['5']->current_delivery_price}}
                                </span><span class="ps-product__price">
                                    @if(@$new_arrivals['5']->old_delivery_price !='0')
                                        £ {{@$new_arrivals['5']->old_delivery_price}}
                                    @endif
                                </span>
                            </p>
                        </div>
                    </div>
                    @endif
                </div>
                @endif
                @if($new_arrivals['0']->count()>="7")
                <div class="recommendation-carousel">
                    @if($new_arrivals['0']->count()>="7")
                    <div class="ps-product--vertical"><a href="{{route('products.details.info',@$new_arrivals['6']->slug)}}">
                        <img class="ps-product__thumbnail" src="{{asset('public/upload/product_images/'.@$new_arrivals['6']->image)}}" alt="alt" /></a>
                        <div class="ps-product__content">
                            <h5><a class="ps-product__name" href="{{route('products.details.info',@$new_arrivals['6']->slug)}}">{{@$new_arrivals['6']->name}}</a></h5>
                            <p class="ps-product-price-block">
                                <span class="ps-product__sale">
                                    Col: £ {{@$new_arrivals['6']->current_collective_price}}
                                </span>
                                <span class="ps-product__price">
                                    @if(@$new_arrivals['6']->old_collective_price !='0') 
                                        £ {{@$new_arrivals['6']->old_collective_price}}
                                    @endif
                                </span>
                            </p>
                            <p class="ps-product-price-block">
                                <span class="ps-product__sale">
                                    Del: £ {{@$new_arrivals['6']->current_delivery_price}}
                                </span><span class="ps-product__price">
                                    @if(@$new_arrivals['6']->old_delivery_price !='0')
                                        £ {{@$new_arrivals['6']->old_delivery_price}}
                                    @endif
                                </span>
                            </p>
                        </div>
                    </div>
                    @endif
                    @if($new_arrivals['0']->count()>="8")
                    <div class="ps-product--vertical"><a href="{{route('products.details.info',@$new_arrivals['7']->slug)}}">
                        <img class="ps-product__thumbnail" src="{{asset('public/upload/product_images/'.@$new_arrivals['7']->image)}}" alt="alt" /></a>
                        <div class="ps-product__content">
                            <h5><a class="ps-product__name" href="{{route('products.details.info',@$new_arrivals['7']->slug)}}">{{@$new_arrivals['7']->name}}</a></h5>
                            <p class="ps-product-price-block">
                                <span class="ps-product__sale">
                                    Col: £ {{@$new_arrivals['7']->current_collective_price}}
                                </span>
                                <span class="ps-product__price">
                                    @if(@$new_arrivals['7']->old_collective_price !='0') 
                                        £ {{@$new_arrivals['7']->old_collective_price}}
                                    @endif
                                </span>
                            </p>
                            <p class="ps-product-price-block">
                                <span class="ps-product__sale">
                                    Del: £ {{@$new_arrivals['7']->current_delivery_price}}
                                </span><span class="ps-product__price">
                                    @if(@$new_arrivals['7']->old_delivery_price !='0')
                                        £ {{@$new_arrivals['7']->old_delivery_price}}
                                    @endif
                                </span>
                            </p>
                        </div>
                    </div>
                    @endif
                    @if($new_arrivals['0']->count()>="9")
                    <div class="ps-product--vertical"><a href="{{route('products.details.info',@$new_arrivals['8']->slug)}}">
                        <img class="ps-product__thumbnail" src="{{asset('public/upload/product_images/'.@$new_arrivals['8']->image)}}" alt="alt" /></a>
                        <div class="ps-product__content">
                            <h5><a class="ps-product__name" href="{{route('products.details.info',@$new_arrivals['8']->slug)}}">{{@$new_arrivals['8']->name}}</a></h5>
                            <p class="ps-product-price-block">
                                <span class="ps-product__sale">
                                    Col: £ {{@$new_arrivals['8']->current_collective_price}}
                                </span>
                                <span class="ps-product__price">
                                    @if(@$new_arrivals['8']->old_collective_price !='0') 
                                        £ {{@$new_arrivals['8']->old_collective_price}}
                                    @endif
                                </span>
                            </p>
                            <p class="ps-product-price-block">
                                <span class="ps-product__sale">
                                    Del: £ {{@$new_arrivals['8']->current_delivery_price}}
                                </span><span class="ps-product__price">
                                    @if(@$new_arrivals['8']->old_delivery_price !='0')
                                        £ {{@$new_arrivals['8']->old_delivery_price}}
                                    @endif
                                </span>
                            </p>
                        </div>
                    </div>
                    @endif
                </div>
                @endif
                @if($new_arrivals['0']->count()>="10")
                <div class="recommendation-carousel">
                    @if($new_arrivals['0']->count()>="10")
                    <div class="ps-product--vertical"><a href="{{route('products.details.info',@$new_arrivals['9']->slug)}}">
                        <img class="ps-product__thumbnail" src="{{asset('public/upload/product_images/'.@$new_arrivals['9']->image)}}" alt="alt" /></a>
                        <div class="ps-product__content">
                            <h5><a class="ps-product__name" href="{{route('products.details.info',@$new_arrivals['9']->slug)}}">{{@$new_arrivals['9']->name}}</a></h5>
                            <p class="ps-product-price-block">
                                <span class="ps-product__sale">
                                    Col: £ {{@$new_arrivals['9']->current_collective_price}}
                                </span>
                                <span class="ps-product__price">
                                    @if(@$new_arrivals['9']->old_collective_price !='0') 
                                        £ {{@$new_arrivals['9']->old_collective_price}}
                                    @endif
                                </span>
                            </p>
                            <p class="ps-product-price-block">
                                <span class="ps-product__sale">
                                    Del: £ {{@$new_arrivals['9']->current_delivery_price}}
                                </span><span class="ps-product__price">
                                    @if(@$new_arrivals['9']->old_delivery_price !='0')
                                        £ {{@$new_arrivals['9']->old_delivery_price}}
                                    @endif
                                </span>
                            </p>
                        </div>
                    </div>
                    @endif
                    @if($new_arrivals['0']->count()>="11")
                    <div class="ps-product--vertical"><a href="{{route('products.details.info',@$new_arrivals['10']->slug)}}">
                        <img class="ps-product__thumbnail" src="{{asset('public/upload/product_images/'.@$new_arrivals['10']->image)}}" alt="alt" /></a>
                        <div class="ps-product__content">
                            <h5><a class="ps-product__name" href="{{route('products.details.info',@$new_arrivals['10']->slug)}}">{{@$new_arrivals['10']->name}}</a></h5>
                            <p class="ps-product-price-block">
                                <span class="ps-product__sale">
                                    Col: £ {{@$new_arrivals['10']->current_collective_price}}
                                </span>
                                <span class="ps-product__price">
                                    @if(@$new_arrivals['10']->old_collective_price !='0') 
                                        £ {{@$new_arrivals['10']->old_collective_price}}
                                    @endif
                                </span>
                            </p>
                            <p class="ps-product-price-block">
                                <span class="ps-product__sale">
                                    Del: £ {{@$new_arrivals['10']->current_delivery_price}}
                                </span><span class="ps-product__price">
                                    @if(@$new_arrivals['10']->old_delivery_price !='0')
                                        £ {{@$new_arrivals['10']->old_delivery_price}}
                                    @endif
                                </span>
                            </p>
                        </div>
                    </div>
                    @endif
                    @if($new_arrivals['0']->count()>="12")
                    <div class="ps-product--vertical"><a href="{{route('products.details.info',@$new_arrivals['11']->slug)}}">
                        <img class="ps-product__thumbnail" src="{{asset('public/upload/product_images/'.@$new_arrivals['11']->image)}}" alt="alt" /></a>
                        <div class="ps-product__content">
                            <h5><a class="ps-product__name" href="{{route('products.details.info',@$new_arrivals['11']->slug)}}">{{@$new_arrivals['11']->name}}</a></h5>
                            <p class="ps-product-price-block">
                                <span class="ps-product__sale">
                                    Col: £ {{@$new_arrivals['11']->current_collective_price}}
                                </span>
                                <span class="ps-product__price">
                                    @if(@$new_arrivals['11']->old_collective_price !='0') 
                                        £ {{@$new_arrivals['11']->old_collective_price}}
                                    @endif
                                </span>
                            </p>
                            <p class="ps-product-price-block">
                                <span class="ps-product__sale">
                                    Del: £ {{@$new_arrivals['11']->current_delivery_price}}
                                </span><span class="ps-product__price">
                                    @if(@$new_arrivals['11']->old_delivery_price !='0')
                                        £ {{@$new_arrivals['11']->old_delivery_price}}
                                    @endif
                                </span>
                            </p>
                        </div>
                    </div>
                    @endif
                </div>
                @endif
                @if($new_arrivals['0']->count()>="13")
                <div class="recommendation-carousel">
                    @if($new_arrivals['0']->count()>="13")
                    <div class="ps-product--vertical"><a href="{{route('products.details.info',@$new_arrivals['12']->slug)}}">
                        <img class="ps-product__thumbnail" src="{{asset('public/upload/product_images/'.@$new_arrivals['12']->image)}}" alt="alt" /></a>
                        <div class="ps-product__content">
                            <h5><a class="ps-product__name" href="{{route('products.details.info',@$new_arrivals['12']->slug)}}">{{@$new_arrivals['12']->name}}</a></h5>
                            <p class="ps-product-price-block">
                                <span class="ps-product__sale">
                                    Col: £ {{@$new_arrivals['12']->current_collective_price}}
                                </span>
                                <span class="ps-product__price">
                                    @if(@$new_arrivals['12']->old_collective_price !='0') 
                                        £ {{@$new_arrivals['12']->old_collective_price}}
                                    @endif
                                </span>
                            </p>
                            <p class="ps-product-price-block">
                                <span class="ps-product__sale">
                                    Del: £ {{@$new_arrivals['12']->current_delivery_price}}
                                </span><span class="ps-product__price">
                                    @if(@$new_arrivals['12']->old_delivery_price !='0')
                                        £ {{@$new_arrivals['12']->old_delivery_price}}
                                    @endif
                                </span>
                            </p>
                        </div>
                    </div>
                    @endif
                    @if($new_arrivals['0']->count()>="14")
                    <div class="ps-product--vertical"><a href="{{route('products.details.info',@$new_arrivals['13']->slug)}}">
                        <img class="ps-product__thumbnail" src="{{asset('public/upload/product_images/'.@$new_arrivals['13']->image)}}" alt="alt" /></a>
                        <div class="ps-product__content">
                            <h5><a class="ps-product__name" href="{{route('products.details.info',@$new_arrivals['13']->slug)}}">{{@$new_arrivals['13']->name}}</a></h5>
                            <p class="ps-product-price-block">
                                <span class="ps-product__sale">
                                    Col: £ {{@$new_arrivals['13']->current_collective_price}}
                                </span>
                                <span class="ps-product__price">
                                    @if(@$new_arrivals['13']->old_collective_price !='0') 
                                        £ {{@$new_arrivals['13']->old_collective_price}}
                                    @endif
                                </span>
                            </p>
                            <p class="ps-product-price-block">
                                <span class="ps-product__sale">
                                    Del: £ {{@$new_arrivals['13']->current_delivery_price}}
                                </span><span class="ps-product__price">
                                    @if(@$new_arrivals['13']->old_delivery_price !='0')
                                        £ {{@$new_arrivals['13']->old_delivery_price}}
                                    @endif
                                </span>
                            </p>
                        </div>
                    </div>
                    @endif
                    @if($new_arrivals['0']->count()>="15")
                    <div class="ps-product--vertical"><a href="{{route('products.details.info',@$new_arrivals['14']->slug)}}">
                        <img class="ps-product__thumbnail" src="{{asset('public/upload/product_images/'.@$new_arrivals['14']->image)}}" alt="alt" /></a>
                        <div class="ps-product__content">
                            <h5><a class="ps-product__name" href="{{route('products.details.info',@$new_arrivals['14']->slug)}}">{{@$new_arrivals['14']->name}}</a></h5>
                            <p class="ps-product-price-block">
                                <span class="ps-product__sale">
                                    Col: £ {{@$new_arrivals['14']->current_collective_price}}
                                </span>
                                <span class="ps-product__price">
                                    @if(@$new_arrivals['14']->old_collective_price !='0') 
                                        £ {{@$new_arrivals['14']->old_collective_price}}
                                    @endif
                                </span>
                            </p>
                            <p class="ps-product-price-block">
                                <span class="ps-product__sale">
                                    Del: £ {{@$new_arrivals['14']->current_delivery_price}}
                                </span><span class="ps-product__price">
                                    @if(@$new_arrivals['14']->old_delivery_price !='0')
                                        £ {{@$new_arrivals['14']->old_delivery_price}}
                                    @endif
                                </span>
                            </p>
                        </div>
                    </div>
                    @endif
                </div>
                @endif
                @if($new_arrivals['0']->count()>="16")
                <div class="recommendation-carousel">
                    @if($new_arrivals['0']->count()>="16")
                    <div class="ps-product--vertical"><a href="{{route('products.details.info',@$new_arrivals['15']->slug)}}">
                        <img class="ps-product__thumbnail" src="{{asset('public/upload/product_images/'.@$new_arrivals['15']->image)}}" alt="alt" /></a>
                        <div class="ps-product__content">
                            <h5><a class="ps-product__name" href="{{route('products.details.info',@$new_arrivals['15']->slug)}}">{{@$new_arrivals['15']->name}}</a></h5>
                            <p class="ps-product-price-block">
                                <span class="ps-product__sale">
                                    Col: £ {{@$new_arrivals['15']->current_collective_price}}
                                </span>
                                <span class="ps-product__price">
                                    @if(@$new_arrivals['15']->old_collective_price !='0') 
                                        £ {{@$new_arrivals['15']->old_collective_price}}
                                    @endif
                                </span>
                            </p>
                            <p class="ps-product-price-block">
                                <span class="ps-product__sale">
                                    Del: £ {{@$new_arrivals['15']->current_delivery_price}}
                                </span><span class="ps-product__price">
                                    @if(@$new_arrivals['15']->old_delivery_price !='0')
                                        £ {{@$new_arrivals['15']->old_delivery_price}}
                                    @endif
                                </span>
                            </p>
                        </div>
                    </div>
                    @endif
                    @if($new_arrivals['0']->count()>="17")
                    <div class="ps-product--vertical"><a href="{{route('products.details.info',@$new_arrivals['16']->slug)}}">
                        <img class="ps-product__thumbnail" src="{{asset('public/upload/product_images/'.@$new_arrivals['16']->image)}}" alt="alt" /></a>
                        <div class="ps-product__content">
                            <h5><a class="ps-product__name" href="{{route('products.details.info',@$new_arrivals['16']->slug)}}">{{@$new_arrivals['16']->name}}</a></h5>
                            <p class="ps-product-price-block">
                                <span class="ps-product__sale">
                                    Col: £ {{@$new_arrivals['16']->current_collective_price}}
                                </span>
                                <span class="ps-product__price">
                                    @if(@$new_arrivals['16']->old_collective_price !='0') 
                                        £ {{@$new_arrivals['16']->old_collective_price}}
                                    @endif
                                </span>
                            </p>
                            <p class="ps-product-price-block">
                                <span class="ps-product__sale">
                                    Del: £ {{@$new_arrivals['16']->current_delivery_price}}
                                </span><span class="ps-product__price">
                                    @if(@$new_arrivals['16']->old_delivery_price !='0')
                                        £ {{@$new_arrivals['16']->old_delivery_price}}
                                    @endif
                                </span>
                            </p>
                        </div>
                    </div>
                    @endif
                    @if($new_arrivals['0']->count()>="18")
                    <div class="ps-product--vertical"><a href="{{route('products.details.info',@$new_arrivals['17']->slug)}}">
                        <img class="ps-product__thumbnail" src="{{asset('public/upload/product_images/'.@$new_arrivals['17']->image)}}" alt="alt" /></a>
                        <div class="ps-product__content">
                            <h5><a class="ps-product__name" href="{{route('products.details.info',@$new_arrivals['17']->slug)}}">{{@$new_arrivals['17']->name}}</a></h5>
                            <p class="ps-product-price-block">
                                <span class="ps-product__sale">
                                    Col: £ {{@$new_arrivals['17']->current_collective_price}}
                                </span>
                                <span class="ps-product__price">
                                    @if(@$new_arrivals['17']->old_collective_price !='0') 
                                        £ {{@$new_arrivals['17']->old_collective_price}}
                                    @endif
                                </span>
                            </p>
                            <p class="ps-product-price-block">
                                <span class="ps-product__sale">
                                    Del: £ {{@$new_arrivals['17']->current_delivery_price}}
                                </span><span class="ps-product__price">
                                    @if(@$new_arrivals['17']->old_delivery_price !='0')
                                        £ {{@$new_arrivals['17']->old_delivery_price}}
                                    @endif
                                </span>
                            </p>
                        </div>
                    </div>
                    @endif
                </div>
                @endif
                @if($new_arrivals['0']->count()>="19")
                <div class="recommendation-carousel">
                    @if($new_arrivals['0']->count()>="19")
                    <div class="ps-product--vertical"><a href="{{route('products.details.info',@$new_arrivals['18']->slug)}}">
                        <img class="ps-product__thumbnail" src="{{asset('public/upload/product_images/'.@$new_arrivals['18']->image)}}" alt="alt" /></a>
                        <div class="ps-product__content">
                            <h5><a class="ps-product__name" href="{{route('products.details.info',@$new_arrivals['18']->slug)}}">{{@$new_arrivals['18']->name}}</a></h5>
                            <p class="ps-product-price-block">
                                <span class="ps-product__sale">
                                    Col: £ {{@$new_arrivals['18']->current_collective_price}}
                                </span>
                                <span class="ps-product__price">
                                    @if(@$new_arrivals['18']->old_collective_price !='0') 
                                        £ {{@$new_arrivals['18']->old_collective_price}}
                                    @endif
                                </span>
                            </p>
                            <p class="ps-product-price-block">
                                <span class="ps-product__sale">
                                    Del: £ {{@$new_arrivals['18']->current_delivery_price}}
                                </span><span class="ps-product__price">
                                    @if(@$new_arrivals['18']->old_delivery_price !='0')
                                        £ {{@$new_arrivals['18']->old_delivery_price}}
                                    @endif
                                </span>
                            </p>
                        </div>
                    </div>
                    @endif
                    @if($new_arrivals['0']->count()>="20")
                    <div class="ps-product--vertical"><a href="{{route('products.details.info',@$new_arrivals['19']->slug)}}">
                        <img class="ps-product__thumbnail" src="{{asset('public/upload/product_images/'.@$new_arrivals['19']->image)}}" alt="alt" /></a>
                        <div class="ps-product__content">
                            <h5><a class="ps-product__name" href="{{route('products.details.info',@$new_arrivals['19']->slug)}}">{{@$new_arrivals['19']->name}}</a></h5>
                            <p class="ps-product-price-block">
                                <span class="ps-product__sale">
                                    Col: £ {{@$new_arrivals['19']->current_collective_price}}
                                </span>
                                <span class="ps-product__price">
                                    @if(@$new_arrivals['19']->old_collective_price !='0') 
                                        £ {{@$new_arrivals['19']->old_collective_price}}
                                    @endif
                                </span>
                            </p>
                            <p class="ps-product-price-block">
                                <span class="ps-product__sale">
                                    Del: £ {{@$new_arrivals['19']->current_delivery_price}}
                                </span><span class="ps-product__price">
                                    @if(@$new_arrivals['19']->old_delivery_price !='0')
                                        £ {{@$new_arrivals['19']->old_delivery_price}}
                                    @endif
                                </span>
                            </p>
                        </div>
                    </div>
                    @endif
                    @if($new_arrivals['0']->count()>="21")
                    <div class="ps-product--vertical"><a href="{{route('products.details.info',@$new_arrivals['20']->slug)}}">
                        <img class="ps-product__thumbnail" src="{{asset('public/upload/product_images/'.@$new_arrivals['20']->image)}}" alt="alt" /></a>
                        <div class="ps-product__content">
                            <h5><a class="ps-product__name" href="{{route('products.details.info',@$new_arrivals['20']->slug)}}">{{@$new_arrivals['20']->name}}</a></h5>
                            <p class="ps-product-price-block">
                                <span class="ps-product__sale">
                                    Col: £ {{@$new_arrivals['20']->current_collective_price}}
                                </span>
                                <span class="ps-product__price">
                                    @if(@$new_arrivals['20']->old_collective_price !='0') 
                                        £ {{@$new_arrivals['20']->old_collective_price}}
                                    @endif
                                </span>
                            </p>
                            <p class="ps-product-price-block">
                                <span class="ps-product__sale">
                                    Del: £ {{@$new_arrivals['20']->current_delivery_price}}
                                </span><span class="ps-product__price">
                                    @if(@$new_arrivals['20']->old_delivery_price !='0')
                                        £ {{@$new_arrivals['20']->old_delivery_price}}
                                    @endif
                                </span>
                            </p>
                        </div>
                    </div>
                    @endif
                </div>
                @endif
            </div>
        </div>
    </div>
</section>