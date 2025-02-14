@extends('backend.layouts.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Offer</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Offer</li>
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
                <h3>
                  @if(isset($editData))
                  Edit Offer
                  @else
                  Add Offer
                  @endif
                  <a class="btn btn-success float-right btn-sm" href="{{route('site-setting.offer.view')}}"><i class="fa fa-list"></i> Offer List</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <form method="post" action="{{(@$editData)?route('site-setting.offer.update',$editData->id):route('site-setting.offer.store')}}" id="myForm" enctype="multipart/form-data">
                  @csrf
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="description">Offer Title</label>
                      <input type="text" name="title" class="form-control" value="{{@$editData->title}}">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="description">Offer Link</label>
                      <input type="text" name="link" class="form-control" value="{{@$editData->link}}">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="image">Image <span style="color: red;">(Size:285px X 230px)</span></label>
                      <input type="file" name="image" class="form-control" id="image">
                    </div>
                    <div class="form-group col-md-3" style="padding-top:30px">
                      <img id="showImage" src="{{(!empty($editData->image))?url('public/upload/offer_images/'.$editData->image):url('public/upload/no_image.png')}}" style="width: 180px;border:1px solid #000;">
                    </div>
                    <div class="form-group col-md-4" style="padding-top:30px">
                      <button type="submit" class="btn btn-primary">{{(@$editData)?"Update":"Submit"}}</button>
                    </div>
                  </div>
                </form>
              </div><!-- /.card-body -->
            </div>
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
        ignore : [],
        debug : false,
        rules: {
          title: {
            required: true,
          },
          link: {
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