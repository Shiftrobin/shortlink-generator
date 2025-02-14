@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Short Link</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Short Link</li>
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
                    Edit Short Link
                  @else
                    Add Short Link
                  @endif
                  <a class="btn btn-success float-right btn-sm" href="{{route('shortlinks.view')}}"><i class="fa fa-list"></i>
                    Short Link List
                  </a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <form method="POST" action="{{(@$editData)?route('shortlinks.update',$editData->id):route('shortlinks.store')}}" id="myForm">
                  @csrf
                  <div class="form-row">
                    <div class="form-group col-md-12">
                        <label>Link</label>
                        <input type="text" name="link" value="{{@$editData->link}}" class="form-control" placeholder="Write Portal Link">
                        <font color="red">{{($errors->has('link'))?($errors->first('link')):''}}</font>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="text">note</label>
                        <textarea name="note" class="form-control" rows="5">
                            {{@$editData->note}}
                            <font color="red">{{($errors->has('note'))?($errors->first('note')):''}}</font>
                        </textarea>
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
      var a1 = CKEDITOR.replace('note');
        CKFinder.setupCKEditor( a1, '/ckfinder/' );
    });
  </script>

   <script type="text/javascript">
    $(document).ready(function () {
      $('#myForm').validate({
        rules: {
            link: {
              required: true,
            },

        },
        messages: {
            link: {
                required : 'Please Enter Link',
            },

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
