<footer class="ps-footer">
     <div class="container">
         <div class="ps-footer--contact">
             <div class="row">
                 <div class="col-12 col-lg-4">
                     <p class="contact__title">Contact Us</p>
                     <p><b><i class="icon-telephone"> </i>Hotline: </b><span>(7:00 - 21:30)</span></p>
                     <p class="telephone">{{@$contact->mobile_no}}</p>
                     <p> <b>Address: </b>{{@$contact->address}}</p>
                     <p> <b>Email us: </b>{{@$contact->email}}</p>
                 </div>
                 <div class="col-12 col-lg-4">
                     <div class="row">
                         <div class="col-12 col-lg-6">
                             <p class="contact__title">Help & Info<span class="footer-toggle"><i class="icon-chevron-down"></i></span></p>
                             <ul class="footer-list">
                                 <li><a href="{{route('about.us')}}">About Us</a></li>
                                 <li><a href="{{route('contact.us')}}">Contact</a></li>
                                 <li><a href="{{route('frontend.terms-condition')}}">Terms & Condition</a></li>
                                 <li><a href="{{route('frontend.privacy-policy')}}">Privacy Policy</a></li>
                                 <li><a href="{{route('frontend.help-faq')}}">FAQs</a></li>
                             </ul>
                             <hr>
                         </div>
                         <div class="col-12 col-lg-6">
                             <p class="contact__title">Services<span class="footer-toggle"><i class="icon-chevron-down"></i></span></p>
                             <ul class="footer-list">
                                 <li><a href="{{url('')}}">Home</a></li>
                                 <li><a href="{{route('frontend.service')}}">Service</a></li>
                                 <li><a href="#">Create an account</a></li>
                             </ul>
                             <hr>
                         </div>
                     </div>
                 </div>
                 <div class="col-12 col-lg-4">
                     <p class="contact__title">Newsletter Subscription</p>
                     <p>Join our email subscription now to get updates on <b>promotions </b>and <b>coupons.</b></p>
                     <form method="POST" action="{{route('subscribe.store')}}" id="subscribeForm">
                        @csrf
                         <div class="input-group">
                             <div class="input-group-prepend"><i class="icon-envelope"></i></div>
                             <input class="form-control" type="email" name="email" placeholder="Enter your email...">
                             <div class="input-group-append">
                                 <button class="btn" type="submit">Subscribe</button>
                             </div>
                         </div>
                         <font style="color: red;font-weight: bold;">{{($errors->has('email'))?($errors->first('email')):''}}</font>
                     </form>
                 </div>
             </div>
         </div>
         <div class="ps-footer--service">
             <div class="row">
                 <div class="col-12 col-lg-4">
                    <div class="service__payment">
                        <img src="{{asset('public/frontend')}}/img/promotion/payment_paypal.jpg" alt="">
                        <img src="{{asset('public/frontend')}}/img/promotion/payment_visa.jpg" alt="">
                        <img src="{{asset('public/frontend')}}/img/promotion/payment_mastercart.jpg" alt="">
                        <img src="{{asset('public/frontend')}}/img/promotion/payment_electron.jpg" alt="">
                        <img src="{{asset('public/frontend')}}/img/promotion/payment_skrill.jpg" alt="">
                    </div>
                 </div>
                 <div class="col-12 col-lg-4">
                     <table class="table table-bordered">
                         <tr>
                             <td><a href="{{route('category.wise.product',@$menu_categories['0']->category_id)}}"><img src="{{url('public/upload/category_images/'.@$menu_categories['0']['category']['image'])}}" style="width:83px"></a></td>
                             <td><a href="{{route('category.wise.product',@$menu_categories['1']->category_id)}}"><img src="{{url('public/upload/category_images/'.@$menu_categories['1']['category']['image'])}}" style="width:83px"></a></td>
                             <td><a href="{{route('category.wise.product',@$menu_categories['2']->category_id)}}"><img src="{{url('public/upload/category_images/'.@$menu_categories['2']['category']['image'])}}" style="width:83px"></a></td>
                         </tr>
                         <tr>
                             <td><a href="{{route('category.wise.product',@$menu_categories['3']->category_id)}}"><img src="{{url('public/upload/category_images/'.@$menu_categories['3']['category']['image'])}}" style="width:83px"></a></td>
                             <td><a href="{{route('category.wise.product',@$menu_categories['4']->category_id)}}"><img src="{{url('public/upload/category_images/'.@$menu_categories['4']['category']['image'])}}" style="width:83px"></a></td>
                             <td><a href="{{route('category.wise.product',@$menu_categories['5']->category_id)}}"><img src="{{url('public/upload/category_images/'.@$menu_categories['5']['category']['image'])}}" style="width:83px"></a></td>
                         </tr>
                     </table>
                 </div>
                 <div class="col-12 col-lg-4">
                     <div class="service--block">
                         <p class="service__item"> <i class="icon-speed-fast"></i><span> <b>Fast Delivery </b>& Shipping</span></p>
                         <p class="service__item"> <i class="icon-color-sampler"></i><span>Top <b>Offers</b></span></p>
                         <p class="service__item"> <i class="icon-wallet"></i><span>Money <b>Cashback</b></span></p>
                         <p class="service__item"> <i class="icon-bubble-user"></i><span>Friendly <b>Support 24/7</b></span></p>
                     </div>
                 </div>
             </div>
         </div>
         <div class="row ps-footer__copyright">
             <div class="col-12 col-lg-6 ps-footer__text">&copy; 2020 BRR WholeSale. All Rights Reversed.</div>
             <div class="col-12 col-lg-6 ps-footer__social"> 
                <a class="icon_social facebook" href="{{@$contact->facebook}}" target="_blank"><i class="fa fa-facebook-f"></i></a>
                <a class="icon_social twitter" href="{{@$contact->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a>
                <a class="icon_social youtube" href="{{@$contact->linkedin}}" target="_blank"><i class="fa fa-linkedin-square"></i></a>
                <a class="icon_social twitter" href="{{@$contact->instagram}}" target="_blank"><i class="fa fa-instagram"></i></a>
            </div>
         </div>
     </div>
