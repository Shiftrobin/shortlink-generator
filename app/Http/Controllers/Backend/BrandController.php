<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use DB;
use Auth;
use App\Http\Requests\BrandRequest;
use Image;

class BrandController extends Controller
{
    public function view(){
    	$data['allData'] = Brand::all();
    	return view('backend.brand.view-brand',$data);
    }

    public function add(){
    	return view('backend.brand.add-brand');
    }

    public function store(Request $request){
    	$this->validate($request,[
    		'name' => 'required|unique:brands,name'
    	]);
    	$data = new Brand();
    	$data->name = $request->name;
        if ($request->file('image')){
            $file = $request->file('image');
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/brand_image'), $filename);
            $file = Image::make(public_path('upload/brand_image/').$filename);
            $file->resize(120,120)->save(public_path('upload/brand_image/').$filename);
            $data['image']= $filename;
        }
    	$data->created_by = Auth::user()->id;
    	$data->save();
    	return redirect()->route('setups.brands.view')->with('success','Data Inserted successfully');
    }

    public function edit($id){
        $editData = Brand::find($id);
        return view('backend.brand.add-brand',compact('editData'));
    }

    public function update(Request $request,$id){
        $data = Brand::find($id);
        $this->validate($request,[
            'name'      => 'required|unique:brands,name,'.$data->id
        ]);
    	$data->name = $request->name;
        if ($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/brand_image/'.$data->image));
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/brand_image'), $filename);
            $file = Image::make(public_path('upload/brand_image/').$filename);
            $file->resize(120,120)->save(public_path('upload/brand_image/').$filename);
            $data['image']= $filename;
        }
        $data->updated_by = Auth::user()->id;
    	$data->save();
        return redirect()->route('setups.brands.view')->with('success','Data updated successfully');
    }

    public function delete(Request $request){
        $data = Brand::find($request->id);
        if (file_exists('public/upload/brand_image/' . $data->image) AND ! empty($data->image)) {
            unlink('public/upload/brand_image/' . $data->image);
        }
        $data->delete();
        return redirect()->route('setups.brands.view')->with('success','Data Deleted successfully');
    }
}
