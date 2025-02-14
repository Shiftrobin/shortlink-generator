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
                <h3>Edit Vendor 
                  <a class="btn btn-success float-right btn-sm" href="{{route('vendors.view')}}"><i class="fa fa-list"></i> Vendor List</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <form method="post" action="{{route('vendors.approve.store',$editData->id)}}" id="myForm" enctype="multipart/form-data">
                  @csrf
                  <div class="form-row">
                      <div class="form-group col-md-4">
                          <label class="control-label">Full Name</label>
                          <input type="text" value="{{$editData->name}}" name="name" id="name" class="form-control" readonly>
                          <font color="red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                      </div>
                      <div class="form-group col-md-4">
                          <label class="control-label">Vendor Email</label>
                          <input type="email" value="{{$editData->email}}" name="email" id="email" class="form-control" readonly>
                          <font color="red">{{($errors->has('email'))?($errors->first('email')):''}}</font>
                      </div>
                      <div class="form-group col-md-4">
                          <label class="control-label">Vendor Mobile</label>
                          <input type="text" value="{{$editData->mobile}}" name="mobile" id="mobile" class="form-control" readonly>
                          <font color="red">{{($errors->has('mobile'))?($errors->first('mobile')):''}}</font>
                      </div>
                      <div class="form-group col-md-4">
                          <label class="control-label">Store Name</label>
                          <input type="text" value="{{$editData->store_name}}" name="store_name" id="store_name" class="form-control" readonly>
                          <font color="red">{{($errors->has('store_name'))?($errors->first('store_name')):''}}</font>
                      </div>
                      <div class="form-group col-md-3">
                          <label class="control-label">Status</label>
                          <select name="status" class="form-control">
                            <option value="1" {{(@$editData->status=="1")?"selected":""}}>Approved</option>
                            <option value="0" {{(@$editData->status=="0")?"selected":""}}>Pending</option>
                          </select>
                      </div>
                      <div class="form-group col-md-1">
                        <img id="showImage" src="{{(!empty($editData->restaurant_logo))?url('public/upload/restaurant_images/'.$editData->restaurant_logo):url('public/upload/no_image.png')}}" style="width: 80px;height: 70px;border:1px solid #000;">
                      </div>
                      <div class="form-group col-md-6">
                        <input type="submit" value="Update" class="btn btn-primary">
                      </div>
                  </div>
                </form>
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