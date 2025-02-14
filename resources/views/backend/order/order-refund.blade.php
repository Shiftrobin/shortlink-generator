@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Refund Order</h1>
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
                <table class="txt-center mytable" width="100%" border="1">
                  <tr>
                    <td width="30%"><strong>Billing Info:</strong></td>
                    <td width="70%" colspan="2" style="text-align: left;">
                      <strong>Name :</strong> {{$order['shipping']['name']}} &nbsp;&nbsp;&nbsp;&nbsp;
                      <strong>Mobile no :</strong> {{$order['shipping']['mobile_no']}} <br/>
                      <strong>Email :</strong> {{$order['shipping']['email']}} &nbsp;&nbsp;&nbsp;&nbsp;
                      <strong>Address :</strong> {{$order['shipping']['address']}} <br/>
                      <strong>Payment :</strong> 
                        {{$order['payment']['payment_method']}}
                        @if($order['payment']['payment_method']=='Bkash')
                        (Transaction no : {{$order['payment']['transaction_no']}})
                        @endif &nbsp;&nbsp;&nbsp;&nbsp;
                      <strong>Order no: # {{$order->order_no}}</strong>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="3"><strong>Order Details</strong></td>
                  </tr>
                  <tr>
                    <td><strong>Image</strong></td>
                    <td><strong>Product</strong></td>
                    <td><strong>Quantity & Price</strong></td>
                  </tr>
                  @foreach($order['order_details'] as $details)
                  <tr>
                    <td>
                      <img src="{{url('public/upload/product_images/'.$details['product']['image'])}}" style="width: 50px;height: 55px;">
                    </td>
                    <td>
                      {{$details['product']['name']}}
                    </td>
                    <td>
                      @php
                        $sub_total = $details->quantity*$details['product']['price'];
                      @endphp
                      {{$details->quantity}} x 
                      {{$details['product']['price']}} =
                      {{$sub_total}}
                    </td>
                  </tr>
                  @endforeach
                  <tr>
                    <td colspan="2" style="text-align: right;"><strong>Grand Total</strong></td>
                    <td><strong>{{$order->order_total}}</strong></td>
                  </tr>
                </table>
              </div><!-- /.card-body -->
              <div class="card-body">
                <form method="post" action="{{route('orders.refund.store',$order->id)}}" id="myForm">
                  @csrf
                  <table class="table" width="100%">
                    <tbody>
                      <tr>
                        <td width="15%"><strong>Refund cause</strong></td>
                        <td>{{$order->message}}</td>
                      </tr>
                      <tr>
                        <td width="15%"><strong>Refundable Status</strong></td>
                        <td>
                          @if($order->status=='2')
                          <span style="background: #FEA900;padding: 5px;color: #fff">Refunded</span>
                          @else
                          <select name="status" class="form-control">
                            <option value="">Select Status</option>
                            <option value="2">Refunded</option>
                          </select>
                          @endif
                        </td>
                      </tr>
                      @if($order->status!='2')
                      <tr>
                        <td width="15%"></td>
                        <td><button type="submit" class="btn btn-sm btn-primary">Submit</button></td>
                      </tr>
                      @endif
                    </tbody>
                  </table>
                </form>
              </div>
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

  <script type="text/javascript">
    $(document).ready(function () {
      $('#myForm').validate({
        rules: {
          status: {
            required: true,
          },
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