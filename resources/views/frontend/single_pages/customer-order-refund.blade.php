@extends('frontend.layouts.master')
@section('content')
<style type="text/css">
    .prof li{
        background: #FF7200;
        padding: 7px;
        margin: 3px;
        border-radius: 15px;
        list-style-type: none;
    }
    .prof li a{
        color: #fff;
        padding-left: 15px;
    }
    .custom_btn{
        background: #FF7200;
        padding: 5px;
        margin: 3px;
        border-radius: 5px;
        color: #fff;
        border: 1px solid #FF7200;
    }
</style>

<main class="no-main">
     <div class="ps-breadcrumb">
         <div class="container">
             <ul class="ps-breadcrumb__list">
                 <li class="active"><a href="{{url('')}}">Home</a></li>
                 <li><a href="javascript:void(0);">Order Refund</a></li>
             </ul>
         </div>
     </div>
     <section class="section--about ps-page--business">
         <div class="container">
              <div class="row">
                <div style="margin-top:30px;"  class="col-sm-3">
                   <ul class="prof">
                        <li><a href="{{route('dashboard')}}">My Profile</a></li>
                        <li><a href="{{route('customer.passowrd.change')}}">Account Settings</a></li>
                        <li><a href="{{route('customer.order.list')}}">My Orders</a></li>
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
                    <form method="post" action="{{route('customer.order.refund.store',$order->id)}}" id="customerSignupForm">
                        @csrf
                        <div class="form-row" style="margin-bottom:10px;">
                            <div class="col-md-12 form-group--block">
                                <label>Refund Cause</label>
                                <textarea name="message" class="form-control" rows="7" placeholder="Write your message" required="">{{$order->message}}</textarea>
                                <font color="red">{{($errors->has('message'))?($errors->first('message')):''}}</font>
                            </div>
                            @if($order->status=='2')
                            <div class="col-md-12" style="padding:10px 0px;">
                                <span style="margin-left: 17px;">Status :</span> <span style="background: #FEA900;padding: 5px;color: #fff">Refunded</span>
                            </div>
                            @endif
                        </div>
                        @if($order->status!='2')
                        <div class="row">
                            <div class="col-md-4">
                                <button type="submit" class="custom_btn">Submit</button>
                            </div>
                        </div>
                        @endif
                    </form>
                </div>
            </div>
         </div>
     </section>
 </main>

 <script type="text/javascript">
    $(document).ready(function () {
        $('#customerSignupForm').validate({
            rules: {
                message: {
                    required: true,
                }
            },
            messages: {
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
  </script>
@endsection