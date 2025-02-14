<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shortlink;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Str;

class ShortlinkController extends Controller
{
    public function view(){
        $data['allData'] = Shortlink::orderBy('id','desc')->get();
        return view('backend.shortlink.view-shortlink',$data);
    }

    public function add(){
        return view('backend.shortlink.add-shortlink');
    }

    public function store(Request $request){
        $this->validate($request,[
            'link' => 'required|url',
        ]);
        $data = new Shortlink();
        $data->link = $request->link;
        $data->code = Str::random(6);
        $data->note = $request->note;
        $data->created_by = Auth::user()->id;
        $data->save();
        return redirect()->route('shortlinks.view')->with('success','Data Inserted successfully');
    }

    public function edit($id){
        $editData = Shortlink::find($id);
        return view('backend.shortlink.add-shortlink',compact('editData'));
    }

    public function update(Request $request,$id){
        $data = Shortlink::find($id);
        // $this->validate($request,[
        //     'portal_name'      => 'required,'.$data->id
        // ]);
        $data->link = $request->link;
        $data->code = Str::random(6);
        $data->note = $request->note;
        $data->updated_by = Auth::user()->id;
        $data->save();
        return redirect()->route('shortlinks.view')->with('success','Data updated successfully');
    }

    public function delete(Request $request){
        $data = Shortlink::find($request->id);
        $data->delete();
        return redirect()->route('shortlinks.view')->with('success','Data Deleted successfully');
    }

    public function inactive($id)
    {
        DB::table('shortlinks')
            ->where('id', $id)
            ->update(['status' => 0]);
        return redirect()->route('shortlinks.view')->with('success', 'Well done! status updated');
    }

    public function active($id)
    {
        DB::table('shortlinks')
            ->where('id', $id)
            ->update(['status' => 1]);
        return redirect()->route('shortlinks.view')->with('success', 'Well done! status updated');
    }

    public function ShortenLink($code){

       $find = Shortlink::where('code', $code)->first();

       return redirect($find->link);

    }



}
