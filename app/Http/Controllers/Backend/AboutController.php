<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\About;

class AboutController extends Controller
{
    public function view(){
        if(Auth::user()->role=='admin'){
            $data['countAbout'] = About::count();
        	$data['allData'] = About::all();
        	return view('backend.about.view-about',$data);
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function add(){
        if(Auth::user()->role=='admin'){
            return view('backend.about.add-about');
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function store(Request $request){
    	$data = new About();
    	$data->description = $request->description;
    	$data->created_by = Auth::user()->id;
        // if ($request->file('image')){
        //     $file = $request->file('image');
        //     $filename =date('YmdHi').$file->getClientOriginalName();
        //     $file->move(public_path('upload/about_images'), $filename);
        //     $data['image']= $filename;
        // }
    	$data->save();
    	return redirect()->route('site-setting.about.view')->with('success','Data Inserted successfully');
    }

    public function edit($id){
        if(Auth::user()->role=='admin'){
            $editData = About::find($id);
            return view('backend.about.edit-about',compact('editData'));
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function update(Request $request,$id){
        $data = About::find($id);
    	$data->description = $request->description;
        $data->updated_by = Auth::user()->id;
        // if ($request->file('image')){
        //     $file = $request->file('image');
        //     @unlink(public_path('upload/about_images/'.$data->image));
        //     $filename =date('YmdHi').$file->getClientOriginalName();
        //     $file->move(public_path('upload/about_images'), $filename);
        //     $data['image']= $filename;
        // }
    	$data->save();
        return redirect()->route('site-setting.about.view')->with('success','Data updated successfully');
    }

    public function delete(Request $request){
        $about = About::find($request->id);
        // if (file_exists('public/upload/about_images/' . $about->image) AND ! empty($about->image)) {
        //     unlink('public/upload/about_images/' . $about->image);
        // }
        $about->delete();
        return redirect()->route('site-setting.about.view')->with('success','Data Deleted successfully');
    }
}
