@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Upazila</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Upazila</li>
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
					<h5>
						@if(@$editData)
						Update Upazila
						@else
						Add Upazila
						@endif 
						<a class="btn btn-sm btn-success float-right" href="{{route('setup.upazila.view')}}"><i class="fa fa-list"></i> Upazila List</a></h5>
				</div>
				<!-- Form Start-->
				<form method="post" action="{{!empty($editData->id) ? route('setup.upazila.update',$editData->id) : route('setup.upazila.store')}}" id="myForm">
					{{csrf_field()}}
					<div class="card-body">
						<div class="show_module_more_event">
							<div class="form-row">
								<div class="form-group col-md-6">
									<label class="control-label">Division Name</label>
									<select name="division_id" id="division_id" class="form-control form-control-sm">
										<option value="">Select Division</option>
										@foreach($divisions as $d)
										<option value="{{$d->id}}" {{(@$editData->division_id==$d->id)?"selected":""}}>{{$d->name}}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group col-md-6">
									<label class="control-label">District Name</label>
									<select name="district_id" id="district_id" class="form-control form-control-sm">
										<option value="">Select District</option>
									</select>
								</div>
								<div class="form-group col-md-6">
									<label class="control-label">Upazila Name</label>
									<input type="text" name="name" id="name" class="form-control form-control-sm" value="{{@$editData->name}}" placeholder="Upazila Name">
								</div>
							</div>
						</div>
							
						<button type="submit" class="btn btn-success btn-sm">{{(@$editData) ? 'Update' : 'Submit'}}</button>
					</div>
				</form>
				<!--Form End-->
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

  <script>
    $(document).ready(function(){
    	$('#myForm').validate({
    		errorClass:'text-danger',
	      	validClass:'text-success',
	        rules : {
	            'division_id' : {
	                required : true,
	            },
	            'district_id' : {
	                required : true,
	            },
	            'name' : {
	                required : true,
	            },
	        },
	        messages : {

	        }
	    });
    });
</script>

<script type="text/javascript">
	$(function(){
		$(document).on('change','#division_id',function(){
			var division_id = $(this).val();
			$.ajax({
				url : "{{route('default.get-district-master')}}",
				type : "GET",
				data : {division_id:division_id},
				success:function(data){
					var html = '<option value="">Select District</option>';
					$.each(data,function(key,v){
						html +='<option value="'+v.id+'">'+v.name+'</option>';
					});
					$('#district_id').html(html);
					var district_id = "{{@$editData->district_id}}";
					if(district_id !=''){
						$('#district_id').val(district_id);
					}
				}
			});
		});
	});
</script>

<script type="text/javascript">
	$(function(){
		var division_id = "{{@$editData->division_id}}";
		if(division_id){
			$('#division_id').val(division_id).trigger('change');
		}
	});
</script>
@endsection