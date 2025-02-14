@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Vendor</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Vendor</li>
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
                <h3>Vendor List </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>SL.</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Mobile No</th>
                      <th>Store Name</th>
                      <th>Address</th>
                      @if(Auth::user()->role=='admin')
                      <th>Status</th>
                      @endif
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($allData as $key => $data)
                    <tr class="{{$data->id}}">
                      <td>{{$key+1}}</td>
                      <td>{{$data->name}}</td>
                      <td>{{$data->email}}</td>
                      <td>{{$data->mobile}}</td>
                      <td>{{$data->store_name}}</td>
                      <td>{{$data->store_address}}</td>
                      @if(Auth::user()->role=='admin')
                      <td>
                        @if($data->status=="0")
                          <span style="background: #EA4335;padding: 5px;color: #fff;">Pending</span>
                        @elseif($data->status=="1")
                          <span style="background: #58AF8E;padding: 5px;color: #fff;">Approved</span>
                        @endif
                      </td>
                      @endif
                      <td>
                        @if(Auth::user()->role=='vendor')
                        <a title="Edit" class="btn btn-sm btn-primary" href="{{route('vendors.edit')}}"><i class="fa fa-edit"></i></a>
                        @endif
                        @if(Auth::user()->role=='admin')
                        <a title="Approved" class="btn btn-sm btn-success" href="{{route('vendors.approve',$data->id)}}"><i class="fa fa-check"></i></a>
                        @endif
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
