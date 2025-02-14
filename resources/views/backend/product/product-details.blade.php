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
                <h3>Product details Info
                  <a class="btn btn-success float-right btn-sm" href="{{route('products.view')}}"><i class="fa fa-list"></i> Product list</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-hover table-sm">
                  <tbody>
                    <tr>
                      <td width="30%">Category</td>
                      <td width="70%">{{$product['category']['name']}}</td>
                    </tr>
                    <tr>
                      <td width="30%">Sub Category</td>
                      <td width="70%">{{$product['sub_category']['name']}}</td>
                    </tr>
                    <tr>
                      <td width="30%">Product Name</td>
                      <td width="70%">{{$product->name}}</td>
                    </tr>
                    <tr>
                      <td width="30%">Collective Price</td>
                      <td width="70%">
                        {{$product->current_collective_price}} (<span style="color: red"><del>{{$product->old_collective_price}}</del></span>)
                      </td>
                    </tr>
                    <tr>
                      <td width="30%">Delivery Price</td>
                      <td width="70%">
                        {{$product->current_delivery_price}} (<span style="color: red"><del>{{$product->old_delivery_price}}</del></span>)
                      </td>
                    </tr>
                    @php
                      $product_brands = App\Model\ProductBrand::where('product_id',$product->id)->get();
                      $product_sizes = App\Model\ProductSize::where('product_id',$product->id)->get();
                    @endphp
                    <tr>
                      <td width="30%">Brands</td>
                      <td width="70%">
                        @foreach($product_brands as $brand)
                          {{@$brand['brand']['name']}},
                        @endforeach
                      </td>
                    </tr>
                    <tr>
                      <td width="30%">Display</td>
                      <td width="70%">
                        {{$product->product_status}}
                      </td>
                    </tr>
                    <tr>
                      <td width="30%">Visiblity</td>
                      <td width="70%">
                        @if($product->status=="1")
                        Yes
                        @else
                        No
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td width="30%">VAT</td>
                      <td width="70%">
                        {{$product->vat}} %
                      </td>
                    </tr>
                    <tr>
                      <td width="30%">Stock Status</td>
                      <td width="70%">
                        {{$product->stock_status}} 
                      </td>
                    </tr>
                    <tr>
                      <td width="30%">Tags</td>
                      <td width="70%">
                        {{$product->product_tag}} 
                      </td>
                    </tr>
                    <tr>
                      <td width="30%">Image</td>
                      <td width="70%">
                        <img src="{{(!empty($product->image))?url('public/upload/product_images/'.$product->image):url('public/upload/no_image.png')}}" style="width: 150px;">
                      </td>
                    </tr>
                    <tr>
                      <td width="30%">Gallery images</td>
                      <td width="70%">
                        @foreach($product['product_img'] as $img)
                          <img src="{{ url('public/upload/product_sub_images',$img->gallery_image) }}" style="width: 150px;">
                        @endforeach
                      </td>
                    </tr>
                    <tr>
                      <td width="30%">Occation Remaining</td>
                      <td width="70%">{{$product->occation_remeaning}}</td>
                    </tr>
                    <tr>
                      <td width="30%">Occation Description</td>
                      <td width="70%"><?php echo $product->occation_description; ?></td>
                    </tr>
                    <tr>
                      <td width="30%">Ingredient</td>
                      <td width="70%"><?php echo $product->ingredient; ?></td>
                    </tr>
                    <tr>
                      <td width="30%">Nutrition value</td>
                      <td width="70%"><?php echo $product->nutrition_value; ?></td>
                    </tr>
                    <tr>
                      <td width="30%">Allergy advice</td>
                      <td width="70%"><?php echo $product->allergy_advice; ?></td>
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