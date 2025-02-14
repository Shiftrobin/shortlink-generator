@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Approved Order</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Order</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-md-12">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3>Order details info
                  @if($order->status == '0')
                  <a class="btn btn-success float-right btn-sm" href="{{route('orders.pending.list')}}"><i class="fa fa-list"></i> Pending Order List</a>
                  @elseif($order->status == '1')
                  <a class="btn btn-success float-right btn-sm" href="{{route('orders.approved.list')}}"><i class="fa fa-list"></i> Approved Order List</a>
                  @endif
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered" width="100%">
                    <tr>
                        <td><strong>Billing Info:</strong></td>
                        <td colspan="6" style="text-align: left;">
                            <strong>Order no :</strong> # {{$order->order_no}} <br/>
                            <strong>Shopping Type :</strong> {{@$order['shipping']['shopping_type']['name']}} <br/>
                            @if(@$order['shipping']['sale_type_id']=="1")
                            <strong>Collection Date: {{date('d-m-Y',strtotime(@$order['shipping']['date']))}}</strong> <br>
                            <strong>Collection Time: {{@$order['shipping']['collection_time']['name']}}</strong> <br>
                            @elseif(@$order['shipping']['sale_type_id']=="2")
                            <strong>Delivery Date: {{@$order['shipping']['dalivery_date']}}</strong> <br>
                            <strong>Delivery Time: {{@$order['shipping']['dalivery_time']}}</strong> <br>
                            @endif
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
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection