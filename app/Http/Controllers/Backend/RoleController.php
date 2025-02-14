<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use DB;
use Auth;

class RoleController extends Controller
{
    public function view(){
        if(Auth::user()->role=='admin'){
        	$data['allData'] = Role::all();
        	return view('backend.user.view-role',$data);
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function add(){
        if(Auth::user()->role=='admin'){
        	return view('backend.user.add-role');
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function store(Request $request){
    	$this->validate($request,[
    		'role_name' => 'required|unique:roles,role_name'
    	]);
    	$data = new Role();
    	$data->role_name = $request->role_name;
    	$data->created_by = Auth::user()->id;
    	$data->save();
    	return redirect()->route('users.role.view')->with('success','Data Inserted successfully');
    }

    public function edit($id){
        if(Auth::user()->role=='admin'){
            $editData = Role::find($id);
            return view('backend.user.add-role',compact('editData'));
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function update(Request $request,$id){
        $data = Role::find($id);
        $this->validate($request,[
    		'role_name' => 'required|unique:roles,role_name,'.$data->id
    	]);
    	$data->role_name = $request->role_name;
        $data->updated_by = Auth::user()->id;
    	$data->save();
        return redirect()->route('users.role.view')->with('success','Data updated successfully');
    }

    public function delete(Request $request){
        $data = Role::find($request->id);
        $data->delete();
        return redirect()->route('users.role.view')->with('success','Data Deleted successfully');
    }
}
