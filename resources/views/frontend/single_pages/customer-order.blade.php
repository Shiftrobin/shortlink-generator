@extends('frontend.layouts.master')
@section('content')

<main class="no-main">
     <div class="ps-breadcrumb">
         <div class="container">
             <ul class="ps-breadcrumb__list">
                 <li class="active"><a href="{{url('')}}">Home</a></li>
                 <li><a href="javascript:void(0);">Orders</a></li>
             </ul>
         </div>
     </div>
     <section class="section--about ps-page--business">
         <div class="container">
              <div class="row">
                <div style="margin-top:30px;"  class="col-sm-3">
                   <ul class="prof">
                        <li class="{{(@$customer_account_title=='profile_title')?'active_account':''}}"><a href="{{route('dashboard')}}">My Profile</a></li>
                        <li class="{{(@$customer_account_title=='shopping_type_title')?'active_account':''}}"><a href="{{route('customer.shopping_type')}}">Shopping Type</a></li>
                        <li class="{{(@$customer_account_title=='password_change_title')?'active_account':''}}"><a href="{{route('customer.passowrd.change')}}">Password Change</a></li>
                        <li class="{{(@$customer_account_title=='order_list_title')?'active_account':''}}"><a href="{{route('customer.order.list')}}">Order List</a></li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-9">
                    <section class="section--wishlist">
                        <div class="container">
                            <div class="wishlist__content">
                                <div class="wishlist__product">
                                    <div class="wishlist__product--mobile">
                                        <div class="row m-0">
                                            @foreach($orders as $order)
                                            <div class="col-6 col-md-4 p-0">
                                                <div class="ps-product--standard" style="height: 250px !important;">
                                                    <div class="ps-product__content">
                                                        <p class="ps-product__instock">Order No #:</p><a href="#">
                                                            <h5 class="ps-product__name">{{$order->order_no}}</h5>
                                                        </a>
                                                        <p class="ps-product__meta"><span class="ps-product__price">Total: £ {{$order->order_total}}</span></p>
                                                        <p class="ps-product__unit"><strong>Payment Type:</strong> 
                                                            {{$order['payment']['payment_method']}}
                                                        </p>
                                                        <p class="ps-product__unit"><strong>Status: </strong>
                                                            @if($order->status=='0')
                                                            Unapproved
                                                            @elseif($order->status=='1')
                                                            Approved
                                                            @elseif($order->status=='2')
                                                            Refunded
                                                            @endif
                                                        </p><br>
                                                        <p class="ps-product__unit">
                                                            <a title="Details" href="{{route('customer.order.details',$order->order_no)}}" class="btn btn-primary" style="background-color: #FF7200;color: #fff;"><i class="fa fa-eye" style="background-color: #FF7200;color: #fff;"></i></a>
                                                            <a title="Print" target="_blank" href="{{route('customer.order.print',$order->order_no)}}" class="btn btn-info" style="background-color: #AA2200;color: #fff;"><i class="fa fa-print" style="background-color: #AA2200;color: #fff;"></i></a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="wishlist__product--desktop">
                                        <table class="table">
                                            <thead class="wishlist__thead">
                                                <tr>
                                                    <th scope="col">Order No</th>
                                                    <th scope="col">Total Amount</th>
                                                    <th scope="col">Payment Type</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody class="wishlist__tbody">
                                                @foreach($orders as $order)
                                                <tr>
                                                    <td># {{$order->order_no}}</td>
                                                    <td><span class="ps-product__price">£ {{$order->order_total}}</span>
                                                    </td>
                                                    <td>
                                                        <div class="ps-product--vertical">
                                                            <div class="ps-product__content">
                                                                <h5>
                                                                    <a class="ps-product__name" href="#">
                                                                        {{$order['payment']['payment_method']}}
                                                                    </a>
                                                                </h5>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="ps-product__instock">
                                                            @if($order->status=='0')
                                                            <span style="background: #DD4F42;padding: 5px;color: #fff">Unapproved</span>
                                                            @elseif($order->status=='1')
                                                            <span style="background: #1BA160;padding: 5px;color: #fff">Approved</span>
                                                            @elseif($order->status=='2')
                                                            <span style="background: #FEA900;padding: 5px;color: #fff">Refunded</span>
                                                            @endif
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <a title="Details" href="{{route('customer.order.details',$order->order_no)}}" class="btn btn-primary" style="background-color: #FF7200;color: #fff;"><i class="fa fa-eye" style="background-color: #FF7200;color: #fff;"></i></a>
                                                        <a title="Print" target="_blank" href="{{route('customer.order.print',$order->order_no)}}" class="btn btn-info" style="background-color: #AA2200;color: #fff;"><i class="fa fa-print" style="background-color: #AA2200;color: #fff;"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
         </div>
     </section>
 </main>
@endsection