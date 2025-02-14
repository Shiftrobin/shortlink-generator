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
                <h3>Customer - <a href="{{route('customers.view')}}" class="btn btn-sm btn-success">Back To List</a>

                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-hover table-responsive">
                  <tbody>

                  <tr>
                    <td>
                      <img src="{{(!empty($allData->image))?url('public/upload/user_images/'.$allData->image):url('public/upload/no_image.png')}}" style="width: 130px;height: 140px;border-radius: 50px;">
                    </td>
                  </tr>
                  <tr>
                      <td>Member ID</td>
                      <td>BZMGHS{{$allData->member_id}}</td>
                  </tr>
                  {{-- <tr>
                      <td>Login Username</td>
                      <td>{{$allData->username}}</td>
                  </tr>
                 -- }}
                  <tr>
                    <td>Bangla Name</td>
                    <td>{{$allData->name}} </td>
                  </tr>
                  <tr>
                      <td>Nick Name</td>
                      <td>{{$allData->last_name}}</td>
                  </tr>
                  <tr>
                      <td>Email</td>
                      <td>{{$allData->email}}</td>
                  </tr>
                  <tr>
                      <td>Phone</td>
                      <td>{{$allData->mobile}}</td>
                  </tr>
                  {{--
                  <tr>
                      <td>Father's Name</td>
                      <td>{{$allData->fathers_name}}</td>
                  </tr>

                  <tr>
                      <td>Mother's Name</td>
                      <td>{{$allData->mothers_name}}</td>
                  </tr>
                  <tr>
                      <td>Date Of Birth</td>
                      <td>{{$allData->date_of_birth}}</td>
                  </tr>
                  --}}
                  <tr>
                      <td>NID/Birth Certificate / Passport</td>
                      <td>{{$allData->nid}}</td>
                  </tr>
                  {{--
                  <tr>
                      <td>Gender</td>
                      <td>{{$allData->gender}}</td>
                  </tr>
                    --}}
                  <tr>
                      <td>Blood Group</td>
                      <td>{{$allData->blood_group}}</td>
                  </tr>
                  {{--
                  <tr>
                    <td>Education Qualification</td>
                    <td>{{$allData->education_qualification}}</td>
                  </tr>
                  --}}
                  <tr>
                      <td>Profession</td>
                      <td>{{$allData->profession}}</td>
                  </tr>
                  {{--
                  <tr>
                      <td>Other Expertise</td>
                      <td>{{$allData->other_expertise}}</td>
                  </tr>
                  --}}
                  {{--
                  <tr>
                      <td>Country</td>
                      <td>{{$allData->country}}</td>
                  </tr>

                  <tr>
                      <td>Division</td>
                      <td>{{$allData->division}}</td>
                  </tr>

                  <tr>
                    <td>District</td>
                    <td>{{$allData->district}}</td>
                  </tr>
                  --}}
                  <tr>
                    <td>Address</td>
                    <td>{{$allData->address}}</td>
                  </tr>
                  {{--
                  <tr>
                      <td> Membership Type</td>
                      <td>{{$allData->membership_type}}</td>
                  </tr>
                  --}}
                  <tr>
                    <td> Registration Date</td>
                    <td>{{$allData->reg_date}}</td>
                 </tr>


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
