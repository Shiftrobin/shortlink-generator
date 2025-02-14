<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;
use DB;
use Auth;
use App\Http\Requests\ColorRequest;

class UnitController extends Controller
{
    public function view(){
    	$data['allData'] = Unit::all();
    	return view('backend.unit.unit_view',$data);
    }

    public function add(){
    	return view('backend.unit.unit_add');
    }

    public function store(Request $request){
    	$this->validate($request,[
    		'name' => 'required|unique:units,name'
    	]);
    	$data = new Unit();
    	$data->name = $request->name;
    	$data->created_by = Auth::user()->id;
    	$data->save();
    	return redirect()->route('setups.units.view')->with('success','Data Inserted successfully');
    }

    public function edit($id){
        $editData = Unit::find($id);
        return view('backend.unit.unit_add',compact('editData'));
    }

    public function update(Request $request,$id){
        $data = Unit::find($id);
        $this->validate($request,[
            'name' => 'required|unique:units,name,'.$data->id
        ]);
    	$data->name = $request->name;
        $data->updated_by = Auth::user()->id;
    	$data->save();
        return redirect()->route('setups.units.view')->with('success','Data updated successfully');
    }

    public function delete(Request $request){
        $data = Unit::find($request->id);
        $data->delete();
        return redirect()->route('setups.units.view')->with('success','Data Deleted successfully');
    }
}
