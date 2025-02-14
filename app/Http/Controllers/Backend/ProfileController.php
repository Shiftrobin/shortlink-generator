<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Image;

class ProfileController extends Controller
{
    public function view(){
    	$id = Auth::user()->id;
    	$user = User::find($id);
    	return view('backend.user.view-profile',compact('user'));
    }

    public function edit(){
    	$id = Auth::user()->id;
    	$editData = User::find($id);
    	return view('backend.user.edit-profile',compact('editData'));
    }

    public function update(Request $request){
    	$data = User::find(Auth::user()->id);
        $this->validate($request,[
            'email'=>'required|unique:users,email,'.$data->id
        ]);
        $data->email = $request->email;
        $data->name = $request->name;
        $data->address = $request->address;
        $data->gender = $request->gender;
        $img = $request->file('image');
        if ($img) {
            @unlink(public_path('upload/user_images/'.$data->image));
            $imgName = date('YmdHi').$img->getClientOriginalName();
            $img->move('public/upload/user_images/', $imgName);
            $img = Image::make(public_path('upload/user_images/').$imgName);
            $img->resize(300,300)->save(public_path('upload/user_images/').$imgName);
            $data['image'] = $imgName;
        }
        $data->save();
        return redirect()->route('profiles.view')->with('success','Profile updated successfully');
    }

    public function passwordView(){
        return view('backend.user.edit-password');
    }

    public function passwordUpdate(Request $request){
        if(Auth::attempt(['id'=>Auth::user()->id,'password'=>$request->current_password])){
            $user = User::find(Auth::user()->id);
            $user->password = bcrypt($request->new_password);
            $user->save();
            return redirect()->route('profiles.view')->with('success','Password changed successfully');
        }else{
            return redirect()->back()->with('error','Sorry! your current password dost not match');
        }
    }
}
