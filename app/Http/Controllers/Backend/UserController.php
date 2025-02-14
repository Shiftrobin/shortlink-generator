<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Auth;

class UserController extends Controller
{
    public function view(){
        if(Auth::user()->role=='admin'){
        	$data['allData'] = User::where('role','admin')->get();
        	return view('backend.user.view-user',$data);
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function add(){
        if(Auth::user()->role=='admin'){
            $data['roles'] = Role::all();
        	return view('backend.user.add-user',$data);
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function store(Request $request){
    	$this->validate($request,[
    		'email'=>'required|unique:users,email',
            'username'=>'required|unique:users,username'
    	]);

      //  $member_serial = User::latest('member_id')->first();
      //  dd($member_serial );
        // $member_id = 1;
        // $member_id += $member_serial;
        // dd($member_id);

    	$data = new User();
    	$data->usertype = 'admin';
        $data->role = 'admin';
        $data->role_id = $request->role_id;
    	$data->username = $request->username;
    	$data->email = $request->email;
        $data->status = $request->status;
    	$data->password = bcrypt($request->password);
    	$data->save();
    	return redirect()->route('users.view')->with('success','Data Inserted successfully');
    }

    public function edit($id){
        if(Auth::user()->role=='admin'){
            $data['editData'] = User::find($id);
            $data['roles'] = Role::all();
            return view('backend.user.edit-user',$data);
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function update(Request $request,$id){
        $data = User::find($id);
        $this->validate($request,[
            'email'=>'required|unique:users,email,'.$data->id,
            'username'=>'required|unique:users,username,'.$data->id
        ]);
        $data->role_id = $request->role_id;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->status = $request->status;
        $data->save();
        return redirect()->route('users.view')->with('success','Data updated successfully');
    }

    public function delete(Request $request){
        $user = User::find($request->id);
        if (file_exists('public/upload/user_images/' . $user->image) AND ! empty($user->image)) {
            unlink('public/upload/user_images/' . $user->image);
        }
        $user->delete();
        return redirect()->route('users.view')->with('success','Data Deleted successfully');
    }
}
