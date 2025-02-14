<footer class="ps-footer">
    <div class="container">
        <div class="ps-footer--contact">
            <div class="row">

                <div class="col-12 col-lg-4">
                    <p class="contact__title">Contact</p>
                    <p>
                        <i class="fa fa-map-marker fa" aria-hidden="true" style="color: green;"></i>


                       {{@$contact->address}}
                    </p>
                    <p>
                       {{-- <i class="fa fa-envelope fa" aria-hidden="true" style="color: green;"></i>                         <br>
                       --}}
                         {{@$contact->email}},
                         bzmghs.alumni40@gmail.com     
                        
                    </p>
                    <p>
                        {{-- <i class="fa fa-phone" aria-hidden="true" style="color: green;"></i>
                        <br>
                        --}}
                      <b> {!! @$contact->mobile_no !!} </b>
                    </p>

                </div>

                <div class="col-12 col-lg-2">

                </div>

                <div class="col-12 col-lg-2">
                    <p class="contact__title">Help & Info<span class="footer-toggle"><i class="icon-chevron-down"></i></span></p>
                    <ul class="footer-list">
                        <li><a href="{{route('about.us')}}">About Us</a></li>
                        <li><a href="{{route('contact.us')}}">Contact</a></li>
                        <li><a href="{{route('frontend.terms-condition')}}">Terms & Condition</a></li>
                        <li><a href="{{route('frontend.privacy-policy')}}">Privacy Policy</a></li>
                        <li><a href="{{route('frontend.help-faq')}}">Refund & FAQ</a></li>
                    </ul>
                    <hr>
                </div>

                <div class="col-12 col-lg-4">

                    <img src="{{asset('public/frontend/img/ssl.png')}}" class="mt-60 rounded"/>

                </div>


                {{-- <div class="col-12 col-lg-3">
                    <a href="{{url('/')}}"><img src="{{url('public/upload/logo_images/'.@$logo->image)}}" class="mt-40 rounded"></a>
                </div> --}}


            </div>
        </div>

        <div class="row ps-footer__copyright">
            <div class="col-12 col-lg-12 ps-footer__text ps-footer-mobile text-center">স্বত্ব © ২০২৩ বিশ্ব জাকের মঞ্জিল সরকারি উচ্চ বিদ্যালয় অ্যালামনাই</div>
        </div>
    </div>
</footer>
<div class="ps-footer-mobile">
   <div class="menu__content">
       <ul class="menu--footer">
           <li class="nav-item"><a class="nav-link" href="{{url('/')}}"><span>স্বত্ব © ২০২৩ বিশ্ব জাকের মঞ্জিল সরকারি উচ্চ বিদ্যালয় অ্যালামনাই</span></a></li>
       </ul>
   </div>
</div>
<button class="btn scroll-top"><i class="icon-chevron-up"></i></button>
<div class="ps-preloader" id="preloader">
    <div class="ps-preloader-section ps-preloader-left"></div>
    <div class="ps-preloader-section ps-preloader-right"></div>
</div>

{{-- Mobile Menu --}}
{{--
<div class="ps-category--mobile">
    <div class="category__header">
        <div class="category__title">All Categories</div><span class="category__close"><i class="icon-cross"></i></span>
    </div>
    <div class="category__content">
        <ul class="menu--mobile">
            <li class="daily-deals category-item"><a href="{{route('all.popular.list')}}">Popular</a></li>
            @foreach($categories as $cat)
            @php
               $sub_categories = App\Models\Product::select('sub_category_id')->groupBy('sub_category_id')->where('category_id',$cat->category_id)->get();
            @endphp
            <li class="menu-item-has-children category-item"><a href="{{route('category.wise.product',$cat->category_id)}}">{{@$cat['category']['name']}}</a><span class="sub-toggle"><i class="icon-chevron-down"></i></span>
                <ul class="sub-menu">
                   @foreach($sub_categories as $sub_cat)
                   @php
                       $sub_prodd_count = App\Models\Product::where('sub_category_id',$sub_cat->sub_category_id)->count();
                   @endphp
                    <li><a href="{{route('sub.category.wise.product',$sub_cat->sub_category_id)}}">{{@$sub_cat['sub_category']['name']}} ({{@$sub_prodd_count}} items)</a></li>
                   @endforeach
                </ul>
            </li>
            @endforeach
            <li class="#"><a href="{{route('all.sales.list')}}">Sales</a></li>
        </ul>
    </div>
</div>
--}}
<nav class="navigation--mobile">
    
    <div class="navigation__header">
        <div class="navigation-title">
            <button class="close-navbar-slide"><i class="icon-arrow-left"></i></button>
            <img src="{{url('public/upload/logo_images/'.@$logo->image)}}" style="border-radius:10%;width:80px;"></a>
            {{--
            <div>
               @if(@Auth::user()->id !=NULL && @Auth::user()->usertype=='customer')
               <span> <i class="icon-user"></i>Hi, </span><span class="account">{{Auth::user()->last_name}}</span><a class="dropdown-user" href="#" id="dropdownAccount" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-chevron-down"></i></a>
                <div class="dropdown-menu" aria-labelledby="dropdownAccount">
                   <a class="dropdown-item" href="#"><b>My Account</b></a>
                   <a class="dropdown-item" href="{{route('dashboard')}}">My Profile</a>
                   <a class="dropdown-item" href="{{route('customer.shopping_type')}}">Shopping Type</a><a class="dropdown-item" href="{{route('customer.passowrd.change')}}">Password Change</a>
                   <a class="dropdown-item" href="{{route('customer.order.list')}}">Order List</a>
                   <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="icon-exit-left"></i>Log out</a>
                   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                       @csrf
                   </form>
                </div>
               @else
               <a href="{{route('customer.login')}}"><span> <i class="icon-user"></i> Login</a>
               @endif
            </div>
            --}}
            
        </div>
    </div>
    
    <div class="navigation__content">
       <!-- Mobile Full Category Start -->
        <ul class="menu--mobile">
           <li class="menu-item-has-children"><a href="{{url('/')}}">Home</a></li>
           <li class="daily-deals"><a href="{{route('about.us')}}">About Us </a></li>
         {{--  <li class="menu-item-has-children"><a href="">Membership Login </a></li>  --}}
        
        {{--   <li class="menu-item-has-children"><a href=''>Membership Payment</a><span class="sub-toggle"><i class="icon-chevron-down"></i></span>
                <ul class="sub-menu">
                 <li><a href="">Monthly Membership Payment</a></li>
                 <li><a href="">Yearly Membership Payment</a></li>
                </ul>
            </li>
            
            --}}
            <li class="menu-item-has-children"><a href="{{route('batch')}}">SSC Batch </a></li>
            <li class="menu-item-has-children"><a href="{{route('customer.signup')}}">Registration </a></li>
            <li class="menu-item-has-children"><a href="{{route('contact.us')}}">Contact Us </a></li>
        </ul>
       <!-- Mobile Full Category End -->
    </div>

    <div class="navigation__footer">
        <ul class="menu--icon">
            <li class="footer-item"><a class="footer-link" href="#"><i class="icon-telephone"></i><span>HOTLINE: <span class='text-success'>+88 01817097074</a></li>
        </ul>
    </div>

</nav>
