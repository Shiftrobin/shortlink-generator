@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Slider</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Slider</li>
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
                <h3>Add Slider
                  <a class="btn btn-success float-right btn-sm" href="{{route('site-setting.slider.view')}}"><i class="fa fa-list"></i> Slider List</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <form method="post" action="{{route('site-setting.slider.store')}}" id="myForm" enctype="multipart/form-data">
                  @csrf
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label>Main Heading</label>
                      <input type="text" name="short_title" class="form-control">
                    </div>
                    <div class="form-group col-md-8">
                      <label>Sub Heading</label>
                      <input type="text" name="long_title" class="form-control">
                    </div>
                    <div class="form-group col-md-3">
                      <label>Button Text</label>
                      <input type="text" name="button_text" class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                      <label>Link</label>
                      <input type="text" name="link" class="form-control">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="image">Image <span style="color: red;">(Size:1920px X 620px)</span></label>
                      <input type="file" name="image" class="form-control" id="image">
                    </div>
                    <div class="form-group col-md-2" style="padding-top:30px">
                      <img id="showImage" src="{{url('public/upload/no_image.png')}}" style="width: 150px;border:1px solid #000;">
                    </div>
                    <div class="form-group col-md-2">
                      <input type="submit" value="Submit" class="btn btn-primary">
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