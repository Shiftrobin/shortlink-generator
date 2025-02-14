@extends('frontend.layouts.master')
@section('content')
<style type="text/css">
    .at-resp-share-element .at-share-btn .at-label {
        font-family: helvetica neue,helvetica,arial,sans-serif;
        font-size: 9pt;
        padding: 0 0px 0 0;
        margin: 0 0 0 0px;
        height: 2pc;
        line-height: 2pc;
        background: none;
    }
</style>
<main class="no-main">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="ps-breadcrumb__list">
                <li class="active"><a href="{{url('')}}">Home</a></li>
                <li class="active"><a href="{{route('category.wise.product',@$product->category_id)}}">{{@$product['category']['name']}}</a></li>
                <li class="active"><a href="{{route('sub.category.wise.product',@$product->sub_category_id)}}">{{@$product['sub_category']['name']}}</a></li>
                <li><a href="javascript:void(0);">{{@$product->name}}</a></li>
            </ul>
        </div>
    </div>
    <section class="section--product-type section-product--default">
        <div class="container">
            <div class="product__detail">
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="ps-product--detail">
                            <div class="row">
                                <div class="col-12 col-lg-5">
                                    <div class="ps-product__variants">
                                        <div class="ps-product__gallery">
                                            @foreach($product['product_img'] as $key => $img)
                                            <div class="ps-gallery__item {{($key=='0')?'active':''}}"><img src="{{ url('public/upload/product_sub_images',$img->gallery_image) }}" alt="alt" /></div>
                                            @endforeach
                                        </div>
                                        <div class="ps-product__thumbnail">
                                            <div class="ps-product__zoom"><img id="ps-product-zoom" src="{{ url('public/upload/product_sub_images',@$product['product_img']['0']->gallery_image) }}" alt="alt" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-7">
                                    <h3 class="product__name">{{@$product->name}}</h3>
                                    <h4 class="product__name">Code: {{@$product->product_code}}</h4>
                                    @if(Session::get('sale_type_id')==NULL)
                                    <div class="ps-product__sale">
                                        <span class="price-sale">
                                            Col: £ {{$product->current_collective_price}}
                                        </span>
                                        <span class="price">
                                            @if($product->old_collective_price !='0')
                                            £{{$product->old_collective_price}}
                                            @endif
                                        </span>
                                    </div>
                                    <div class="ps-product__sale">
                                        <span class="price-sale">
                                            Del: £ {{$product->current_delivery_price}}
                                        </span>
                                        <span class="price">
                                            @if($product->old_delivery_price !='0')
                                            £{{$product->old_delivery_price}}
                                            @endif
                                        </span>
                                    </div>
                                    @elseif(Session::get('sale_type_id')=="1")
                                    <div class="ps-product__sale">
                                        <span class="price-sale">
                                            Col: £ {{$product->current_collective_price}}
                                        </span>
                                        <span class="price">
                                            @if($product->old_collective_price !='0')
                                            £{{$product->old_collective_price}}
                                            @endif
                                        </span>
                                    </div>
                                    @elseif(Session::get('sale_type_id')=="2")
                                    <div class="ps-product__sale">
                                        <span class="price-sale">
                                            Del: £ {{$product->current_delivery_price}}
                                        </span>
                                        <span class="price"> 
                                            @if($product->old_delivery_price !='0')
                                            £{{$product->old_delivery_price}}
                                            @endif
                                        </span>
                                    </div>
                                    @endif
                                    <div class="ps-product__variable">
                                        <!-- <span>Brand Name:  
                                            <span class="ps-product__attribute-value">{{@$product['brand']['0']['brand']['name']}}</span>
                                        </span> -->
                                        <div class="ps-product__type">
                                            @foreach($product['brand'] as $brand_key => $brn)
                                            <span class="ps-product__attribute attribute-text {{($brand_key=='0')?'active':''}}" data-value="{{@$brn['brand']['name']}}">
                                                <img src="{{ url('public/upload/brand_image',@$brn['brand']['image']) }}" width="20px" height="30px">
                                            </span>
                                            @endforeach
                                    </div>
                                    @if($product->stock_status=="In Stock")
                                    <div class="ps-product__avai alert__success">Availability: <span>{{$product->stock_status}}</span>
                                    </div>
                                    @endif
                                    @if($product->stock_status=="Out of Stock")
                                    <div class="ps-product__avai alert__error">Availability: <span>{{$product->stock_status}}</span>
                                    </div>
                                    @endif
                                    <div class="ps-product__shopping">
                                        <div class="ps-product__quantity">
                                            <label>Quantity: </label>
                                            <form id='myform' method='POST' action="{{route('insert.cart.details')}}">
                                            @csrf
                                                <div class="def-number-input number-input safari_only">
                                                    <a class="minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" style="background-color:#f7f7f7border: none;display: flex;align-items: center;justify-content: center;font-size: 13px;padding: 8px;cursor: pointer;"><i class="icon-minus"></i></a>
                                                    <input type="hidden" name="id" value="{{$product->id}}">
                                                    <input class="quantity" min="1" name="qty" value="1" type="number" />
                                                    <a class="plus" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" style="background-color:#f7f7f7border: none;display: flex;align-items: center;justify-content: center;font-size: 13px;padding: 8px;cursor: pointer;"><i class="icon-plus"></i></a>
                                                </div>
                                        </div>
                                        <button class="ps-product__addcart ps-button" style="border: 1px solid #ff7200;"><i class="icon-cart"></i>Add to cart</button>
                                        </form>
                                    </div>
                                    <div class="ps-product__category">
                                        <ul>
                                            <li><strong>Occation/Deals Remaining:</strong> {{@$product->occation_remeaning}}</li>
                                            <li><strong>Tags:</strong> {{@$product->product_tag}}</li>
                                        </ul>
                                    </div>
                                    <div class="ps-product__social">
                                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                        <div class="addthis_inline_share_toolbox"></div>
                                        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5f87485f8f9e33b2"></script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="product__content">
                <ul class="nav nav-pills" role="tablist" id="productTabDetail">
                    <li class="nav-item">
                        <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description-content" role="tab" aria-controls="description-content" aria-selected="true">Description</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="nutrition-tab" data-toggle="tab" href="#nutrition-content" role="tab" aria-controls="nutrition-content" aria-selected="false">Ingredient</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="qa-tab" data-toggle="tab" href="#qa-content" role="tab" aria-controls="qa-content" aria-selected="false">Nutrition</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="vendor-tab" data-toggle="tab" href="#vendor-content" role="tab" aria-controls="vendor-content" aria-selected="false">Allergy advice</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews-content" role="tab" aria-controls="reviews-content" aria-selected="false">Reviews({{@$review_count}})</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="description-content" role="tabpanel" aria-labelledby="description-tab">
                        <d style="text-align: justify;">
                            <?php echo @$product->occation_description; ?>
                        </d>
                    </div>
                    <div class="tab-pane fade" id="nutrition-content" role="tabpanel" aria-labelledby="nutrition-tab">
                        <d style="text-align: justify;">
                            <?php echo @$product->ingredient; ?>
                        </d>
                    </div>
                    <div class="tab-pane fade" id="qa-content" role="tabpanel" aria-labelledby="qa-tab">
                        <d style="text-align: justify;">
                            <?php echo @$product->nutrition_value; ?>
                        </d>
                    </div>
                    <div class="tab-pane fade" id="vendor-content" role="tabpanel" aria-labelledby="vendor-tab">
                        <d style="text-align: justify;">
                            <?php echo @$product->allergy_advice; ?>
                        </d>
                    </div>
                    <div class="tab-pane fade" id="reviews-content" role="tabpanel" aria-labelledby="reviews-tab">
                        <div class="ps-product--reviews">
                            <div class="row">
                                <div class="col-12 col-lg-5">
                                    <div class="review__box">
                                        <div class="product__rate">4.5</div>
                                        <select class="rating-stars">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4" selected="selected">4</option>
                                            <option value="5">5</option>
                                        </select>
                                        <p>Avg. Star Rating: <b class="text-black">(4 reviews)</b></p>
                                        <div class="review__progress">
                                            <div class="progress-item"><span class="star">5 Stars</span>
                                                <div class="progress">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 80%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div><span class="percent">80%</span>
                                            </div>
                                            <div class="progress-item"><span class="star">4 Stars</span>
                                                <div class="progress">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div><span class="percent">20%</span>
                                            </div>
                                            <div class="progress-item"><span class="star">3 Stars</span>
                                                <div class="progress">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 0%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div><span class="percent">0%</span>
                                            </div>
                                            <div class="progress-item"><span class="star">2 Stars</span>
                                                <div class="progress">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 0%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div><span class="percent">0%</span>
                                            </div>
                                            <div class="progress-item"><span class="star">1 Stars</span>
                                                <div class="progress">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 0%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div><span class="percent">0%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if(@Auth::user()->id !=NULL && @Auth::user()->usertype=='customer')
                                <div class="col-12 col-lg-7">
                                    <div class="review__title">Add A Review</div>
                                    <p class="mb-0">Your email will not be published. Required fields are marked <span class="text-danger">*</span></p>
                                    <form method="POST" action="{{route('review.store')}}" id="reviewForm">
                                        @csrf
                                        <div class="form-row">
                                            <input type="hidden" name="product_id" value="{{@$product->id}}">
                                            <div class="col-12 form-group--block">
                                                <div class="input__rating">
                                                    <label>Your rating: <span>*</span></label>
                                                    <select class="rating-stars" name="rating" required>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4" selected="selected">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 form-group--block">
                                                <label>Review: <span>*</span></label>
                                                <textarea name="description" class="form-control" required></textarea>
                                            </div>
                                            <div class="col-12 form-group--block">
                                                <button type="submit" class="btn ps-button ps-btn-submit">Submit Review</button>
                                            </div>
                                        </div>
                                    </form>
                                    <script>
                                        $(function() {
                                            $("#reviewForm").validate({
                                                errorClass:'text-danger',
                                                validClass:'text-success',
                                                rules: {
                                                    description: {
                                                        required: true,
                                                    }
                                                },
                                                messages: {
                                                    description : {
                                                        required : 'Review is required',
                                                    },
                                                }
                                            });
                                        });
                                    </script>
                                </div>
                                @endif
                            </div>
                            <div class="ps--comments">
                                <h5 class="comment__title">{{@$review_count}} Comments</h5>
                                <ul class="comment__list">
                                    @foreach($reviews as $review)
                                    <li class="comment__item">
                                        <div class="item__content">
                                            <div class="item__name">{{@$review['reviewer']['first_name']}} {{@$review['reviewer']['last_name']}}</div>
                                            <div class="item__date">- {{date('d-m-Y',strtotime($review->date))}}</div>
                                            <div class="item__check"> <i class="icon-checkmark-circle"></i>Verified</div>
                                            <div class="item__rate">
                                                <select class="rating-stars">
                                                    <option {{($review->rating=="1")?"selected":""}}>1</option>
                                                    <option {{($review->rating=="2")?"selected":""}}>2</option>
                                                    <option {{($review->rating=="3")?"selected":""}}>3</option>
                                                    <option {{($review->rating=="4")?"selected":""}}>4</option>
                                                    <option {{($review->rating=="5")?"selected":""}}>5</option>
                                                </select>
                                            </div>
                                            <p class="item__des" style="text-align:justify;">{{$review->description}}</p>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product__related">
                <h3 class="product__name">Related Products</h3>
                <div class="owl-carousel" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="5" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="5" data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">
                    @foreach($related_products as $rproduct)
                    <div class="ps-post--product">
                        <div class="ps-product--standard"><a href="{{route('products.details.info',$rproduct->slug)}}"><img class="ps-product__thumbnail" src="{{asset('public/upload/product_images/'.$rproduct->image)}}" alt="alt" /></a>
                            <div class="ps-product__content">
                                @if(Session::get('sale_type_id')==NULL)
                                <p class="ps-product-price-block">
                                    <span class="ps-product__sale">
                                        Col: £ {{$rproduct->current_collective_price}}
                                    </span>
                                    <span class="ps-product__price">
                                        @if($rproduct->old_collective_price!='0')£ {{$rproduct->old_collective_price}}@endif
                                    </span><br>
                                </p>
                                <p class="ps-product-price-block">
                                    <span class="ps-product__sale">
                                        Del: £ {{$rproduct->current_delivery_price}}
                                    </span>
                                    <span class="ps-product__price">
                                        @if($rproduct->old_delivery_price!='0')£ {{$rproduct->old_delivery_price}}@endif
                                    </span><br>
                                </p>
                                @elseif(Session::get('sale_type_id')=="1")
                                <p class="ps-product-price-block">
                                    <span class="ps-product__sale">
                                        Col: £ {{$rproduct->current_collective_price}}
                                    </span>
                                    <span class="ps-product__price">
                                        @if($rproduct->old_collective_price!='0')£ {{$rproduct->old_collective_price}}@endif
                                    </span><br>
                                </p>
                                @elseif(Session::get('sale_type_id')=="2")
                                <p class="ps-product-price-block">
                                    <span class="ps-product__sale">
                                        Del: £ {{$rproduct->current_delivery_price}}
                                    </span>
                                    <span class="ps-product__price">
                                        @if($rproduct->old_delivery_price!='0')£ {{$rproduct->old_delivery_price}}@endif
                                    </span><br>
                                </p>
                                @endif
                                <a href="{{route('products.details.info',$rproduct->slug)}}">
                                    <h5 class="ps-product__name">{{$rproduct->name}}</h5>
                                </a>
                            </div>
                            <div class="ps-product__content">
                                <form id='myform' method='POST' action="{{route('insert.cart')}}">
                                    @csrf
                                    <div class="def-number-input number-input safari_only">
                                        <a class="minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" style="background-color:#f7f7f7border: none;display: flex;align-items: center;justify-content: center;font-size: 13px;padding: 8px;cursor: pointer;"><i class="icon-minus"></i></a>
                                        <input class="quantity" min="1" name="qty" value="1" type="number" />
                                        <input type="hidden" name="id" value="{{$product->id}}">
                                        <a class="plus" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" style="background-color:#f7f7f7border: none;display: flex;align-items: center;justify-content: center;font-size: 13px;padding: 8px;cursor: pointer;"><i class="icon-plus"></i></a>
                                    </div>
                                    <button type="submit" class="ps-product__addcart"><i class="icon-cart"></i>Add to cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</main>
@endsection