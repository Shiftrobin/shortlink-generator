@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Member</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Member</li>
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
                <h3>Member List

                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover table-sm table-responsive">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Login Username</th>
                      <th>Name</th>
                      <th>Designation</th>
                      <th>Mobile</th>
                      <th>Email</th>
                      <th>Country</th>
                      <th>Image</th>
                      {{-- <th>Company Logo</th> --}}
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($allData as $key => $member)
                    <tr class="{{$member->id}}">
                      <td>{{$member->id}}</td>
                      <td>{{$member->username}}</td>
                      <td>{{$member->name}}</td>
                      <td>{{$member->profession}}</td>
                      <td>{{$member->mobile}}</td>
                      <td>{{$member->email}}</td>
                      <td>{{$member->country}}</td>
                      <td><img src="{{(!empty($member->image))?url('public/upload/member_images/'.$member->image):url('public/upload/no_image.png')}}" width="64" height="64"></td>
                      {{-- <td><img src="{{(!empty($member->company_logo))?url('public/upload/member_images/'.$member->company_logo):url('public/upload/no_image.png')}}" width="64" height="64"></td> --}}
                      <td>
                        @if($member->status=='1')
                            <a class="btn btn-sm" href="{{ !empty($member->id) ? route('members.inactive',$member->id) : '' }}">
                              <span style="background-color:#16957C;padding:5px;color:white;">Active</span>
                            </a>
                        @elseif($member->status=='0')
                            <a class="btn btn-sm" href="{{ !empty($member->id) ? route('members.active',$member->id) : '' }}">
                              <span style="background-color:#E33C2F;padding:5px;color:white;">Inactive</span>
                            </a>
                        @endif

                      </td>
                      <td>
                        <a title="Delete" id="delete" class="btn btn-sm btn-danger" href="{{route('members.delete')}}" data-token="{{csrf_token()}}" data-id="{{$member->id}}"><i class="fa fa-trash"></i></a>
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
