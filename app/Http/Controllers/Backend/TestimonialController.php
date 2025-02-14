<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\User;
use App\Models\Review;
use App\Models\Communicate;
use App\Models\Subscriber;
use App\Models\Product;

class TestimonialController extends Controller
{
    public function viewContactor(){
        $data['allData'] = Communicate::orderBy('id','desc')->get();
        return view('backend.homepage.communicate.contactor-view',$data);
    }

    public function detailsContactor($id){
        $data['value'] = Communicate::find($id);
        return view('backend.homepage.communicate.contactor-details',$data);
    }

    public function deleteContactor(Request $request){
        $logo = Communicate::find($request->id);
        $logo->delete();
        return redirect()->route('communicates.contactor.view')->with('success','Data Deleted successfully');
    }

    public function viewSubscriber(){
        $data['allData'] = Subscriber::orderBy('id','desc')->get();
        return view('backend.homepage.communicate.subscriber-view',$data);
    }

    public function deleteSubscriber(Request $request){
        $logo = Subscriber::find($request->id);
        $logo->delete();
        return redirect()->route('communicates.subscriber.view')->with('success','Data Deleted successfully');
    }

    public function viewReview(){
        $data['allData'] = Review::orderBy('id','desc')->get();
        return view('backend.homepage.communicate.review-view',$data);
    }

    public function deleteReview(Request $request){
        $logo = Review::find($request->id);
        $logo->delete();
        return redirect()->route('communicates.review.view')->with('success','Data Deleted successfully');
    }

    public function inactiveReview($id){
        DB::table('reviews')
                ->where('id', $id)
                ->update(['status' => 0]);
        return redirect()->route('communicates.review.view')->with('success','Well done! status updated');
    }

    public function activeReview($id){
        DB::table('reviews')
                ->where('id', $id)
                ->update(['status' => 1]);
        return redirect()->route('communicates.review.view')->with('success','Well done! status updated');
    }
}
