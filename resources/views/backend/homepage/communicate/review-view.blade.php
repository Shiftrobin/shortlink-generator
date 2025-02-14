@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Contactor</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Contactor</li>
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
                <h3>Contactor List
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>SL.</th>
                        <th>Product</th>
                        <th>Name</th>
                        <th>Rating</th>
                        <th>Review</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($allData as $key => $value)
                      <tr class="{{$value->id}}">
                        <td>{{$key+1}}</td>
                        <td>{{@$value['product']['name']}}</td>
                        <td>{{@$value['reviewer']['name']}}</td>
                        <td>
                          @if($value->rating=="1")
                          <img src="{{asset('public/frontend/img/rating/1_star.png')}}">
                          @elseif($value->rating=="2")
                          <img src="{{asset('public/frontend/img/rating/2_star.png')}}">
                          @elseif($value->rating=="3")
                          <img src="{{asset('public/frontend/img/rating/3_star.png')}}">
                          @elseif($value->rating=="4")
                          <img src="{{asset('public/frontend/img/rating/4_star.png')}}">
                          @elseif($value->rating=="5")
                          <img src="{{asset('public/frontend/img/rating/5_star.png')}}">
                          @endif
                        </td>
                        <td>{{$value->description}}</td>
                        <td>
                          @if($value->status=="1")
                          <span style="background-color:#16957C;padding:5px">Approved</span>
                          @else
                          <span style="background-color:#E33C2F;padding:5px">Unapproved</span>
                          @endif
                        </td>
                        <td>
                          @if($value->status=='1')
                          <a class="btn btn-primary btn-sm" href="{{ !empty($value->id) ? route('communicates.inactive',$value->id) : '' }}"><i class="fa fa-thumbs-up"></i></a>
                          @elseif($value->status=='0')
                          <a class="btn btn-danger btn-sm" href="{{ !empty($value->id) ? route('communicates.active',$value->id) : '' }}"><i class="fa fa-thumbs-down"></i></a>
                          @endif
                          <a title="Delete" id="delete" class="btn btn-sm btn-danger" href="{{route('communicates.review.delete')}}" data-token="{{csrf_token()}}" data-id="{{$value->id}}"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
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