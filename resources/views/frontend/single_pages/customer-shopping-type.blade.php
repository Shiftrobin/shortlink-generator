@extends('frontend.layouts.master')
@section('content')

<!-- <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
<main class="no-main">
     <div class="ps-breadcrumb">
         <div class="container">
             <ul class="ps-breadcrumb__list">
                 <li class="active"><a href="{{url('')}}">Home</a></li>
                 <li><a href="javascript:void(0);">Shopping Type</a></li>
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
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{route('customer.shopping_type.store')}}" id="checkoutForm">
                                @csrf
                                <div class="form-row">
                                    <div class="col-md-12 form-group--block">
                                        <label for="current_password">Shopping Type <span style="color:red;font-weight: bold;">*</span></label>
                                        <select name="sale_type_id" class="sale_type_id form-control" style="font-size:17px">
                                            <option value="">Select Type</option>
                                            @foreach($sale_types as $type)
                                            <option value="{{$type->id}}">{{$type->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <font style="color:red;font-weight:bold;">{{($errors->has('sale_type_id'))?($errors->first('sale_type_id')):''}}</font>
                                </div>
                                <div class="form-row collection_type" style="display:none;">
                                    <div class="col-md-12 form-group--block">
                                        <label for="new_password">Collection Date <span style="color:red;font-weight: bold;">*</span></label>
                                        <input type="text" name="date" id="txtdate" class="form-control txtdate" autocomplete="off" placeholder="DD/MM/YYYY">

                                        <script type="text/javascript">
                                            var current    = new Date();
                                            var previous   = [];
                                            for(var i=1; i<40000; i++){
                                                var pdate = new Date().setDate(new Date().getDate()- i)
                                                if(i > 5 ){
                                                    var fdate = new Date().setDate(new Date().getDate()+ i)
                                                    previous.push(new Date(fdate));
                                                }
                                                previous.push(new Date(pdate));
                                            }
                                            
                                            var minDate    = 0
                                            $('#txtdate').datepicker({
                                                format                : 'dd-mm-yyyy',
                                                daysOfWeekHighlighted : [0],
                                                daysOfWeekDisabled    : [0],
                                                todayHighlight        : true,
                                                datesDisabled         : previous
                                            });
                                        </script>
                                    </div>
                                    <font style="color:red;font-weight:bold;">{{($errors->has('date'))?($errors->first('date')):''}}</font>
                                    <div class="col-md-12 form-group--block">
                                        <label for="new_password">Collection Time <span style="color:red;font-weight: bold;">*</span></label>
                                        <select name="collection_time_id" id="collection_time_id" class="form-control" style="font-size:17px;">
                                            <option value="">Select Time</option>
                                        </select>
                                    </div>
                                    <font style="color:red;font-weight:bold;">{{($errors->has('collection_time_id'))?($errors->first('collection_time_id')):''}}</font>
                                </div>
                                <div class="form-row delivery_type" style="display:none">
                                    <div class="col-md-12 form-group--block">
                                        <label for="new_password">Delivery Date <span style="color:red;font-weight: bold;">*</span></label>
                                        <input type="text" name="dalivery_date" value="Delivery date is tomorrow" class="form-control" readonly>
                                    </div>
                                    <div class="col-md-12 form-group--block">
                                        <label for="new_password">Delivery Time <span style="color:red;font-weight: bold;">*</span></label>
                                        <input type="text" name="dalivery_time" value="Delivery time is tomorrow 12:00 pm" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 form-group--block" style="padding-top:15px;">
                                        <button type="submit" class="custom_btn" style="border:1px solid;">Continue Shopping</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
         </div>
     </section>
 </main>

<script type="text/javascript">
    $(document).ready(function(){
        //Paid amount
        $(document).on('change','.sale_type_id',function(){
            var sale_type_id = $(this).val();
            if(sale_type_id == '1'){
                $('.collection_type').show();
            }else{
                $('.collection_type').hide();
            }

            if(sale_type_id == '2'){
                $('.delivery_type').show();
            }else{
                $('.delivery_type').hide();
            }
        });
    });
</script>

<script type="text/javascript">
    $(function(){
      $(document).on('change','.txtdate',function(){
        var sale_type_id = $('.sale_type_id').val();
        var date = $('.txtdate').val();
        $.ajax({
          type:"GET",
          url :"{{route('get-collection-time-as-per.shopping_type')}}",
          data:{sale_type_id:sale_type_id,date:date},
          success:function(data){
            var html = '<option value="">Select Collection Time</option>';
            $.each(data,function(key,v){
              html += '<option value="'+v.id+'">'+v.name+'</option>';
            });
            $('#collection_time_id').html(html);
          }
        });
      });
    });
  </script>

 <script type="text/javascript">
    $(document).ready(function () {
        $('#checkoutForm').validate({
            rules: {
                sale_type_id: {
                    required: true,
                }
            },
            messages: {
                sale_type_id : {
                    required : 'Please select sale type',
                }
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