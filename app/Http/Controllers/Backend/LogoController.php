<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Logo;
use Image;

class LogoController extends Controller
{
    public function view(){
        if(Auth::user()->role=='admin'){
            $data['countLogo'] = Logo::count();
        	$data['allData'] = Logo::all();
        	return view('backend.logo.view-logo',$data);
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function add(){
        if(Auth::user()->role=='admin'){
        	return view('backend.logo.add-logo');
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function store(Request $request){
    	$data = new Logo();
    	$data->created_by = Auth::user()->id;
    	if ($request->file('image')){
		    $file = $request->file('image');
		    $filename =date('YmdHi').$file->getClientOriginalName();
		    $file->move(public_path('upload/logo_images'), $filename);
            $file = Image::make(public_path('upload/logo_images/').$filename);
            $file->resize(134,100)->save(public_path('upload/logo_images/').$filename);
		    $data['image']= $filename;
		}
    	$data->save();
    	return redirect()->route('site-setting.logo.view')->with('success','Data Inserted successfully');
    }

    public function edit($id){
        if(Auth::user()->role=='admin'){
            $editData = Logo::find($id);
            return view('backend.logo.edit-logo',compact('editData'));
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function update(Request $request,$id){
        $data = Logo::find($id);
        $data->updated_by = Auth::user()->id;
    	if ($request->file('image')){
		    $file = $request->file('image');
		    @unlink(public_path('upload/logo_images/'.$data->image));
		    $filename =date('YmdHi').$file->getClientOriginalName();
		    $file->move(public_path('upload/logo_images'), $filename);
            $file = Image::make(public_path('upload/logo_images/').$filename);
            $file->resize(134,100)->save(public_path('upload/logo_images/').$filename);
		    $data['image']= $filename;
		}
    	$data->save();
        return redirect()->route('site-setting.logo.view')->with('success','Data updated successfully');
    }

    public function delete(Request $request){
        $logo = Logo::find($request->id);
        if (file_exists('public/upload/logo_images/' . $logo->image) AND ! empty($logo->image)) {
            unlink('public/upload/logo_images/' . $logo->image);
        }
        $logo->delete();
        return redirect()->route('site-setting.logo.view')->with('success','Data Deleted successfully');
    }
}
