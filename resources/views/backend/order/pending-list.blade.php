@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Pending Order</h1>
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
                <h3>Pending Order List
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th width="8%">SL.</th>
                      <th>Order No</th>
                      <th>Total Amount</th>
                      <th>Payment Type</th>
                      <th>Status</th>
                      <th width="15%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($orders as $key => $order)
                    <tr class="{{$order->id}}">
                      <td>{{$key+1}}</td>
                      <td># {{$order->order_no}}</td>
                      <td>£ {{$order->order_total}}</td>
                      <td>
                        {{$order['payment']['payment_method']}}
                      </td>
                      <td>
                        @if($order->status=='0')
                        <span style="background: #DD4F42;padding: 5px;color: #fff">Unapproved</span>
                        @elseif($order->status=='1')
                        <span style="background: #1BA160;padding: 5px;color: #fff">Approved</span>
                        @elseif($order->status=='2')
                        <span style="background: #FEA900;padding: 5px;color: #fff">Refunded</span>
                        @endif
                      </td>
                      <td>
                        @if($order->message!=null)
                        <a title="Refund" href="{{route('orders.refund',$order->order_no)}}" class="btn btn-info btn-sm"><i class="fa fa-exchange-alt"></i></a>
                        @endif
                        <a href="{{route('orders.details',$order->order_no)}}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> </a>
                        <a title="Approved" id="approve" class="btn btn-sm btn-primary" href="{{route('orders.approve')}}" data-token="{{csrf_token()}}" data-id="{{$order->id}}"><i class="fa fa-check"></i></a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
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