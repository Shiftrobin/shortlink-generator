<section class="section-featured--default ps-home--block">
    <div class="container">
        <div class="ps-block__header">
            <h3 class="ps-block__title">Featured Categories</h3><a class="ps-block__view" href="{{route('all.sub-category.list')}}">View all<i class="icon-chevron-right"></i></a>
        </div>
        @php
            $category_count = App\Model\Product::where('category_id',@$category->id)->count();
        @endphp
        <div class="featured--content">
            <div class="featured__first">
                <div class="ps-product--vertical">
                    <a href="{{route('category.wise.product',@$category->id)}}">
                        <img class="ps-product__thumbnail" src="{{url('public/upload/category_images/'.@$category->image)}}" alt="alt" />
                    </a>
                    <div class="ps-product__content">
                        <a class="ps-product__name" href="{{route('category.wise.product',@$category->id)}}">{{@$category->name}}</a>
                        <p class="ps-product__quantity">{{$category_count}} items</p>
                    </div>
                </div>
            </div>
            <div class="featured__group">
                <div class="row m-0">
                    @foreach($home_sub_categories as $home_cat)
                    @php
                        $count_sub_product = App\Model\Product::where('sub_category_id',$home_cat->id)->count();
                    @endphp
                    <div class="col-3 p-0">
                        <div class="ps-product--vertical">
                            <a href="{{route('sub.category.wise.product',$home_cat->id)}}">
                                <img class="ps-product__thumbnail" src="{{url('public/upload/sub_category_images/'.$home_cat->image)}}" alt="alt" />
                            </a>
                            <div class="ps-product__content">
                                <a class="ps-product__name" href="{{route('sub.category.wise.product',$home_cat->id)}}">Food Cupboard
                                </a>
                                <p class="ps-product__quantity">{{$count_sub_product}} items</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="featured--content-mobile">
            <div class="owl-carousel" data-owl-auto="true" data-owl-loop="true" data-owl-speed="10000" data-owl-gap="0" data-owl-nav="false" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
                @php
                    $first_count = App\Model\Product::where('sub_category_id',@$home_sub_categories['0']->id)->count();
                    $second_count = App\Model\Product::where('sub_category_id',@$home_sub_categories['1']->id)->count();
                    $third_count = App\Model\Product::where('sub_category_id',@$home_sub_categories['2']->id)->count();
                    $fourth_count = App\Model\Product::where('sub_category_id',@$home_sub_categories['3']->id)->count();
                    $fifth_count = App\Model\Product::where('sub_category_id',@$home_sub_categories['4']->id)->count();
                    $sixth_count = App\Model\Product::where('sub_category_id',@$home_sub_categories['5']->id)->count();
                    $seventh_count = App\Model\Product::where('sub_category_id',@$home_sub_categories['6']->id)->count();
                    $eight_count = App\Model\Product::where('sub_category_id',@$home_sub_categories['7']->id)->count();
                @endphp
                @if($home_sub_categories->count()>="1")
                <div class="product-slide">
                    <a class="ps-product--vertical item-first" href="{{route('category.wise.product',@$category->id)}}"><img class="ps-product__thumbnail" src="{{url('public/upload/category_images/'.@$category->image)}}" alt="alt" />
                        <div class="ps-product__content">
                            <h5 class="ps-product__name">{{@$category->name}}</h5>
                            <p class="ps-product__quantity">{{$category_count}} items</p>
                        </div>
                    </a>
                    @if($home_sub_categories->count()>="1")
                    <a class="ps-product--vertical" href="{{route('sub.category.wise.product',@$home_sub_categories['0']->id)}}"><img class="ps-product__thumbnail" src="{{url('public/upload/sub_category_images/'.@$home_sub_categories['0']->image)}}" alt="alt" />
                       <div class="ps-product__content">
                           <h5 class="ps-product__name">{{@$home_sub_categories['0']->name}}</h5>
                           <p class="ps-product__quantity">{{$first_count}} items</p>
                       </div>
                    </a>
                    @endif
                    @if($home_sub_categories->count()>="2")
                    <a class="ps-product--vertical" href="{{route('sub.category.wise.product',@$home_sub_categories['1']->id)}}"><img class="ps-product__thumbnail" src="{{url('public/upload/sub_category_images/'.@$home_sub_categories['1']->image)}}" alt="alt" />
                       <div class="ps-product__content">
                           <h5 class="ps-product__name">{{@$home_sub_categories['1']->name}}</h5>
                           <p class="ps-product__quantity">{{$second_count}} items</p>
                       </div>
                    </a>
                    @endif
                </div>
                @endif
                @if($home_sub_categories->count()>="3")
                <div class="product-slide">
                    @if($home_sub_categories->count()>="3")
                    <a class="ps-product--vertical" href="{{route('sub.category.wise.product',@$home_sub_categories['2']->id)}}"><img class="ps-product__thumbnail" src="{{url('public/upload/sub_category_images/'.@$home_sub_categories['2']->image)}}" alt="alt" />
                       <div class="ps-product__content">
                           <h5 class="ps-product__name">{{@$home_sub_categories['2']->name}}</h5>
                           <p class="ps-product__quantity">{{$third_count}} items</p>
                       </div>
                    </a>
                    @endif
                    @if($home_sub_categories->count()>="4")
                    <a class="ps-product--vertical" href="{{route('sub.category.wise.product',@$home_sub_categories['3']->id)}}"><img class="ps-product__thumbnail" src="{{url('public/upload/sub_category_images/'.@$home_sub_categories['3']->image)}}" alt="alt" />
                       <div class="ps-product__content">
                           <h5 class="ps-product__name">{{@$home_sub_categories['3']->name}}</h5>
                           <p class="ps-product__quantity">{{$fourth_count}} items</p>
                       </div>
                    </a>
                    @endif
                    @if($home_sub_categories->count()>="5")
                    <a class="ps-product--vertical" href="{{route('sub.category.wise.product',@$home_sub_categories['4']->id)}}"><img class="ps-product__thumbnail" src="{{url('public/upload/sub_category_images/'.@$home_sub_categories['4']->image)}}" alt="alt" />
                       <div class="ps-product__content">
                           <h5 class="ps-product__name">{{@$home_sub_categories['4']->name}}</h5>
                           <p class="ps-product__quantity">{{$fifth_count}} items</p>
                       </div>
                    </a>
                    @endif
                    @if($home_sub_categories->count()>="6")
                    <a class="ps-product--vertical" href="{{route('sub.category.wise.product',@$home_sub_categories['5']->id)}}"><img class="ps-product__thumbnail" src="{{url('public/upload/sub_category_images/'.@$home_sub_categories['5']->image)}}" alt="alt" />
                       <div class="ps-product__content">
                           <h5 class="ps-product__name">{{@$home_sub_categories['5']->name}}</h5>
                           <p class="ps-product__quantity">{{$sixth_count}} items</p>
                       </div>
                    </a>
                    @endif
                </div>
                @endif
                @if($home_sub_categories->count()>="7")
                <div class="product-slide">
                    @if($home_sub_categories->count()>="7")
                    <a class="ps-product--vertical" href="{{route('sub.category.wise.product',@$home_sub_categories['6']->id)}}"><img class="ps-product__thumbnail" src="{{url('public/upload/sub_category_images/'.@$home_sub_categories['6']->image)}}" alt="alt" />
                       <div class="ps-product__content">
                           <h5 class="ps-product__name">{{@$home_sub_categories['6']->name}}</h5>
                           <p class="ps-product__quantity">{{$seventh_count}} items</p>
                       </div>
                    </a>
                    @endif
                    @if($home_sub_categories->count()>="8")
                    <a class="ps-product--vertical" href="{{route('sub.category.wise.product',@$home_sub_categories['7']->id)}}"><img class="ps-product__thumbnail" src="{{url('public/upload/sub_category_images/'.@$home_sub_categories['7']->image)}}" alt="alt" />
                       <div class="ps-product__content">
                           <h5 class="ps-product__name">{{@$home_sub_categories['7']->name}}</h5>
                           <p class="ps-product__quantity">{{$eight_count}} items</p>
                       </div>
                    </a>
                    @endif
                </div>
                @endif
            </div>
        </div>
    </div>
</section>