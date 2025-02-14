@extends('frontend.layouts.master')
@section('content')

<main class="no-main">
     <div class="ps-breadcrumb">
         <div class="container">
             <ul class="ps-breadcrumb__list">
                 <li class="active"><a href="{{url('')}}">Home</a></li>
                 <li><a href="javascript:void(0);">Edit Profile</a></li>
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
                <div style="margin-top:30px;" class="col-sm-9">
                    <table class="table table-bordered" width="100%">
                        <tr>
                            <td width="30%">
                                <img src="{{url('public/upload/logo_images/'.$logo->image)}}" alt="IMG-LOGO">
                            </td>
                            <td colspan="6" width="70%">
                                <strong>Order no: # {{$order->order_no}}</strong> <br>
                                <strong>Shopping Type: {{@$order['shipping']['shopping_type']['name']}}</strong> <br>
                                @if(@$order['shipping']['sale_type_id']=="1")
                                <strong>Collection Date: {{date('d-m-Y',strtotime(@$order['shipping']['date']))}}</strong> <br>
                                <strong>Collection Time: {{@$order['shipping']['collection_time']['name']}}</strong> <br>
                                @elseif(@$order['shipping']['sale_type_id']=="2")
                                <strong>Delivery Date: {{@$order['shipping']['dalivery_date']}}</strong> <br>
                                <strong>Delivery Time: {{@$order['shipping']['dalivery_time']}}</strong> <br>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Billing Info:</strong></td>
                            <td colspan="6" style="text-align: left;">
                                <strong>Name :</strong> {{@$order['customer']['first_name']}} {{@$order['customer']['last_name']}} <br>
                                <strong>Country :</strong> {{@$order['customer']['country']}} <br/>
                                <strong>Post Code :</strong> {{@$order['customer']['post_code']}} <br/>
                                <strong>House No :</strong> {{@$order['customer']['house_no']}} <br/>
                                <strong>Address :</strong> {{@$order['customer']['address']}} <br/>
                                <strong>Mobile :</strong> {{@$order['customer']['mobile']}} <br/>
                                <strong>Landline :</strong> {{@$order['customer']['landline']}} <br/>
                                <strong>Email :</strong> {{@$order['customer']['email']}} <br/>
                                <strong>Payment By:</strong> {{$order['payment']['payment_method']}}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="7"><strong>Order Details</strong></td>
                        </tr>
                        <tr>
                            <td><strong>Image</strong></td>
                            <td><strong>Product</strong></td>
                            <td><strong>Price</strong></td>
                            <td><strong>VAT</strong></td>
                            <td><strong>Qty</strong></td>
                            <td><strong>T VAT</strong></td>
                            <td><strong>Total</strong></td>
                        </tr>
                        @php
                            $grand_sub_total = 0;
                        @endphp
                        @foreach($order['order_details'] as $details)
                        @php
                            $subtotal = $details->quantity*$details->price;
                            $total_vat = $details->vat/100*$subtotal;
                        @endphp
                        <tr>
                            <td>
                                <img src="{{url('public/upload/product_images/'.$details['product']['image'])}}" style="width: 50px;">
                            </td>
                            <td>{{$details['product']['name']}}</td>
                            <td>£ {{$details->price}}</td>
                            <td>{{$details->vat}}%</td>
                            <td>{{$details->quantity}}</td>
                            <td>£ {{$total_vat}}</td>
                            <td>£ {{$subtotal}}</td>
                        </tr>
                        @php
                            $grand_sub_total += $subtotal;
                        @endphp
                        @endforeach
                        <tr>
                            <td colspan="6" style="text-align: right;"><strong>Sub Total</strong></td>
                            <td><strong>£  {{$grand_sub_total}}</strong></td>
                        </tr>
                        <tr>
                            <td colspan="6" style="text-align: right;"><strong>VAT</strong></td>
                            <td><strong>£  {{$order->order_vat}}</strong></td>
                        </tr>
                        <tr>
                            <td colspan="6" style="text-align: right;"><strong>SHIPPING CHARGE</strong></td>
                            <td><strong>FREE</strong></td>
                        </tr>
                        <tr>
                            <td colspan="6" style="text-align: right;"><strong>Total</strong></td>
                            <td><strong>£  {{$order->order_total}}</strong></td>
                        </tr>
                    </table>
                </div>
            </div>
         </div>
     </section>
 </main>
@endsection