@extends('frontend.layouts.master')
@section('content')
<main class="no-main">
     <div class="ps-breadcrumb">
         <div class="container">
             <ul class="ps-breadcrumb__list">
                 <li class="active"><a href="{{url('')}}">Home</a></li>
                 <li><a href="javascript:void(0);">Servies</a></li>
             </ul>
         </div>
     </div>
     <section class="section--blogList ps-page--business">
        <div class="banner--block"><img class="banner-img" src="{{asset('public/upload/banner_images/'.$banner->image)}}" alt></div>
        <div class="container">
            <div class="blog__content">
                <div class="blog__post">
                    @if($service['0']->count()>="1")
                    <div class="row post__item">
                        <div class="col-12 col-lg-6"><img src="{{asset('public/upload/service_images/'.$service['0']->image)}}" alt="alt" /></div>
                        <div class="col-12 col-lg-6">
                            <div class="post__content">
                                <a class="post__title" href="#">{{$service['0']->title}}</a>
                                <d style="text-align: justify;"><?php echo $service['0']->description; ?></d>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if($service['0']->count()>="2")
                    <div class="row post__item">
                        <div class="col-12 col-lg-6">
                            <div class="post__content">
                                <a class="post__title" href="#">{{$service['1']->title}}</a>
                                <d style="text-align: justify;"><?php echo $service['1']->description; ?></d>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6"><img src="{{asset('public/upload/service_images/'.$service['1']->image)}}" alt="alt" /></div>
                    </div>
                    @endif
                    @if($service['0']->count()>="3")
                    <div class="row post__item">
                        <div class="col-12 col-lg-6"><img src="{{asset('public/upload/service_images/'.$service['2']->image)}}" alt="alt" /></div>
                        <div class="col-12 col-lg-6">
                            <div class="post__content">
                                <a class="post__title" href="#">{{$service['2']->title}}</a>
                                <d style="text-align: justify;"><?php echo $service['2']->description; ?></d>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if($service['0']->count()>="4")
                    <div class="row post__item">
                        <div class="col-12 col-lg-6">
                            <div class="post__content">
                                <a class="post__title" href="#">{{$service['3']->title}}</a>
                                <d style="text-align: justify;"><?php echo $service['3']->description; ?></d>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6"><img src="{{asset('public/upload/service_images/'.$service['3']->image)}}" alt="alt" /></div>
                    </div>
                    @endif
                    @if($service['0']->count()>="5")
                    <div class="row post__item">
                        <div class="col-12 col-lg-6"><img src="{{asset('public/upload/service_images/'.$service['4']->image)}}" alt="alt" /></div>
                        <div class="col-12 col-lg-6">
                            <div class="post__content">
                                <a class="post__title" href="#">{{$service['4']->title}}</a>
                                <d style="text-align: justify;"><?php echo $service['4']->description; ?></d>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if($service['0']->count()>="6")
                    <div class="row post__item">
                        <div class="col-12 col-lg-6">
                            <div class="post__content">
                                <a class="post__title" href="#">{{$service['5']->title}}</a>
                                <d style="text-align: justify;"><?php echo $service['5']->description; ?></d>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6"><img src="{{asset('public/upload/service_images/'.$service['5']->image)}}" alt="alt" /></div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
 </main>
@endsection