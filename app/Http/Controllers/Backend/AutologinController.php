<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AutologinModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AutologinController extends Controller
{
    public function view(){
    	$data['allData'] = AutologinModel::all();
    	return view('backend.autologin.view-autologin',$data);
    }

    public function AdminView(){
    	$data['allData'] = AutologinModel::all();
    	return view('backend.autologin.admin-view-autologin',$data);
    }

    public function add(){
    	return view('backend.autologin.add-autologin');
    }

    public function store(Request $request){
    	$this->validate($request,[
    		'portal_name' => 'required'
    	]);
    	$data = new AutologinModel();
    	$data->portal_name = $request->portal_name;
        $data->portal_link = $request->portal_link;
        $data->username = $request->username;
        $data->password = $request->password;
        $data->note = $request->note;
    	$data->created_by = Auth::user()->id;
    	$data->save();
    	return redirect()->route('autologins.admin.view')->with('success','Data Inserted successfully');
    }

    public function edit($id){
        $editData = AutologinModel::find($id);
        return view('backend.autologin.add-autologin',compact('editData'));
    }

    public function update(Request $request,$id){
        $data = AutologinModel::find($id);
        // $this->validate($request,[
        //     'portal_name'      => 'required,'.$data->id
        // ]);
    	$data->portal_name = $request->portal_name;
        $data->portal_link = $request->portal_link;
        $data->username = $request->username;
        $data->password = $request->password;
        $data->note = $request->note;
        $data->updated_by = Auth::user()->id;
    	$data->save();
        return redirect()->route('autologins.admin.view')->with('success','Data updated successfully');
    }

    public function delete(Request $request){
        $data = AutologinModel::find($request->id);
        $data->delete();
        return redirect()->route('autologins.admin.view')->with('success','Data Deleted successfully');
    }

    public function inactive($id)
    {
        DB::table('autologins')
            ->where('id', $id)
            ->update(['status' => 0]);
        return redirect()->route('autologins.admin.view')->with('success', 'Well done! status updated');
    }

    public function active($id)
    {
        DB::table('autologins')
            ->where('id', $id)
            ->update(['status' => 1]);
        return redirect()->route('autologins.admin.view')->with('success', 'Well done! status updated');
    }
}
