<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QrcodeModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Response;

class QrcodeController extends Controller
{

    public function view(){
        $data['allData'] = QrcodeModel::orderBy('id','desc')->get();      
        return view('backend.qrcode.view-qrcode',$data);
    }   

    public function add(){
        return view('backend.qrcode.add-qrcode');
    }

    public function store(Request $request){
        $this->validate($request,[
            'portal_name' => 'required',
            'portal_link' => 'required'
        ]);
        $data = new QrcodeModel();
        $data->portal_name = $request->portal_name;
        $data->portal_link = $request->portal_link;      
        $data->note = $request->note;
        $data->created_by = Auth::user()->id;
        $data->save();
        return redirect()->route('qrcodes.view')->with('success','Data Inserted successfully');
    }

    public function edit($id){
        $editData = QrcodeModel::find($id);
        return view('backend.qrcode.add-qrcode',compact('editData'));
    }

    public function update(Request $request,$id){
        $data = QrcodeModel::find($id);
        // $this->validate($request,[
        //     'portal_name'      => 'required,'.$data->id
        // ]);
        $data->portal_name = $request->portal_name;
        $data->portal_link = $request->portal_link;    
        $data->note = $request->note;
        $data->updated_by = Auth::user()->id;
        $data->save();
        return redirect()->route('qrcodes.view')->with('success','Data updated successfully');
    }

    public function delete(Request $request){
        $data = QrcodeModel::find($request->id);
        $data->delete();
        return redirect()->route('qrcodes.view')->with('success','Data Deleted successfully');
    }

    public function inactive($id)
    {
        DB::table('qrcodes')
            ->where('id', $id)
            ->update(['status' => 0]);
        return redirect()->route('qrcodes.view')->with('success', 'Well done! status updated');
    }

    public function active($id)
    {
        DB::table('qrcodes')
            ->where('id', $id)
            ->update(['status' => 1]);
        return redirect()->route('qrcodes.view')->with('success', 'Well done! status updated');
    }

    public function QrcodeDownload($id)
    {
        $portal = QrcodeModel::where('id', $id)->first();
        $portal_link = $portal->portal_link;
        //dd($portal_link);
        $qrCode = QrCode::format('png')->size(300)->generate($portal_link);

        return Response::make($qrCode, 200, [
            'Content-Type' => 'image/png',
            'Content-Disposition' => 'attachment; filename="qrcode.png"',
        ]);


    }


}
