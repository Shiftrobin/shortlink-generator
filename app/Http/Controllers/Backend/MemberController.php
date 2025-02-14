<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Image;
use DB;

class MemberController extends Controller
{
    public function view()
    {
        if (Auth::user()->role == 'admin') {
            $data['allData'] = User::orderBy('id', 'desc')->where('usertype', 'customer')->get();
            return view('backend.member.view-member', $data);
        } else {
            return back()->with('error', 'Sorry! you do not access this menu');
        }
    }

    public function delete(Request $request)
    {
        $member = User::find($request->id);
        if (file_exists('public/upload/member_images/' . $member->image) and !empty($member->image)) {
            unlink('public/upload/member_images/' . $member->image);
        }
        if (file_exists('public/upload/member_images/' . $member->company_logo) and !empty($member->company_logo)) {
            unlink('public/upload/member_images/' . $member->company_logo);
        }
        $member->delete();
        return redirect()->route('members.view')->with('success', 'Data deleted successfully');
    }

    public function inactive($id)
    {
        DB::table('users')
            ->where('id', $id)
            ->update(['status' => 0]);
        return redirect()->route('members.view')->with('success', 'Well done! status updated');
    }

    public function active($id)
    {
        DB::table('users')
            ->where('id', $id)
            ->update(['status' => 1]);
        return redirect()->route('members.view')->with('success', 'Well done! status updated');
    }
}
