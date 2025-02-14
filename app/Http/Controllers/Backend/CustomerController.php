<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Auth;
use Image;
use DB;
use PDF;

class CustomerController extends Controller
{
    public function view(){
        if(Auth::user()->role=='admin'){
            $data['allData'] = User::orderBy('member_id','desc')->where('usertype','customer')->get();
            return view('backend.customer.view-customer',$data);
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function EditorView(){
        if(Auth::user()->role=='admin'){
            $data['allData'] = User::where('usertype','customer')->orderBy('member_id','desc')->get();
            return view('backend.customer.view-customer-editor',$data);
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function viewerView(){
        if(Auth::user()->role=='admin'){
            $data['allData'] = User::where('usertype','customer')->orderBy('member_id','desc')->get();
            return view('backend.customer.view-customer-viewer',$data);
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }
    
    
    public function detailsView($id){
        if(Auth::user()->role=='admin'){
            $data['allData'] = User::where('id',$id)->where('usertype','customer')->first();
            return view('backend.customer.details-view-customer',$data);
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }  

    public function memberCard($id){      
        $data['allData'] = User::where('id',$id)->where('usertype','customer')->first();
        $pdf = PDF::loadView('backend.customer.member-card', $data)->setOptions(['defaultFont' => 'sans-serif']);    

        return $pdf->download('member.pdf');
    } 

    public function vendorView(){
        if(Auth::user()->role == 'admin'){
            $data['allData'] = User::where('role','vendor')->get();
        }elseif (Auth::user()->role == 'vendor') {
            $data['allData'] = User::where('id',Auth::user()->id)->where('status','1')->get();
        }
        return view('backend.vendor.view-vendor',$data);
    }

    public function vendorEdit(Request $request){
        $data['editData'] = User::where('id',Auth::user()->id)->first();
        return view('backend.vendor.edit-vendor',$data);
    }

    public function vendorUpdate(Request $request){
        $user = User::where('id',Auth::user()->id)->first();
        $this->validate($request,[
            'name' => 'required',
            'store_address' => 'required',
            'store_name' => 'required|unique:users,store_name,'.$user->id,
            'email' => 'required|unique:users,email,'.$user->id
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->store_name = $request->store_name;
        $user->store_address = $request->store_address;
        $user->map_link = $request->map_link;
        $user->slug = str_slug($request->store_name);
        $img = $request->file('store_logo');
        if ($img) {
            @unlink(public_path('upload/store_images/'.$user->store_logo));
            $imgName = date('YmdHi').$img->getClientOriginalName();
            $img->move('public/upload/store_images/', $imgName);
            $img = Image::make(public_path('upload/store_images/').$imgName);
            $img->resize(200,200)->save(public_path('upload/store_images/').$imgName);
            $user['store_logo'] = $imgName;
        }
        $user->save();

        return redirect()->route('vendors.view')->with('success','Data updated successfully');
    }

    public function vendorApprove($id){
        $data['editData'] = User::find($id);
        return view('backend.vendor.approve_vendor',$data);
    }

    public function vendorApproveStore(Request $request,$id){
        $user = User::find($id);
        $user->status = $request->status;
        $user->save();

        return redirect()->route('vendors.view')->with('success','Status updated successfully');
    }

    public function drafView(){
    	$allData = User::where('usertype','customer')->where('status','0')->get();
    	return view('backend.customer.draft-customer',compact('allData'));
    }

    public function delete(Request $request){
    	$customer = User::find($request->id);
    	if (file_exists('public/upload/user_images/' . $customer->image) AND ! empty($customer->image)) {
            unlink('public/upload/user_images/' . $customer->image);
        }
    	$customer->delete();
    	return redirect()->route('customers.draft.view')->with('success','Data deleted successfully');
    }

    public function inactive($id){
        DB::table('users')
                ->where('id', $id)
                ->update(['status' => 0]);
        return redirect()->route('customers.view')->with('success','Well done! status updated');
    }

    public function active($id){
        DB::table('users')
                ->where('id', $id)
                ->update(['status' => 1]);
        return redirect()->route('customers.view')->with('success','Well done! status updated');
    }
}
