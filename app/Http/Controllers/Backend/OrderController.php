<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shipping;
use App\Models\Payment;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Auth;

class OrderController extends Controller
{
    public function pendingList(){
        if(Auth::user()->role=='admin'){
            $data['orders'] = Order::where('status','0')->orderBy('id','desc')->get();
        	return view('backend.order.pending-list',$data);
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function approvedList(){
        if(Auth::user()->role=='admin'){
            $data['orders'] = Order::where('status','1')->orderBy('id','desc')->get();
        	return view('backend.order.approved-list',$data);
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function refundList(){
        if(Auth::user()->role=='admin'){
            $data['orders'] = Order::where('status','2')->orderBy('id','desc')->get();
            return view('backend.order.refund-list',$data);
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function details($order_no){
        if(Auth::user()->role=='admin'){
            $data['order'] = Order::where('order_no',$order_no)->first();
            return view('backend.order.order-details',$data);
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function refund($order_no){
        if(Auth::user()->role=='admin'){
            $data['order'] = Order::where('order_no',$order_no)->first();
            return view('backend.order.order-refund',$data);
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function refundStore(Request $request,$id){
        $order = Order::find($id);
        $order->status = $request->status;
        $order->save();
        return redirect()->back()->with('success','Successfully refunded');
    }

    public function approve(Request $request){
        $order = Order::find($request->id);
        $order->status = '1';
        $order->save();
    }
}
