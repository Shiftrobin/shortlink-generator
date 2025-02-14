<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Unit;
use App\Models\Size;
use App\Models\Product;
use App\Models\ProductBrand;
use App\Models\ProductSize;
use App\Models\ProductSubImage;
use DB;
use Auth;
use App\Http\Requests\ProductRequest;
use Image;
use Session;

class ProductController extends Controller
{
    public function view(){
        if(Auth::user()->role=='admin'){
            $data['allData'] = Product::orderBy('id','desc')->get();
        	return view('backend.product.view-product',$data);
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function add(){
        if(Auth::user()->role=='admin'){
            $data['categories'] = Category::all();
            $data['brands'] = Brand::all();
            $data['sizes'] = Size::all();
            $data['units'] = Unit::all();
        	return view('backend.product.add-product',$data);
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function store(Request $request){
        // dd($request->all());
        DB::transaction(function() use($request){
            $this->validate($request,[
                'name' => 'required|unique:products,name'
            ]);
            $product = new Product();
            $product->category_id = $request->category_id;
            $product->sub_category_id = $request->sub_category_id;
            $product->unit_id = $request->unit_id;
            $product->name = $request->name;
            $slug = rand(00000000,99999999);
            $product->slug = str_slug($request->name).$slug.date('YmdHis');
            if($request->old_collective_price !=null && $request->old_collective_price >='1'){
                $old_collective_price = is_float($request->old_collective_price) ? $request->old_collective_price : number_format((float)$request->old_collective_price, 2, '.', '');
            }else{
                $old_collective_price = '0';
            }
            $product->old_collective_price = $old_collective_price;
            $product->current_collective_price = is_float($request->current_collective_price) ? $request->current_collective_price : number_format((float)$request->current_collective_price, 2, '.', '');
            if($request->old_delivery_price !=null && $request->old_delivery_price >='1'){
                $old_delivery_price = is_float($request->old_delivery_price) ? $request->old_delivery_price : number_format((float)$request->old_delivery_price, 2, '.', '');
            }else{
                $old_delivery_price = '0';
            }
            $product->old_delivery_price = $old_delivery_price;
            $product->current_delivery_price = is_float($request->current_delivery_price) ? $request->current_delivery_price : number_format((float)$request->current_delivery_price, 2, '.', '');
            $product->product_code = $request->product_code;
            $product->status = $request->status;
            $product->vat = $request->vat;
            $product->stock_status = $request->stock_status;
            $product->product_tag = $request->product_tag;
            $product->occation_remeaning = $request->occation_remeaning;
            $product->occation_description = $request->occation_description;
            $product->ingredient = $request->ingredient;
            $product->nutrition_value = $request->nutrition_value;
            $product->allergy_advice = $request->allergy_advice;
            $product->created_by = Auth::user()->id;
            if(isset($request->product_status)){
                $product->product_status = implode(',', $request->product_status);
            }else{
                $product->product_status = null;
            }
            $img = $request->file('image');
            if ($img) {
                $imgName = date('YmdHi').$img->getClientOriginalName();
                $img->move('public/upload/product_images/', $imgName);
                $img = Image::make(public_path('upload/product_images/').$imgName);
                $img->resize(640,640)->save(public_path('upload/product_images/').$imgName);
                $product['image'] = $imgName;
            }
            if($product->save()){
                //product-sub-image-table-data-insert
                $files = $request->file('gallery_image');
                if(!empty($files)){
                   foreach ($files as $file) {
                        $imgName1 = date('YmdHi').$file->getClientOriginalName();
                        $file->move('public/upload/product_sub_images', $imgName1);
                        $file = Image::make(public_path('upload/product_sub_images/').$imgName1);
                        $file->resize(640,640)->save(public_path('upload/product_sub_images/').$imgName1);
                        $subimage['gallery_image'] = $imgName1;

                        $subimage = new ProductSubImage();
                        $subimage->product_id = $product->id;
                        $subimage->gallery_image = $imgName1;
                        $subimage->save();
                    }
                }
                $brands = $request->brand_id;
                if(!empty($brands)){
                    foreach ($brands as $brand) {
                        $mybrand = new ProductBrand();
                        $mybrand->product_id = $product->id;
                        $mybrand->brand_id = $brand;
                        $mybrand->save();
                    }
                }
                //Size-table-data-insert

                // $sizes = $request->size_id;
                // if(!empty($sizes)){
                //     foreach ($sizes as $size) {
                //         $mysize = new ProductSize();
                //         $mysize->product_id = $product->id;
                //         $mysize->size_id = $size;
                //         $mysize->save();
                //     }
                // }
            }
        });


    	return redirect()->route('products.view')->with('success','Data Inserted successfully');
    }

    public function edit($id){
        if(Auth::user()->role=='admin'){
            $data['editData'] = Product::with(['product_img'])->find($id);
            $data['categories'] = Category::all();
            $data['brands'] = Brand::all();
            $data['sizes'] = Size::all();
            $data['units'] = Unit::all();
            $data['brand_array'] = ProductBrand::select('brand_id')->where('product_id',$data['editData']->id)->orderBy('id','asc')->get()->toArray();
            // $data['size_array'] = ProductSize::select('size_id')->where('product_id',$data['editData']->id)->orderBy('id','asc')->get()->toArray();
            return view('backend.product.add-product',$data);
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function update(Request $request,$id){
        // dd($request->all());
        DB::transaction(function() use($request,$id){
            $product = Product::find($id);
            $this->validate($request,[
                'name' => 'required|unique:products,name,'.$product->id
            ]);
            $product->category_id = $request->category_id;
            $product->sub_category_id = $request->sub_category_id;
            $product->unit_id = $request->unit_id;
            $product->name = $request->name;
            $slug = rand(00000000,99999999);
            $product->slug = str_slug($request->name).$slug.date('YmdHis');
            if($request->old_collective_price !=null && $request->old_collective_price >='1'){
                $old_collective_price = is_float($request->old_collective_price) ? $request->old_collective_price : number_format((float)$request->old_collective_price, 2, '.', '');
            }else{
                $old_collective_price = '0';
            }
            $product->old_collective_price = $old_collective_price;
            $product->current_collective_price = is_float($request->current_collective_price) ? $request->current_collective_price : number_format((float)$request->current_collective_price, 2, '.', '');
            if($request->old_delivery_price !=null && $request->old_delivery_price >='1'){
                $old_delivery_price = is_float($request->old_delivery_price) ? $request->old_delivery_price : number_format((float)$request->old_delivery_price, 2, '.', '');
            }else{
                $old_delivery_price = '0';
            }
            $product->old_delivery_price = $old_delivery_price;
            $product->current_delivery_price = is_float($request->current_delivery_price) ? $request->current_delivery_price : number_format((float)$request->current_delivery_price, 2, '.', '');
            $product->product_code = $request->product_code;
            $product->status = $request->status;
            $product->vat = $request->vat;
            $product->stock_status = $request->stock_status;
            $product->product_tag = $request->product_tag;
            $product->occation_remeaning = $request->occation_remeaning;
            $product->occation_description = $request->occation_description;
            $product->ingredient = $request->ingredient;
            $product->nutrition_value = $request->nutrition_value;
            $product->allergy_advice = $request->allergy_advice;
            $product->updated_by = Auth::user()->id;
            if(isset($request->product_status)){
                $product->product_status = implode(',', $request->product_status);
            }else{
                $product->product_status = null;
            }
            $img = $request->file('image');
            if ($img) {
                @unlink(public_path('upload/product_images/'.$product->image));
                $imgName = date('YmdHi').$img->getClientOriginalName();
                $img->move('public/upload/product_images/', $imgName);
                $img = Image::make(public_path('upload/product_images/').$imgName);
                $img->resize(640,640)->save(public_path('upload/product_images/').$imgName);
                $product['image'] = $imgName;
            }
            if($product->save()){
                //product-sub-image-table-data-insert
                $files = $request->file('gallery_image');
                if(!empty($files)){
                   foreach ($files as $file) {
                        $imgName1 = date('YmdHi').$file->getClientOriginalName();
                        $file->move('public/upload/product_sub_images', $imgName1);
                        $file = Image::make(public_path('upload/product_sub_images/').$imgName1);
                        $file->resize(640,640)->save(public_path('upload/product_sub_images/').$imgName1);
                        $subimage['gallery_image'] = $imgName1;

                        $subimage = new ProductSubImage();
                        $subimage->product_id = $product->id;
                        $subimage->gallery_image = $imgName1;
                        $subimage->save();
                    }
                }
                //Brand-table-data-update
                $brands = $request->brand_id;
                if(!empty($brands)){
                   ProductBrand::where('product_id',$id)->delete();
                }
                if(!empty($brands)){
                    foreach ($brands as $brand) {
                        $mybrand = new ProductBrand();
                        $mybrand->product_id = $product->id;
                        $mybrand->brand_id = $brand;
                        $mybrand->save();
                    }
                }
                //Size-table-data-update

                // $sizes = $request->size_id;
                // if(!empty($sizes)){
                //    ProductSize::where('product_id',$id)->delete();
                // }
                // if(!empty($sizes)){
                //     foreach ($sizes as $size) {
                //         $mysize = new ProductSize();
                //         $mysize->product_id = $product->id;
                //         $mysize->size_id = $size;
                //         $mysize->save();
                //     }
                // }
            }
        });


        return redirect()->route('products.view')->with('success','Data Updated successfully');
    }

    public function delete(Request $request){
        $product = Product::find($request->id);
        if (file_exists('public/upload/product_images/'.$product->image) AND ! empty($product->image)) {
            unlink('public/upload/product_images/'.$product->image);
        }
        $subImage = ProductSubImage::where('product_id',$product->id)->get()->toArray();
        if(!empty($subImage)){
            foreach ($subImage as $value) {
                if(!empty($value)){
                    unlink('public/upload/product_sub_images/'.$value['gallery_image']);
                }
            }
        }
        ProductSubImage::where('product_id',$product->id)->delete();
        ProductBrand::where('product_id',$product->id)->delete();
        $product->delete();
        return redirect()->route('products.view')->with('success','Data Deleted successfully');
    }

    public function deleteImg(Request $request){
        $gallery_img = ProductSubImage::find($request->id);
        if (file_exists('public/upload/product_sub_images/'.$gallery_img->gallery_image) AND ! empty($gallery_img->gallery_image)) {
            unlink('public/upload/product_sub_images/'.$gallery_img->gallery_image);
        }
        $gallery_img->delete();
        return redirect()->back()->with('success','Data Deleted successfully');
    }

    public function details($id){
        $data['product'] = Product::with(['product_img'])->find($id);
        return view('backend.product.product-details',$data);
    }
}
