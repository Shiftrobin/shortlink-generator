@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Autologin</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Autologin</li>
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
                  Edit Autologin
                  @else
                  Add Autologin
                  @endif
                  <a class="btn btn-success float-right btn-sm" href="{{route('autologins.admin.view')}}"><i class="fa fa-list"></i> Autologin List</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <form method="POST" action="{{(@$editData)?route('autologins.update',$editData->id):route('autologins.store')}}" id="myForm">
                  @csrf
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label>Portal Name</label>
                      <input type="text" name="portal_name" value="{{@$editData->portal_name}}" class="form-control" placeholder="Write Portal Name">
                      <font color="red">{{($errors->has('portal_name'))?($errors->first('portal_name')):''}}</font>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Portal Link</label>
                        <input type="text" name="portal_link" value="{{@$editData->portal_link}}" class="form-control" placeholder="Write Portal Link">
                        <font color="red">{{($errors->has('portal_link'))?($errors->first('portal_link')):''}}</font>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Username</label>
                        <input type="text" name="username" value="{{@$editData->username}}" class="form-control" placeholder="Write Portal Link">
                        <font color="red">{{($errors->has('username'))?($errors->first('username')):''}}</font>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Password</label>
                        <input type="text" name="password" value="{{@$editData->password}}" class="form-control" placeholder="Write Password">
                        <font color="red">{{($errors->has('password'))?($errors->first('password')):''}}</font>
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
          name: {
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
