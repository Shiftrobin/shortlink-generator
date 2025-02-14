@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Customer</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Customer</li>
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
                <h3>Customer List
                  
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover table-sm table-responsive">
                  <thead>
                    <tr>
                      <th>Member Id</th>
                      <th>Name</th>
                      <th>Mobile</th>
                      <th>Email</th>
                      <th>District</th>
                      <th>Address</th>
                      <th>Status</th>
                      <th width="10%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($allData as $key => $customer)
                    <tr class="{{$customer->id}}">
                      <td>{{$customer->member_id}}</td>
                      <td>{{$customer->first_name}} {{$customer->last_name}}</td>
                      <td>{{'0'.$customer->mobile}}</td>
                      <td>{{$customer->email}}</td>
                      <td>{{$customer->district}}</td>
                      <td>{{$customer->address}}</td>                     
                      <td>

                        @if($customer->status=='1')                        
                            <a class="btn btn-sm" href="{{ !empty($customer->id) ? route('customers.inactive',$customer->id) : '' }}">
                              <span style="background-color:#16957C;padding:5px;color:white;">Active</span>
                            </a>
                        @elseif($customer->status=='0')
                            <a class="btn btn-sm" href="{{ !empty($customer->id) ? route('customers.active',$customer->id) : '' }}">
                              <span style="background-color:#E33C2F;padding:5px;color:white;">Inactive</span>
                            </a>
                        @endif   

                        {{-- @if($customer->status=="1")
                          <span style="background-color:#16957C;padding:5px">Active</span>
                        @else
                          <span style="background-color:#E33C2F;padding:5px">Inactive</span>
                        @endif --}}
                      
                      </td>
                      <td>                     
                        <a href="{{ route('customers.details.view',$customer->id) }}"> <i class="fa fa-eye text-success"></i> </a>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="{{ route('member.card',$customer->id) }}"><i class="fa fa-download text-danger"></i></a>      
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