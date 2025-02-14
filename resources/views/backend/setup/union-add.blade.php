@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Union</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Union</li>
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
						Update Union
						@else
						Add Union
						@endif 
						<a class="btn btn-sm btn-success float-right" href="{{route('setup.union.view')}}"><i class="fa fa-list"></i> Union List</a></h5>
				</div>
				<!-- Form Start-->
				<form method="post" action="{{!empty($editData->id) ? route('setup.union.update',$editData->id) : route('setup.union.store')}}" id="myForm">
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
									<select name="upazila_id" id="upazila_id" class="form-control form-control-sm">
										<option value="">Select Upazila</option>
									</select>
								</div>
								<div class="form-group col-md-6">
									<label class="control-label">Union Name</label>
									<input type="text" name="name" id="name" class="form-control form-control-sm" value="{{@$editData->name}}" placeholder="Union Name">
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
	            'upazila_id' : {
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
						$('#district_id').val(district_id).trigger('change');
					}
				}
			});
		});
	});
</script>

<script type="text/javascript">
	$(function(){
		$(document).on('change','#district_id',function(){
			var district_id = $(this).val();
			$.ajax({
				url : "{{route('default.get-upazila-master')}}",
				type : "GET",
				data : {district_id:district_id},
				success:function(data){
					var html = '<option value="">Select Upazila</option>';
					$.each(data,function(key,v){
						html +='<option value="'+v.id+'">'+v.name+'</option>';
					});
					$('#upazila_id').html(html);
					var upazila_id = "{{@$editData->upazila_id}}";
					if(upazila_id !=''){
						$('#upazila_id').val(upazila_id);
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