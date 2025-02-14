<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Logo;
use App\Models\Slider;
use App\Models\Contact;
use App\Models\About;
use App\Models\Communicate;
use App\Models\Product;
use App\Models\ProductSubImage;
use App\Models\ProductColor;
use App\Models\ProductSize;
use Mail;
use App\Models\User;
use Auth;
use DB;
use App\Models\Shipping;
use App\Models\Payment;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Faq;
use App\Models\PrivacyPolicy;
use App\Models\TermCondition;
use App\Models\Category;
use App\Models\CollectionTime;
use App\Models\Review;
use Session;
use Cart;
use Image;
use PDF;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['menu_categories'] = Product::select('category_id')->groupBy('category_id')->get()->take(6);
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['six_category'] = Category::where('id', '6')->first();
        $data['seven_category'] = Category::where('id', '7')->first();
        $data['user'] = Auth::user();
        $data['page_title'] = "home_title";
        $data['customer_account_title'] = "profile_title";
        return view('frontend.vcard.pages.member-dashboard', $data);
    }

    public function customerCard($id)
    {
        $data['allData'] = User::where('id', $id)->where('usertype', 'customer')->first();
        $pdf = PDF::loadView('backend.customer.member-card', $data)->setOptions(['defaultFont' => 'sans-serif']);

        return $pdf->download('member.pdf');
    }

    public function reviewStore(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'rating' => 'required',
            'description' => 'required'
        ]);
        $data = new Review();
        $data->date = date('Y-m-d');
        $data->user_id = Auth::user()->id;
        $data->product_id = strip_tags($request->product_id);
        $data->rating = strip_tags($request->rating);
        $data->description = strip_tags($request->description);
        $data->save();

        Session::flash('reviewMessage', 'Review is successfully added!');

        return redirect()->back();
    }

    public function editProfile()
    {
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['menu_categories'] = Product::select('category_id')->groupBy('category_id')->get()->take(6);
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['six_category'] = Category::where('id', '6')->first();
        $data['seven_category'] = Category::where('id', '7')->first();
        $data['editData'] = User::find(Auth::user()->id);
        $data['page_title'] = "home_title";
        return view('frontend.vcard.pages.member-edit-profile', $data);
    }

    public function updateProfile(Request $request)
    {
        $user = User::find(Auth::user()->id);
        // $this->validate($request, [
        //     'mobile' => 'required',
        //     'email' => 'required'
        // ]);

        $user->name = strip_tags($request->name);
        $user->profession = strip_tags($request->profession);
        $user->country = strip_tags($request->country);
        $user->address = strip_tags($request->address);
        $user->email = strip_tags($request->email);
        $user->mobile = strip_tags($request->mobile);
        $user->mobile2 = strip_tags($request->mobile2);

        $user->facebook_link = strip_tags($request->facebook_link);
        $user->twitter_link = strip_tags($request->twitter_link);
        $user->whatsapp_link = strip_tags($request->whatsapp_link);
        $user->linkedin_link = strip_tags($request->linkedin_link);
        $user->instagram_link = strip_tags($request->instagram_link);
        $user->youtube_link = strip_tags($request->youtube_link);
        $user->messenger_link = strip_tags($request->messenger_link);


        $photo = $request->file('image');
        if ($photo) {
            @unlink(public_path('upload/member_images/' . $photo->image));
            $fileName1 = date('YmdHi') . $photo->getClientOriginalName();
            $photo->move('public/upload/member_images/', $fileName1);
            $photo = Image::make(public_path('upload/member_images/') . $fileName1);
            $photo->resize(250, 250)->save(public_path('upload/member_images/') . $fileName1);
            $user['image'] = $fileName1;
        }

        $company_logo = $request->file('company_logo');
        if ($company_logo) {
            @unlink(public_path('upload/member_images/' . $company_logo->company_logo));
            $fileName2 = date('YmdHi') . $company_logo->getClientOriginalName();
            $company_logo->move('public/upload/member_images/', $fileName2);
            $company_logo = Image::make(public_path('upload/member_images/') . $fileName2);
            $company_logo->save(public_path('upload/member_images/') . $fileName2);
            //$company_logo->resize(250, 250)->save(public_path('upload/member_images/') . $fileName2);
            $user['company_logo'] = $fileName2;
        }

        $user->save();
        return redirect()->route('dashboard')->with('success', 'Profile updated successfully');
    }


    public function passwordChange()
    {
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['menu_categories'] = Product::select('category_id')->groupBy('category_id')->get()->take(6);
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['six_category'] = Category::where('id', '6')->first();
        $data['seven_category'] = Category::where('id', '7')->first();
        $data['page_title'] = "home_title";
        $data['customer_account_title'] = "password_change_title";
        return view('frontend.vcard.pages.member-password-change', $data);
    }

    public function passwordUpdate(Request $request)
    {
        if (Auth::attempt(['id' => Auth::user()->id, 'password' => $request->current_password])) {
            $user = User::find(Auth::user()->id);

            $user->upazila = $request->new_password;
            $user->password = bcrypt($request->new_password);
            $user->save();
            return redirect()->route('dashboard')->with('success', 'Password changed successfully');
        } else {
            return redirect()->back()->with('error', 'Sorry! your current password dost not match');
        }
    }

    public function payment()
    {
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['menu_categories'] = Product::select('category_id')->groupBy('category_id')->get()->take(6);
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['six_category'] = Category::where('id', '6')->first();
        $data['seven_category'] = Category::where('id', '7')->first();
        $data['page_title'] = "home_title";
        return view('frontend.single_pages.customer-payment', $data);
    }

    public function paymentStore(Request $request)
    {
        if (Session::get('sale_type_id') == '2' && $request->order_total < '150') {
            Session::flash('shoppingMinQtyMessage', 'You have to order minimum £ 150 !');
            return redirect()->back();
        } else {
            if ($request->product_id == NULL) {
                return redirect()->back()->with('error', 'Please add any product');
            } else {
                $this->validate($request, [
                    'payment_method' => 'required'
                ]);
                if ($request->payment_method == 'Bkash' && $request->transaction_no == NULL) {
                    return redirect()->back()->with('message', 'Please enter your transaction no');
                }
                DB::transaction(function () use ($request) {
                    $payment = new Payment();
                    $payment->payment_method = $request->payment_method;
                    $payment->transaction_no = $request->transaction_no;
                    $payment->save();
                    $order = new Order();
                    $order->user_id = Auth::user()->id;
                    $order->shipping_id = Session::get('shipping_id');
                    $order->sale_type_id = Session::get('sale_type_id');
                    $order->payment_id = $payment->id;
                    $order_no = rand(00000000, 99999999);
                    $order->order_no = $order_no . date('YmdHis');
                    $order->order_total = is_float($request->order_total) ? $request->order_total : number_format((float) $request->order_total, 2, '.', '');
                    $order->order_vat = is_float($request->order_vat) ? $request->order_vat : number_format((float) $request->order_vat, 2, '.', '');
                    $order->status = '0';
                    $order->save();
                    $contents = Cart::content();
                    foreach ($contents as $content) {
                        $order_details = new OrderDetail();
                        $order_details->order_id = $order->id;
                        $order_details->product_id = $content->id;
                        $order_details->quantity = $content->qty;
                        $order_details->price = is_float($content->price) ? $content->price : number_format((float) $content->price, 2, '.', '');
                        $order_details->vat = is_float($content->options->vat) ? $content->options->vat : number_format((float) $content->options->vat, 2, '.', '');
                        $order_details->save();
                    }
                });
            }
            Cart::destroy();
            session()->forget('shipping_id');
            session()->forget('sale_type_id');
            return redirect()->route('customer.order.list')->with('success', 'Order successfully completed');
        }
    }

    public function orderList()
    {
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['menu_categories'] = Product::select('category_id')->groupBy('category_id')->get()->take(6);
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['orders'] = Order::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        $data['six_category'] = Category::where('id', '6')->first();
        $data['seven_category'] = Category::where('id', '7')->first();
        $data['page_title'] = "home_title";
        $data['customer_account_title'] = "order_list_title";
        return view('frontend.single_pages.customer-order', $data);
    }

    public function productDelivery()
    {
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['menu_categories'] = Product::select('category_id')->groupBy('category_id')->get()->take(6);
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['six_category'] = Category::where('id', '6')->first();
        $data['seven_category'] = Category::where('id', '7')->first();
        $data['page_title'] = "home_title";
        $data['order'] = Order::where('order_no', Session::get('order_no'))->first();
        return view('frontend.single_pages.customer-delivery', $data);
    }

    public function orderRefund($order_no)
    {
        $orderData = Order::where('order_no', $order_no)->first();
        $data['order'] = Order::where('order_no', $orderData->order_no)->where('user_id', Auth::user()->id)->first();
        if ($data['order'] == false) {
            return redirect()->back()->with('error', 'do not try to be over smart!');
        } else {
            $data['logo'] = Logo::first();
            $data['contact'] = Contact::first();
            $data['menu_categories'] = Product::select('category_id')->groupBy('category_id')->get()->take(6);
            $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
            $data['order'] = Order::with(['order_details'])->where('id', $orderData->id)->where('user_id', Auth::user()->id)->first();
            $data['six_category'] = Category::where('id', '6')->first();
            $data['seven_category'] = Category::where('id', '7')->first();
            $data['page_title'] = "home_title";
            return view('frontend.single_pages.customer-order-refund', $data);
        }
    }

    public function orderRefundStore(Request $request, $id)
    {
        $orderData = Order::find($id);
        $orderData->message = $request->message;
        $orderData->save();
        return redirect()->route('customer.order.list')->with('success', 'Successfully refunded,please wait for approval!');
    }

    public function orderDetails($order_no)
    {
        $orderData = Order::where('order_no', $order_no)->first();
        $data['order'] = Order::where('order_no', $orderData->order_no)->where('user_id', Auth::user()->id)->first();
        if ($data['order'] == false) {
            return redirect()->back()->with('error', 'do not try to be over smart!');
        } else {
            $data['logo'] = Logo::first();
            $data['contact'] = Contact::first();
            $data['menu_categories'] = Product::select('category_id')->groupBy('category_id')->get()->take(6);
            $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
            $data['order'] = Order::with(['order_details'])->where('id', $orderData->id)->where('user_id', Auth::user()->id)->first();
            $data['six_category'] = Category::where('id', '6')->first();
            $data['seven_category'] = Category::where('id', '7')->first();
            $data['page_title'] = "home_title";
            return view('frontend.single_pages.customer-order-details', $data);
        }
    }

    public function orderPrint($order_no)
    {
        $orderData = Order::where('order_no', $order_no)->first();
        $data['order'] = Order::where('order_no', $orderData->order_no)->where('user_id', Auth::user()->id)->first();
        if ($data['order'] == false) {
            return redirect()->back()->with('error', 'do not try to be over smart!');
        } else {
            $data['logo'] = Logo::first();
            $data['contact'] = Contact::first();
            $data['menu_categories'] = Product::select('category_id')->groupBy('category_id')->get()->take(6);
            $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
            $data['order'] = Order::with(['order_details'])->where('id', $orderData->id)->where('user_id', Auth::user()->id)->first();
            $data['six_category'] = Category::where('id', '6')->first();
            $data['seven_category'] = Category::where('id', '7')->first();
            $pdf = PDF::loadView('frontend.single_pages.customer-order-print', $data);
            $pdf->SetProtection(['copy', 'print'], '', 'pass');
            return $pdf->stream('document.pdf');
        }
    }
}
