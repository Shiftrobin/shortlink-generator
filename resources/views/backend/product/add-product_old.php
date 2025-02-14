@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product</li>
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
                  Edit Product
                  @else
                  Add Product
                  @endif
                  <a class="btn btn-success float-right btn-sm" href="{{route('products.view')}}"><i class="fa fa-list"></i> Product List</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <form method="post" action="{{(@$editData)?route('products.update',$editData->id):route('products.store')}}" id="myForm" enctype="multipart/form-data">
                  @csrf
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label>Category</label>
                      <select name="category_id" id="category_id" class="form-control form-control-sm select2">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}" {{(@$editData->category_id==$category->id)?"selected":""}}>{{$category->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label>Sub-Category</label>
                      <select name="sub_category_id" id="sub_category_id" class="form-control form-control-sm select2">
                        <option value="">Select Sub-Category</option>
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label>Product Name</label>
                      <input type="text" name="name" value="{{@$editData->name}}" class="form-control form-control-sm" placeholder="Write Product Name">
                      <font color="red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                    </div>
                    <div class="form-group col-md-2">
                      <label>Old Coll Price</label>
                      <input type="number" name="old_collective_price" value="{{@$editData->old_collective_price}}" class="form-control form-control-sm">
                      <font color="red">{{($errors->has('old_collective_price'))?($errors->first('old_collective_price')):''}}</font>
                    </div>
                    <div class="form-group col-md-2">
                      <label>Current Coll Price</label>
                      <input type="number" name="current_collective_price" value="{{@$editData->current_collective_price}}" class="form-control form-control-sm">
                      <font color="red">{{($errors->has('current_collective_price'))?($errors->first('current_collective_price')):''}}</font>
                    </div>
                    <div class="form-group col-md-2">
                      <label>Old Del Price</label>
                      <input type="number" name="old_delivery_price" value="{{@$editData->old_delivery_price}}" class="form-control form-control-sm">
                      <font color="red">{{($errors->has('old_delivery_price'))?($errors->first('old_delivery_price')):''}}</font>
                    </div>
                    <div class="form-group col-md-2">
                      <label>Current Del Price</label>
                      <input type="number" name="current_delivery_price" value="{{@$editData->current_delivery_price}}" class="form-control form-control-sm">
                      <font color="red">{{($errors->has('current_delivery_price'))?($errors->first('current_delivery_price')):''}}</font>
                    </div>
                    <div class="form-group col-md-2">
                      <label>Unit</label>
                      <select name="unit_id" class="form-control form-control-sm select2">
                        <option value="">Select Unit</option>
                        @foreach($units as $unit)
                        <option value="{{$unit->id}}" {{(@$editData->unit_id==$unit->id)?"selected":""}}>{{$unit->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-md-2">
                      <label>Product Code</label>
                      <input type="number" name="product_code" value="{{@$editData->product_code}}" class="form-control form-control-sm">
                      <font color="red">{{($errors->has('product_code'))?($errors->first('product_code')):''}}</font>
                    </div>
                    <div class="form-group col-md-2">
                      <label>Visiblity</label>
                      <select name="status" class="form-control form-control-sm select2">
                        <option value="1" {{(@$editData->status=="1")?"selected":""}}>Yes</option>
                        <option value="0" {{(@$editData->status=="0")?"selected":""}}>No</option>
                      </select>
                    </div>
                    <div class="form-group col-md-3">
                      @php
                        $all_status = @$editData->product_status;
                      @endphp
                      <label>Product Display</label><br/>
                      <div class="form-check form-check-inline">
                        <input type="checkbox" name="product_status[]" value="On Sale" class="form-check-input product_status" {{in_array('On Sale', explode(',', $all_status))?("checked"):""}}>
                        <label class="form-check-label">On Sale</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input type="checkbox" name="product_status[]" value="Popular" class="form-check-input product_status" {{in_array('Popular', explode(',', $all_status))?("checked"):""}}>
                        <label class="form-check-label">Popular</label>
                      </div>
                    </div>
                    <div class="form-group col-md-5">
                      <label>Product Brands</label>
                      <select name="brand_id[]" class="form-control select2" multiple>
                        @foreach($brands as $brand)
                        <option value="{{$brand->id}}" {{(@in_array(['brand_id'=>$brand->id],$brand_array))?"selected":""}}>{{$brand->name}}</option>
                        @endforeach
                      </select>
                      <font color="red">{{($errors->has('brand_id'))?($errors->first('brand_id')):''}}</font>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Product Size</label>
                      <select name="size_id[]" class="form-control select2" multiple>
                        @foreach($sizes as $size)
                        <option value="{{$size->id}}" {{(@in_array(['size_id'=>$size->id],$size_array))?"selected":""}}>{{$size->name}}</option>
                        @endforeach
                      </select>
                      <font color="red">{{($errors->has('size_id'))?($errors->first('size_id')):''}}</font>
                    </div>
                    <div class="form-group col-md-2">
                      <label>Quantity</label>
                      <input type="number" name="quantity" value="{{@$editData->quantity}}" class="form-control form-control-sm">
                      <font color="red">{{($errors->has('quantity'))?($errors->first('quantity')):''}}</font>
                    </div>
                    
                    <div class="form-group col-md-2">
                      <label>Discount</label>
                      <input type="number" name="discount" value="{{@$editData->discount}}" class="form-control form-control-sm">
                      <font color="red">{{($errors->has('discount'))?($errors->first('discount')):''}}</font>
                    </div>
                    <div class="form-group col-md-2">
                      <label>VAT</label>
                      <input type="number" name="vat" value="{{@$editData->vat}}" class="form-control form-control-sm">
                      <font color="red">{{($errors->has('vat'))?($errors->first('vat')):''}}</font>
                    </div>
                    <div class="form-group col-md-3">
                      <label>Product Image <span style="color: red;font-size: 12px;">(Size:1000px X 1000px)</span></label>
                      <input type="file" name="image" id="image" class="form-control form-control-sm">
                    </div>
                    <div class="form-group col-md-2">
                      <img id="showImage" src="{{(!empty($editData->image))?url('public/upload/product_images/'.$editData->image):url('public/upload/no_image.png')}}" style="width: 100%;height: 105px;border:1px solid #000;">
                    </div>
                    <div class="form-group col-md-3">
                      <label>Gallery Image <span style="color: red;font-size: 12px;">(Size:1000px X 1000px)</span></label>
                      <input type="file" name="gallery_image[]" class="form-control form-control-sm" multiple>
                    </div>
                    <div class="form-group col-md-4">
                      <label>Occation/Deals Remaining </label>
                      <input type="text" name="occation_remeaning" value="{{@$editData->occation_remeaning}}" class="form-control form-control-sm" placeholder="Write Occation/Deals Remaining">
                    </div>
                    <div class="form-group col-md-12">
                      <label>Occation/Deals Description</label>
                      <textarea name="occation_description" class="form-control form-control-sm" rows="5">{{@$editData->occation_description}}</textarea>
                      <font color="red">{{($errors->has('occation_description'))?($errors->first('occation_description')):''}}</font>
                    </div>
                    <div class="form-group col-md-12">
                      <label>Product Ingredient</label>
                      <textarea name="ingredient" class="form-control form-control-sm" rows="5">{{@$editData->ingredient}}</textarea>
                      <font color="red">{{($errors->has('ingredient'))?($errors->first('ingredient')):''}}</font>
                    </div>
                    <div class="form-group col-md-12">
                      <label>Nutrition value</label>
                      <textarea name="nutrition_value" class="form-control form-control-sm" rows="5">{{@$editData->nutrition_value}}</textarea>
                      <font color="red">{{($errors->has('nutrition_value'))?($errors->first('nutrition_value')):''}}</font>
                    </div>
                    <div class="form-group col-md-12">
                      <label>Allergy advice</label>
                      <textarea name="allergy_advice" class="form-control form-control-sm" rows="5">{{@$editData->allergy_advice}}</textarea>
                      <font color="red">{{($errors->has('allergy_advice'))?($errors->first('allergy_advice')):''}}</font>
                    </div>
                    <div class="form-group col-md-1">
                      <button type="submit" class="btn btn-primary">{{(@$editData)?"Update":"Submit"}}</button>
                    </div>
                  </div>
                </form>

                @if(@$editData)
                <div>
                  @if (isset($editData['product_img']) && count($editData['product_img']) > 0)
                  <h4>Current gallery images</h4>
                  @foreach ($editData['product_img'] as $image)
                  <img src="{{ url('public/upload/product_sub_images',$image->gallery_image) }}" class="p-2" width="200px">
                  <a title="Delete" id="delete" class="btn btn-sm btn-danger" href="{{route('products.delete.img')}}" data-token="{{csrf_token()}}" data-id="{{$image->id}}" style="margin: -153px 0px 0px -41px;"><i class="fa fa-backspace"></i></a>            
                  @endforeach
                  @endif
                </div>
                @endif

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
      var a1 = CKEDITOR.replace('occation_description');
      CKFinder.setupCKEditor( a1, '/ckfinder/' );
      var a1 = CKEDITOR.replace('ingredient');
      CKFinder.setupCKEditor( a1, '/ckfinder/' );
      var a1 = CKEDITOR.replace('nutrition_value');
      CKFinder.setupCKEditor( a1, '/ckfinder/' );
      var a1 = CKEDITOR.replace('allergy_advice');
      CKFinder.setupCKEditor( a1, '/ckfinder/' );
    });
  </script>

   <script type="text/javascript">
    $(document).ready(function () {
      $('#myForm').validate({
        ignore:[],
        errorPlacement: function(error, element){
          if (element.attr("name") == "category_id" ){ error.insertAfter(element.parents('.input-group')); }
          else if (element.attr("name") == "sub_category_id" ){ error.insertAfter(element.parents('.input-group')); }
          else if (element.attr("name") == "unit_id" ){error.insertAfter(element.parents('.input-group')); }
          else{error.insertAfter(element);}
        },
        errorClass:'text-danger',
        validClass:'text-success',
        rules: {
          category_id: {
            required: true,
          },
          sub_category_id: {
            required: true,
          },
          name: {
            required: true,
          },
          old_collective_price: {
            required: true,
          },
          current_collective_price: {
            required: true,
          },
          old_delivery_price: {
            required: true,
          },
          current_delivery_price: {
            required: true,
          },
          unit_id: {
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

  <script type="text/javascript">
    $(function(){
      $(document).on('change','#category_id',function(){
        var category_id = $(this).val();
        $.ajax({
          type:"GET",
          url :"{{route('get-sub-category')}}",
          data:{category_id:category_id},
          success:function(data){
            var html = '<option value="">Select Sub Category</option>';
            $.each(data,function(key,v){
              html += '<option value="'+v.id+'">'+v.name+'</option>';
            });
            $('#sub_category_id').html(html);
            var sub_category_id = "{{@$editData->sub_category_id}}";
            if(sub_category_id !=''){
              $('#sub_category_id').val(sub_category_id);
            }
          }
        });
      });
    });
  </script>

  <script type="text/javascript">
    $(function(){
      var category_id = "{{@$editData->category_id}}";
      if(category_id){
        $('#category_id').val(category_id).trigger('change');
      }
    });
  </script>

@endsection