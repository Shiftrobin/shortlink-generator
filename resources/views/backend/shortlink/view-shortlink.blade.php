@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">view Short Link List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">view Short Link List</li>
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
                <h3>view Short Link List
                <a class="btn btn-success float-right btn-sm" href="{{route('shortlinks.add')}}"><i class="fa fa-plus-circle"></i> Add Short Link</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover table-sm table-responsive" style="width:100%">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Shorten Link</th>
                      <th>Original Link</th>
                      <th>Note</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($allData as $key => $data)
                    <tr class="{{$data->id}}">
                      <td>{{$data->id}}</td>

                      @if ($data->status=='0')
                      <td><span style="color:red;font-weight:bold;">Please activate to view</span>  </td>
                      @else
                      <td> <a href="{{ route('shorten.link', $data->code) }}" target="_blank">{{ route('shorten.link', $data->code) }}</a></td>
                      @endif
                      <td><a href="{{$data->link}}" target="_blank"> {{$data->link}} </a> </td>
                      <td>{!! $data->note  !!}</td>
                      <td>
                        @if($data->status=='1')
                            <a class="btn btn-sm" href="{{ !empty($data->id) ? route('shortlinks.inactive',$data->id) : '' }}">
                              <span style="background-color:#16957C;padding:5px;color:white;">Active</span>
                            </a>
                        @elseif($data->status=='0')
                            <a class="btn btn-sm" href="{{ !empty($data->id) ? route('shortlinks.active',$data->id) : '' }}">
                              <span style="background-color:#E33C2F;padding:5px;color:white;">Inactive</span>
                            </a>
                        @endif
                      </td>
                      <td>
                        <a title="Edit" class="btn btn-sm btn-primary" href="{{route('qrcodes.edit',$data->id)}}"><i class="fa fa-edit"></i> Edit </a>
                        <a title="Delete" id="delete" class="btn btn-sm btn-danger" href="{{route('qrcodes.delete')}}" data-token="{{csrf_token()}}" data-id="{{$data->id}}"><i class="fa fa-trash"></i> Delete </a>
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
