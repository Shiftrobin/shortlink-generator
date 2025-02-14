<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use DB;
use Auth;
use Image;

class ServiceController extends Controller
{
    public function view(){
    	$data['allData'] = Service::all();
    	return view('backend.service.view-service',$data);
    }

    public function add(){
    	return view('backend.service.add-service');
    }

    public function store(Request $request){
    	$data = new Service();
        $data->title = $request->title;
        $data->description = $request->description;
    	$data->created_by = Auth::user()->id;
        if ($request->file('image')){
            $file = $request->file('image');
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/service_images'), $filename);
            $file = Image::make(public_path('upload/service_images/').$filename);
            $file->resize(702,505)->save(public_path('upload/service_images/').$filename);
            $data['image']= $filename;
        }
    	$data->save();
    	return redirect()->route('services.view')->with('success','Data Inserted successfully');
    }

    public function edit($id){
        $editData = Service::find($id);
        return view('backend.service.add-service',compact('editData'));
    }

    public function update(Request $request,$id){
    	$data = Service::find($id);
        $data->title = $request->title;
    	$data->description = $request->description;
        $data->updated_by = Auth::user()->id;
        if ($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/service_images/'.$data->image));
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/service_images'), $filename);
            $file = Image::make(public_path('upload/service_images/').$filename);
            $file->resize(702,505)->save(public_path('upload/service_images/').$filename);
            $data['image']= $filename;
        }
    	$data->save();
        return redirect()->route('services.view')->with('success','Data updated successfully');
    }

    public function delete(Request $request){
        $data = Service::find($request->id);
        if (file_exists('public/upload/service_images/' . $data->image) AND ! empty($data->image)) {
            unlink('public/upload/service_images/' . $data->image);
        }
        $data->delete();
        return redirect()->route('services.view')->with('success','Data Deleted successfully');
    }
}