</footer>
 <div class="ps-footer-mobile">
     <div class="menu__content">
         <ul class="menu--footer">
             <li class="nav-item"><a class="nav-link" href="{{url('')}}"><i class="icon-home3"></i><span>Home</span></a></li>
             <li class="nav-item"><a class="nav-link footer-category" href="javascript:void(0);"><i class="icon-list"></i><span>Category</span></a></li>
             <li class="nav-item"><a class="nav-link footer-cart" href="{{route('shopping.cart')}}"><i class="icon-cart"></i><span class="badge bg-warning">{{Cart::count()}}</span><span>Cart</span></a></li>
             @if(@Auth::user()->id !=NULL && @Auth::user()->usertype=='customer')
             <li class="nav-item"><a class="nav-link" href="{{route('dashboard')}}"><i class="icon-user"></i><span>Account</span></a></li>
             @else
             <li class="nav-item"><a class="nav-link" href="{{route('customer.login')}}"><i class="icon-user"></i><span>Account</span></a></li>
             @endif
         </ul>
     </div>
 </div>
 <button class="btn scroll-top"><i class="icon-chevron-up"></i></button>
 <div class="ps-preloader" id="preloader">
     <div class="ps-preloader-section ps-preloader-left"></div>
     <div class="ps-preloader-section ps-preloader-right"></div>
 </div>
 <div class="ps-category--mobile">
     <div class="category__header">
         <div class="category__title">All Categories</div><span class="category__close"><i class="icon-cross"></i></span>
     </div>
     <div class="category__content">
         <ul class="menu--mobile">
             <li class="daily-deals category-item"><a href="{{route('all.popular.list')}}">Popular</a></li>
             @foreach($categories as $cat)
             @php
                $sub_categories = App\Model\Product::select('sub_category_id')->groupBy('sub_category_id')->where('category_id',$cat->category_id)->get();
             @endphp
             <li class="menu-item-has-children category-item"><a href="{{route('category.wise.product',$cat->category_id)}}">{{@$cat['category']['name']}}</a><span class="sub-toggle"><i class="icon-chevron-down"></i></span>
                 <ul class="sub-menu">
                    @foreach($sub_categories as $sub_cat)
                    @php
                        $sub_prodd_count = App\Model\Product::where('sub_category_id',$sub_cat->sub_category_id)->count();
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
 <nav class="navigation--mobile">
     <div class="navigation__header">
         <div class="navigation-title">
             <button class="close-navbar-slide"><i class="icon-arrow-left"></i></button>
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
         </div>
     </div>
     <div class="navigation__content">
        <!-- Mobile Full Category Start -->
         <ul class="menu--mobile">
             <li class="daily-deals"><a href="{{route('all.popular.list')}}">Popular</a></li>
         </ul>
         <ul class="menu--mobile">
            @foreach($categories as $cat)
            @php
                $sub_categories = App\Model\Product::select('sub_category_id')->groupBy('sub_category_id')->where('category_id',$cat->category_id)->get();
            @endphp
             <li class="menu-item-has-children"><a href="{{route('category.wise.product',$cat->category_id)}}">{{@$cat['category']['name']}}</a><span class="sub-toggle"><i class="icon-chevron-down"></i></span>
                 <ul class="sub-menu">
                    @foreach($sub_categories as $sub_cat)
                    @php
                        $sub_proddd_count = App\Model\Product::where('sub_category_id',$sub_cat->sub_category_id)->count();
                    @endphp
                     <li><a href="{{route('sub.category.wise.product',$sub_cat->sub_category_id)}}">{{@$sub_cat['sub_category']['name']}} ({{@$sub_proddd_count}} items)</a></li>
                    @endforeach 
                 </ul>
             </li>
            @endforeach
         </ul>
         <ul class="menu--mobile">
             <li class="daily-deals"><a href="{{route('all.sales.list')}}">Sales</a></li>
         </ul>
        <!-- Mobile Full Category End -->
     </div>
     <div class="navigation__footer">
         <ul class="menu--icon">
             <li class="footer-item"><a class="footer-link" href="#"><i class="icon-history2"></i><span>Recent viewed product</span></a></li>
             <li class="footer-item"><a class="footer-link" href="#"><i class="icon-cube"></i><span>Become a vendor</span></a></li>
             <li class="footer-item"><a class="footer-link" href="#"><i class="icon-question-circle"></i><span>Help & Contact</span></a></li>
             <li class="footer-item"><a class="footer-link" href="#"><i class="icon-telephone"></i><span>HOTLINE: <span class='text-success'>(+1) 970 978-6290</span> (Free)</span></a></li>
         </ul>
     </div>
 </nav>