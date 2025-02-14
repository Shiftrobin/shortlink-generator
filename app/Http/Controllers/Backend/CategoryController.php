<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use DB;
use Auth;
use App\Http\Requests\CategoryRequest;
use Image;

class CategoryController extends Controller
{
    public function view(){
        if(Auth::user()->role=='admin'){
            $data['allData'] = Category::all();
            return view('backend.category.view-category',$data);
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function add(){
        if(Auth::user()->role=='admin'){
        	return view('backend.category.add-category');
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function store(Request $request){
    	$this->validate($request,[
    		'name' => 'required|unique:categories,name'
    	]);
    	$data = new Category();
    	$data->name = $request->name;
        $data->status = $request->status;
    	$data->created_by = Auth::user()->id;
        if ($request->file('image')){
            $file = $request->file('image');
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/category_images'), $filename);
            $file = Image::make(public_path('upload/category_images/').$filename);
            $file->resize(640,640)->save(public_path('upload/category_images/').$filename);
            $data['image']= $filename;
        }
    	$data->save();
    	return redirect()->route('categories.view')->with('success','Data Inserted successfully');
    }

    public function edit($id){
        if(Auth::user()->role=='admin'){
            $editData = Category::find($id);
            return view('backend.category.add-category',compact('editData'));
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function update(Request $request,$id){
        $data = Category::find($id);
        $this->validate($request,[
            'name'      => 'required|unique:categories,name,'.$data->id
        ]);
    	$data->name = $request->name;
        $data->status = $request->status;
        $data->updated_by = Auth::user()->id;
        if ($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/category_images/'.$data->image));
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/category_images'), $filename);
            $file = Image::make(public_path('upload/category_images/').$filename);
            $file->resize(640,640)->save(public_path('upload/category_images/').$filename);
            $data['image']= $filename;
        }
    	$data->save();
        return redirect()->route('categories.view')->with('success','Data updated successfully');
    }

    public function delete(Request $request){
        $category = Category::find($request->id);
        if (file_exists('public/upload/category_images/' . $category->image) AND ! empty($category->image)) {
            unlink('public/upload/category_images/' . $category->image);
        }
        $category->delete();
        return redirect()->route('categories.view')->with('success','Data Deleted successfully');
    }

    //Sub Category

    public function subCategoryView(){
        if(Auth::user()->role=='admin'){
            $data['allData'] = SubCategory::orderBy('id','desc')->get();
            return view('backend.category.sub_category_view',$data);
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function subCategoryAdd(){
        if(Auth::user()->role=='admin'){
            $data['categories'] = Category::all();
            return view('backend.category.sub_category_add',$data);
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function subCategoryStore(Request $request){
        $this->validate($request,[
            'name' => 'required|unique:sub_categories,name'
        ]);
        $data = new SubCategory();
        $data->category_id = $request->category_id;
        $data->name = $request->name;
        $data->status = $request->status;
        $data->created_by = Auth::user()->id;
        if ($request->file('image')){
            $file = $request->file('image');
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/sub_category_images'), $filename);
            $file = Image::make(public_path('upload/sub_category_images/').$filename);
            $file->resize(640,640)->save(public_path('upload/sub_category_images/').$filename);
            $data['image']= $filename;
        }
        $data->save();
        return redirect()->route('categories.sub.category.view')->with('success','Data Inserted successfully');
    }

    public function subCategoryEdit($id){
        if(Auth::user()->role=='admin'){
            $data['editData'] = SubCategory::find($id);
            $data['categories'] = Category::all();
            return view('backend.category.sub_category_add',$data);
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function subCategoryUpdate(Request $request,$id){
        $data = SubCategory::find($id);
        $this->validate($request,[
            'name'      => 'required|unique:sub_categories,name,'.$data->id
        ]);
        $data->category_id = $request->category_id;
        $data->name = $request->name;
        $data->status = $request->status;
        $data->updated_by = Auth::user()->id;
        if ($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/sub_category_images/'.$data->image));
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/sub_category_images'), $filename);
            $file = Image::make(public_path('upload/sub_category_images/').$filename);
            $file->resize(640,640)->save(public_path('upload/sub_category_images/').$filename);
            $data['image']= $filename;
        }
        $data->save();
        return redirect()->route('categories.sub.category.view')->with('success','Data updated successfully');
    }

    public function subCategoryDelete(Request $request){
        $category = SubCategory::find($request->id);
        if (file_exists('public/upload/sub_category_images/' . $category->image) AND ! empty($category->image)) {
            unlink('public/upload/sub_category_images/' . $category->image);
        }
        $category->delete();
        return redirect()->route('categories.sub.category.view')->with('success','Data Deleted successfully');
    }
}
