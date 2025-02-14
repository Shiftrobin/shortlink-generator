<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Slider;
use Image;

class SliderController extends Controller
{
    public function view(){
        if(Auth::user()->role=='admin'){
        	$data['allData'] = Slider::all();
        	return view('backend.slider.view-slider',$data);
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function add(){
        if(Auth::user()->role=='admin'){
        	return view('backend.slider.add-slider');
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function store(Request $request){
    	$data = new Slider();
        $data->short_title = $request->short_title;
        $data->long_title = $request->long_title;
        $data->button_text = $request->button_text;
        $data->link = $request->link;
    	$data->created_by = Auth::user()->id;
    	if ($request->file('image')){
		    $file = $request->file('image');
		    $filename =date('YmdHi').$file->getClientOriginalName();
		    $file->move(public_path('upload/slider_images'), $filename);
            $file = Image::make(public_path('upload/slider_images/').$filename);
            $file->resize(1920,620)->save(public_path('upload/slider_images/').$filename);
		    $data['image']= $filename;
		}
    	$data->save();
    	return redirect()->route('site-setting.slider.view')->with('success','Data Inserted successfully');
    }

    public function edit($id){
        if(Auth::user()->role=='admin'){
            $editData = Slider::find($id);
            return view('backend.slider.edit-slider',compact('editData'));
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function update(Request $request,$id){
        $data = Slider::find($id);
        $data->short_title = $request->short_title;
        $data->long_title = $request->long_title;
        $data->button_text = $request->button_text;
        $data->link = $request->link;
        $data->updated_by = Auth::user()->id;
    	if ($request->file('image')){
		    $file = $request->file('image');
		    @unlink(public_path('upload/slider_images/'.$data->image));
		    $filename =date('YmdHi').$file->getClientOriginalName();
		    $file->move(public_path('upload/slider_images'), $filename);
            $file = Image::make(public_path('upload/slider_images/').$filename);
            $file->resize(1920,620)->save(public_path('upload/slider_images/').$filename);
		    $data['image']= $filename;
		}
    	$data->save();
        return redirect()->route('site-setting.slider.view')->with('success','Data updated successfully');
    }

    public function delete(Request $request){
        $slider = Slider::find($request->id);
        if (file_exists('public/upload/slider_images/' . $slider->image) AND ! empty($slider->image)) {
            unlink('public/upload/slider_images/' . $slider->image);
        }
        $slider->delete();
        return redirect()->route('site-setting.slider.view')->with('success','Data Deleted successfully');
    }
}
