<div class="section-slide--default">
   <div class="owl-carousel" data-owl-auto="false" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
       @foreach($sliders as $key => $slider)
       <div class="ps-banner"><img class="mobile-only" src="{{url('public/upload/slider_images/'.$slider->image)}}" alt="alt" /><img class="desktop-only" src="{{url('public/upload/slider_images/'.$slider->image)}}" alt="alt" />
           <div class="ps-content">
               <div class="container">
                   <div class="ps-content-box">
                       <div class="ps-title">{{$slider->short_title}}</div>
                       <div class="ps-subtitle">{{$slider->long_title}}</div>
                       {{-- <div class="ps-shopnow"> <a href="{{$slider->link}}">{{$slider->button_text}}<i class="icon-chevron-right"></i></a></div> --}}
                   </div>
               </div>
           </div>
       </div>
       @endforeach
   </div>

   {{-- <div class="section-slide__footer">
       <div class="container">
           <div class="row m-0">
                @foreach($promotions as $promotion)
                <div class="col-4">
                   <a href="{{$promotion->link}}">
                       <p><b>{{$promotion->title}}</b></p>
                   </a>
                </div>
                @endforeach
           </div>
       </div>
   </div> --}}


</div>


<div class="ps-promotion--default">
    <div class="container">
        <div class="row m-0">

{{--
            @foreach($offers as $offer)
            <div class="col-6 col-lg-3"><a title="{{$offer->title}}" href="{{$offer->link}}"><img src="{{url('public/upload/offer_images/'.$offer->image)}}" alt="alt" /></a></div>
            @endforeach --}}


            <div class="col-12 col-lg-6 col-md-6"><img src="{{asset('public/frontend')}}/img/loginform.jpeg" class="rounded" alt="school" /></div>
             <div class="col-12 col-lg-6 col-md-6">
                 <img src="{{asset('public/frontend')}}/img/loginpage.jpg" class="rounded" alt="school" />
            </div>
             
            

{{--
            <div class="col-12 col-lg-6 section--login">
                <div class="login__box"
                 style="background-color: #f7f7f7; margin: 0px auto 60px;padding: 20px;max-width: 555px;">
                    <div class="login__header">
                        <h3 class="login__login">LOGIN</h3>
                    </div>
                    <form method="POST" action="#">
                        @csrf
                        <div class="login__content">
                            <div class="login__label">
                                @if($errors->any())
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    @foreach($errors->all() as $error)
                                    <strong>{{$error}}</strong><br/>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                            <div class="input-group">
                                <input class="form-control" type="text" name="username" placeholder="Username" style="font-size:17px">
                            </div>
                            <div class="input-group group-password">
                                <input class="form-control" type="password" name="password" placeholder="Password" style="font-size:17px">
                                <div class="input-group-append">
                                    <button class="btn forgot-pass" type="button"><a href="{{route('reset.password')}}">Forgot?</a></button>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-login" type="submit">Login</button>
                            <p><a href="https://connectbzmghs.com/registration" class="text-center text-danger" style="font-weight:bold; font-size:16px;">
                                
                                পুনর্মিলনীর নিবন্ধন করতে এখানে ক্লিক করুন

                            </a></p>
                            <br><br>
                          
                        </div>
                    </form>
                </div>
            </div>

--}}


            <div class="col-12 col-lg-12 pt-20">
                <a href="{{route('customer.signup')}}">
                <img src="{{asset('public/frontend')}}/img/registrationpage.jpg" class="rounded" alt="school" style="height:70px;" />
                </a>
                <br>
                {!! @$about->description; !!}

            </div>



        </div>
    </div>
</div>
