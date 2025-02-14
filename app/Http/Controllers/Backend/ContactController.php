<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Contact;
use App\Models\Communicate;

class ContactController extends Controller
{
    public function view(){
        if(Auth::user()->role=='admin'){
            $data['countContact'] = Contact::count();
        	$data['allData'] = Contact::all();
        	return view('backend.contact.view-contact',$data);
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function add(){
        if(Auth::user()->role=='admin'){
        	return view('backend.contact.add-contact');
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function store(Request $request){
    	$data = new Contact();
    	$data->address = $request->address;
    	$data->mobile_no = $request->mobile_no;
    	$data->email = $request->email;
    	$data->facebook = $request->facebook;
    	$data->twitter = $request->twitter;
    	$data->linkedin = $request->linkedin;
    	$data->instagram = $request->instagram;
    	$data->created_by = Auth::user()->id;
    	$data->save();
    	return redirect()->route('site-setting.contact.view')->with('success','Data Inserted successfully');
    }

    public function edit($id){
        if(Auth::user()->role=='admin'){
            $editData = Contact::find($id);
            return view('backend.contact.edit-contact',compact('editData'));
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function update(Request $request,$id){
        $data = Contact::find($id);
        $data->address = $request->address;
    	$data->mobile_no = $request->mobile_no;
    	$data->email = $request->email;
    	$data->facebook = $request->facebook;
    	$data->twitter = $request->twitter;
    	$data->linkedin = $request->linkedin;
    	$data->instagram = $request->instagram;
        $data->updated_by = Auth::user()->id;
    	$data->save();
        return redirect()->route('site-setting.contact.view')->with('success','Data updated successfully');
    }

    public function delete(Request $request){
        $contact = Contact::find($request->id);
        $contact->delete();
        return redirect()->route('site-setting.contact.view')->with('success','Data Deleted successfully');
    }

    public function viewCommunicate(){
        if(Auth::user()->role=='admin'){
            $allData = Communicate::orderBy('id','desc')->get();
            return view('backend.contact.view-communicate',compact('allData'));
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function deleteCommunicate(Request $request){
        $communicate = Communicate::find($request->id);
        $communicate->delete();
        return redirect()->route('site-setting.communicate.view')->with('success','Data deleted successfully');
    }
}
