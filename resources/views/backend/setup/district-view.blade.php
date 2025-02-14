@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage District</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">District</li>
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
					<h5>District List
						<a class="btn btn-sm btn-success float-right" href="{{route('setup.district.add')}}"><i class="fa fa-plus-circle"></i> Add District</a>
					</h5>
				</div>
				<div class="card-body">
					<table class="table-sm table-bordered table-striped dt-responsive nowrap" style="width: 100%" id="example1">
						<thead  >
							<tr>
								<th>Sl.</th>
								<th>Division</th>
								<th>District</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($allData as $key => $district)
							<tr class="{{$district->id}}">
								<td>{{$key+1}}</td>
								<td>{{$district['division']['name']}}</td>
								<td>{{$district->name}}</td>
								<td>
									<a class="btn btn-sm btn-success" title="Edit" href="{{route('setup.district.edit',$district->id)}}"><i class="fa fa-edit"></i></a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
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