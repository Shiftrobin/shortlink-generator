@extends('frontend.layouts.master')
@section('content')
<main class="no-main">
     <div class="ps-breadcrumb">
         <div class="container">
             <ul class="ps-breadcrumb__list">
                 <li class="active"><a href="{{url('')}}">Home</a></li>
                 <li><a href="javascript:void(0);">Refund & FAQs</a></li>
             </ul>
         </div>
     </div>
     <section class="section--faq ps-page--business">
         <div class="banner--block"><img class="banner-img" src="{{asset('public/upload/banner_images/'.$banner->image)}}" alt></div>
         <div class="container">
             <div class="faq__content">
                 <div class="row">
                        <div class="col-12 col-lg-4">
                            <div class="faq__category">
                                <ul class="nav nav-tabs">
                                    @foreach($faq_categories as $key => $category)
                                    <li><a class="{{($key=='0')?'active':''}}" data-toggle="tab" href="#order{{$category->faq_category_id}}">{{@$category['faq_category']['name']}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                     <div class="col-12 col-lg-8">
                         <div class="tab-content">
                             @foreach($faq_categories as $key => $category)
                             @php
                                $faqs = App\Models\Faq::where('faq_category_id',$category->faq_category_id)->get();
                             @endphp
                             <div class="tab-pane fade {{($key=='0')?'active':''}} show" id="order{{$category->faq_category_id}}">
                                 <div class="row">
                                    @foreach($faqs as $faq)
                                     <div class="col-12 col-lg-6">
                                         <div class="faq__item">
                                             <h5 class="faq__question">{{$faq->question}}</h5>
                                             <p class="faq__answer">{{$faq->answer}} </p>
                                         </div>
                                     </div>
                                    @endforeach
                                 </div>
                             </div>
                             @endforeach
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
 </main>
@endsection