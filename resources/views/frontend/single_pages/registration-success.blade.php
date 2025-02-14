@extends('frontend.layouts.master')
@section('content')
<main class="no-main">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="ps-breadcrumb__list">
                <li class="active"><a href="{{url('')}}">Home</a></li>
                <li><a href="javascript:void(0);">Registration Success</a></li>
            </ul>
        </div>
    </div>
    <section class="section--login">
        <div class="container">
            <div class="row">

                <div class="col-12 col-lg-12">
                    <div class="login__box">
                        <div class="login__header">
                            <h3 class="login__login text-danger" style="line-height:40px;">
                               পুনর্মিলনীর নিবন্ধনের জন্য ধন্যবাদ আপনার নিবন্ধনটি সম্পন্ন হয়েছে
                                এবং ইমেইল ও মোবাইলে মেসেজ পাঠানো হয়েছে |
                            </h3>
                            
                        </div>    
                        <div>
                            {{-- <p>
                                <a href="{{route('customer.login')}}" class="btn btn-lg btn-success">Login</a>
                            </p>
                                 --}}
                        </div>     
                                         
                    </div>
                </div>
                          
            </div>
        </div>
    </section>
</main>
@endsection
