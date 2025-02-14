<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Size;
use DB;
use Auth;
use App\Http\Requests\SizeRequest;

class SizeController extends Controller
{
    public function view(){
    	$data['allData'] = Size::all();
    	return view('backend.size.view-size',$data);
    }

    public function add(){
    	return view('backend.size.add-size');
    }

    public function store(Request $request){
    	$this->validate($request,[
    		'name' => 'required|unique:sizes,name'
    	]);
    	$data = new Size();
    	$data->name = $request->name;
    	$data->created_by = Auth::user()->id;
    	$data->save();
    	return redirect()->route('setups.sizes.view')->with('success','Data Inserted successfully');
    }

    public function edit($id){
        $editData = Size::find($id);
        return view('backend.size.add-size',compact('editData'));
    }

    public function update(Request $request,$id){
        $data = Size::find($id);
        $this->validate($request,[
            'name'      => 'required|unique:sizes,name,'.$data->id
        ]);
    	$data->name = $request->name;
        $data->updated_by = Auth::user()->id;
    	$data->save();
        return redirect()->route('setups.sizes.view')->with('success','Data updated successfully');
    }

    public function delete(Request $request){
        $data = Size::find($request->id);
        $data->delete();
        return redirect()->route('setups.sizes.view')->with('success','Data Deleted successfully');
    }
}
