@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Service</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Service</li>
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
                  Edit Service
                  @else
                  Add Service
                  @endif
                  <a class="btn btn-success float-right btn-sm" href="{{route('services.view')}}"><i class="fa fa-list"></i> Service List</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <form method="post" action="{{(@$editData)?route('services.update',$editData->id):route('services.store')}}" id="myForm" enctype="multipart/form-data">
                  @csrf
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Title</label>
                      <input type="text" name="title" value="{{@$editData->title}}" class="form-control">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="image">Image <span style="color: red;">(Size:702px X 505px)</span></label>
                      <input type="file" name="image" class="form-control" id="image">
                    </div>
                    <div class="form-group col-md-3" style="padding-top:30px">
                      <img id="showImage" src="{{(!empty($editData->image))?url('public/upload/service_images/'.$editData->image):url('public/upload/no_image.png')}}" style="width: 180px;border:1px solid #000;">
                    </div>
                    <div class="form-group col-md-12">
                      <label>Description</label>
                      <textarea name="description" class="form-control" rows="5">{{@$editData->description}}</textarea>
                    </div>
                    <div class="form-group col-md-6">
                      <button type="submit" class="btn btn-primary">{{(@$editData)?"Update":"Submit"}}</button>
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

  <script type="text/javascript">
    $(document).ready(function(){
      var a1 = CKEDITOR.replace('description');
        CKFinder.setupCKEditor( a1, '/ckfinder/' );
    });
 </script>

  <script type="text/javascript">
      $(document).ready(function () {
        $('description').each(function(){
                $(this).val($(this).val().trim());
            }
        );

        $('#myForm').validate({
          ignore : [],
          debug : false,
          rules: {
            title: {
              required: true,
            },
            description: {
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