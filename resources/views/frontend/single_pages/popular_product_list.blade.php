@extends('frontend.layouts.master')
@section('content')
<style>
    .bs-example{
        margin: 0px;
    }
    .accordion .fa{
        margin-right: 0.5rem;
    }
    .list_button{
      width: 100%;
    }
    .card-header {
      padding: 0px; 
      margin-bottom: 0;
      border: 1px dotted #F7F7F7;
    }
    .card-body{
       border: 1px dotted #F7F7F7;
    }
    .active_filter_search{
      background: #F7F7F7;
      padding: 5px 20px;
      color: #fff;
    }
</style>
<script>
    $(document).ready(function(){
        // Add minus icon for collapse element which is open by default
        $(".collapse.show").each(function(){
          $(this).prev(".card-header").find(".fa").addClass("fa-minus").removeClass("fa-plus");
        });
        
        // Toggle plus minus icon on show hide of collapse element
        $(".collapse").on('show.bs.collapse', function(){
          $(this).prev(".card-header").find(".fa").removeClass("fa-plus").addClass("fa-minus");
        }).on('hide.bs.collapse', function(){
          $(this).prev(".card-header").find(".fa").removeClass("fa-minus").addClass("fa-plus");
        });
    });
</script>
<main class="no-main">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="ps-breadcrumb__list">
                <li class="active"><a href="{{url('')}}">Home</a></li>
                <li><a href="javascript:void(0);">Populars</a></li>
            </ul>
        </div>
    </div>
    <section class="section-shop shop-categories--default">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-3">
                    <div class="ps-shop--sidebar">
                        <div class="sidebar__sort">
                            <div class="sidebar__block open">
                                <div class="sidebar__title">BY CATEGORIES<span class="shop-widget-toggle"><i class="icon-minus"></i></span></div>
                                <div class="bs-example">
                                   <div class="accordion" id="accordionExample">
                                      @foreach($categories as $key => $cat)
                                      @php
                                        $sub_categories = App\Model\Product::select('sub_category_id')->groupBy('sub_category_id')->where('category_id',$cat->category_id)->get();
                                      @endphp
                                      <div class="card">
                                         <div class="card-header" id="headingTwo">
                                            <h2 class="mb-0">
                                               <button type="button" class="text-left list_button btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo-{{$key}}" aria-expanded="false"> 
                                               <span class="filter-by-left-title" style="font-size:14px">{{@$cat['category']['name']}}</span>
                                               <span class="pull-right filter-by-right-sign"><i class="fa fa-plus"></i></span>
                                               </button>
                                            </h2>
                                         </div>
                                         <div id="collapseTwo-{{$key}}" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample" style="">
                                            <div class="card-body">
                                                @foreach($sub_categories as $sub_category)
                                                @php
                                                    $sub_prod_count = App\Model\Product::where('sub_category_id',$sub_category->sub_category_id)->count();
                                                @endphp
                                                <a href="{{route('sub.category.wise.product',$sub_category->sub_category_id)}}" style="font-size:13px">{{@$sub_category['sub_category']['name']}} ({{@$sub_prod_count}} items)</a><br>
                                                @endforeach
                                            </div>
                                         </div>
                                      </div>
                                      @endforeach
                                   </div>
                                </div>
                            </div>
                            <div class="sidebar__block open">
                                <div class="sidebar__title">BY PRICE<span class="shop-widget-toggle"><i class="icon-minus"></i></span></div>
                                <div class="block__content">
                                    <form>
                                        <div class="block__price">
                                            <div id="slide-price"></div>
                                        </div>
                                        <div class="block__input">
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text">£</span></div>
                                                <input name="min_value" class="form-control" type="text" id="input-with-keypress-0">
                                            </div>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text">£</span></div>
                                                <input name="max_value" class="form-control" type="text" id="input-with-keypress-1">
                                            </div>
                                            <button type="submit">Go</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            @php
                                $total_sell = App\Model\OrderDetail::count();
                                $count_arrival = App\Model\Product::where('product_status','like','%New Arrival%')->count();
                                $count_popular = App\Model\Product::where('product_status','like','%Popular%')->count();
                            @endphp
                            <div class="sidebar__block open">
                                <div class="sidebar__title">SOLD BY<span class="shop-widget-toggle"><i class="icon-minus"></i></span></div>
                                <div class="block__content">
                                    <ul>
                                        <li>
                                            <a href="{{route('all.best-seller.list')}}">
                                                <div class="form-check">
                                                    <label for="sold0" style="cursor: pointer;">Total Sales <span>({{$total_sell}})</span></label>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sidebar__block open">
                                <div class="sidebar__title">OPTIONS<span class="shop-widget-toggle"><i class="icon-minus"></i></span></div>
                                <div class="block__content">
                                    <ul>
                                        <li>
                                            <a href="{{route('all.new-arrival.list')}}">
                                                <div class="form-check">
                                                    <label for="option0" style="cursor: pointer;">New Arrivals <span>({{$count_arrival}})</span></label>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('all.popular.list')}}">
                                                <div class="form-check">
                                                    <label for="option1">Popular <span>({{$count_popular}})</span></label>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-9">
                    <div class="result__header">
                        <h4 class="title">Populars</span></h4>
                    </div>
                    <div class="result__content mt-4">
                        <div class="section-shop--grid">
                            <div class="row m-0">
                                @foreach($populars as $product)
                                <div class="col-6 col-md-4 col-lg-3 p-0">
                                    <div class="ps-product--standard" style="border: 1px dotted;min-height: 360px !important"><a href="{{route('products.details.info',$product->slug)}}"><img class="ps-product__thumbnail" src="{{asset('public/upload/product_images/'.$product->image)}}" alt="alt" /></a>
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
                                                <button type="submit" class="ps-product__addcart"><i class="icon-cart"></i>Add to cart</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="ps-pagination blog--pagination">
                            {{$populars->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection