{{-- @php
    $recent_products = App\Models\RecentProduct::select('product_id')->where('user_id',@Auth::user()->id)->groupBy('product_id')->get()->toArray();
    $products = App\Models\Product::whereIn('id',$recent_products)->get();
@endphp
@if(@Auth::user()->id !=NULL && @Auth::user()->usertype=='customer')
<section class="section-recent--default ps-home--block">
   <div class="container">
      <div class="ps-block__header">
         <h3 class="ps-block__title">Your Recent Viewed</h3>
      </div>
      <div class="recent__content">
         <div class="owl-carousel" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="8" data-owl-item-xs="3" data-owl-item-sm="3" data-owl-item-md="5" data-owl-item-lg="8" data-owl-item-xl="8" data-owl-duration="1000" data-owl-mousedrag="on">
            @foreach($products as $product)
            <a title="{{$product->name}}" class="recent-item" href="{{route('products.details.info',$product->slug)}}">
                <img src="{{asset('public/upload/product_images/'.$product->image)}}" alt="alt" />
            </a>
            @endforeach
         </div>
      </div>
   </div>
</section>
@endif --}}