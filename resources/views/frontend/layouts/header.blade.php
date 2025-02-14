
<header class="header">
    <nav class="ps-header--center header-desktop ps-header--business">
        <div class="header-inner">
            <div class="header-inner__left"><a class="logo pt-3 pb-4" href="{{url('/')}}"><img src="{{url('public/upload/logo_images/'.@$logo->image)}}"></a></div>
            <div class="header-inner__center">
                <div class="ps-business--nav">
                    <ul class="menu">
                        <li class="menu-item-has-children has-mega-menu active"><a class="nav-link" href="{{url('/')}}">Home</a></li>

                        {{-- <li class="menu-item-has-children has-mega-menu"><a class="nav-link" href="{{route('about.us')}}">About Club</a><span class="sub-toggle"><i class="icon-chevron-down"></i></span>
                            <div class="mega-menu">
                                <div class="mega-menu__column">
                                    <ul class="sub-menu--mega">
                                        <li><a href="{{route('about.us')}}">Mission & Vision</a></li>
                                        <li><a href="">Constitution</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li> --}}

                        <li class="menu-item-has-children has-mega-menu"><a class="nav-link" href="{{route('about.us')}}">About Us</a></li>
                        <li class="menu-item-has-children has-mega-menu"><a class="nav-link" href="{{route('batch')}}">SSC Batch</a></li>

                        {{-- <li class="menu-item-has-children has-mega-menu"><a class="nav-link" href="">Gallery</a></li> --}}

                        {{-- <li class="menu-item-has-children has-mega-menu"><a class="nav-link" href="">Gallery</a><span class="sub-toggle"><i class="icon-chevron-down"></i></span>
                            <div class="mega-menu">
                                <div class="mega-menu__column">
                                    <ul class="sub-menu--mega">
                                        <li><a href="">Photo</a></li>
                                        <li><a href="">Video</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li> --}}


                        {{-- @if(@Auth::user()->id !=NULL && @Auth::user()->usertype=='customer')
                        <li class="menu-item-has-children has-mega-menu"> <a class="nav-link account-logout" style="background: red;padding:6px;color:white;border-radius:8px;" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> Logout</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @else
                        <li class="menu-item-has-children has-mega-menu"><a class="nav-link" href="{{route('customer.signup')}}">Registration</a><span class="sub-toggle"><i class="icon-chevron-down"></i></span>
                            <div class="mega-menu">
                                <div class="mega-menu__column">
                                    <ul class="sub-menu--mega">
                                        <li><a href="{{route('customer.signup')}}">Registration</a></li>
                                        <li><a href="{{route('customer.login')}}">Login</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        @endif --}}

                        <li class="menu-item-has-children has-mega-menu"><a class="nav-link text-danger" href="{{route('customer.signup')}}">Registration</a></li>


                        {{-- <li class="menu-item-has-children has-mega-menu"><a class="nav-link" href="#">Payment</a><span class="sub-toggle"><i class="icon-chevron-down"></i></span>
                            <div class="mega-menu">
                                <div class="mega-menu__column">
                                    <ul class="sub-menu--mega">
                                        <li><a href="{{route('customer.login')}}">Monthly Membership Payment</a></li>
                                        <li><a href="{{route('customer.login')}}">Yearly Membership Payment </a></li>
                                    </ul>
                                </div>
                            </div>
                        </li> --}}

                        <li class="menu-item-has-children has-mega-menu"><a class="nav-link" href="{{route('contact.us')}}">Contact </a></li>

                      {{-- <li class="menu-item-has-children has-mega-menu"><a class="icon_social facebook" href="{{@$contact->facebook}}" target="_blank"><i class="fa fa-facebook-f" style="color: white;"></i></a></li> --}}
                    </ul>
                </div>
            </div>
            <div class="header-inner__right">
                <div class="ps-header--contact">
                    <div class="ps-header__icon"><a class="icon_social facebook" href="{{@$contact->facebook}}" target="_blank"><i class="fa fa-facebook-f" style="color: white; font-size:15px;"></i></a> &nbsp;&nbsp;</div>
                    <div class="ps-header__icon"><i class="icon-bubbles"></i></div>
                    <div class="ps-header__content">
                        <div class="ps-header__text">HOTLINE </div>
                        <div class="ps-header__phone">+88 01817097074</div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="ps-header--center header--mobile">
        <div class="container">
            <div class="header-inner">
                <div class="header-inner__left">
                    <button class="navbar-toggler"><i class="icon-menu"></i></button>
                </div>
                <div class="header-inner__center"><a class="logo open text-black"href="{{url('/')}}"><img src="{{url('public/upload/logo_images/'.@$logo->image)}}"></a></div>

                {{-- <div class="header-inner__right">
                    <button class="button-icon icon-sm search-mobile"><i class="icon-magnifier"></i></button>
                </div> --}}

            </div>
        </div>
    </div>


</header>
