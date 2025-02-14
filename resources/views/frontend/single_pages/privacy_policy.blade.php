@extends('frontend.layouts.master')
@section('content')
<main class="no-main">
   {{--  <div class="ps-breadcrumb">
         <div class="container">
             <ul class="ps-breadcrumb__list">
                 <li class="active"><a href="{{url('')}}">Home</a></li>
                 <li><a href="javascript:void(0);">Privacy Policy</a></li>
             </ul>
         </div>
     </div>
     --}} 
     <section class="section--about ps-page--business">
         <div class="banner--block"><img class="banner-img" src="{{asset('public/upload/banner_images/'.$banner->image)}}" alt></div>
         <div class="container">
             <div class="about__farmart">
                 <d style="text-align: justify;"><?php echo @$privacy->description; ?></d>
             </div>
         </div>
     </section>
 </main>
@endsection