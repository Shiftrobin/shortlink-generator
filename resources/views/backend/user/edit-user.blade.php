@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User</li>
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
                <h3>Edit User
                  <a class="btn btn-success float-right btn-sm" href="{{route('users.view')}}"><i class="fa fa-list"></i> User List</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <form method="post" action="{{route('users.update',$editData->id)}}" id="myForm">
                  @csrf
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="role">User Role</label>
                      <select name="role_id" id="role_id" class="form-control">
                        <option value="">Select Role</option>
                        @foreach($roles as $role)
                        <option value="{{$role->id}}" {{($editData->role_id==$role->id)?"selected":""}}>{{$role->role_name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="name">Username</label>
                        <input type="text" name="username" value="{{$editData->username}}" class="form-control">
                        <font style="color: red">{{($errors->has('username'))?($errors->first('username')):''}}</font>
                      </div>
                    <div class="form-group col-md-6">
                      <label for="email">Email</label>
                      <input type="email" name="email" value="{{$editData->email}}" class="form-control">
                      <font style="color: red">{{($errors->has('email'))?($errors->first('email')):''}}</font>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="role">Approval Status</label>
                      <select name="status" id="status" class="form-control">
                        <option value="">Select Status</option>
                        <option value="1" {{($editData->status=='1')?"selected":""}}>Active</option>
                        <option value="0" {{($editData->status=='0')?"selected":""}}>Inactive</option>
                      </select>
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

  <script type="text/javascript">
    $(document).ready(function () {
      $('#myForm').validate({
        rules: {
          role_id: {
            required: true,
          },
          name: {
            required: true,
          },
          status: {
            required: true,
          },
          email: {
            required: true,
            email: true,
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
