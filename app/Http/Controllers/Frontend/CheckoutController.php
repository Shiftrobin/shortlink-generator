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
use App\Models\Size;
use App\Models\Color;
use Cart;
use App\Models\User;
use DB;
use Mail;
use App\Models\Shipping;
use App\Models\Payment;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Division;
use App\Models\District;
use App\Models\Upazila;
use App\Models\Union;
use App\Models\Category;
use App\Models\SaleType;
use App\Models\CollectionTime;
use Auth;
use Session;
use DateTime;
use Image;

class CheckoutController extends Controller
{
    // public function customerMobileCheck(Request $request){
    //     $mobile=$request->input('mobile');
    //     $check = User::where('mobile',$mobile)->first();
    //     if($check){
    //         echo json_encode(FALSE);
    //     }else{
    //         echo json_encode(TRUE);
    //     }
    // }

    // public function customerEmailCheck(Request $request){
    //     $email=$request->input('email');
    //     $check = User::where('email',$email)->first();
    //     if($check){
    //         echo json_encode(FALSE);
    //     }else{
    //         echo json_encode(TRUE);
    //     }
    // }

    public function customerUsernameCheck(Request $request){
        $username=$request->input('username');
        $check = User::where('username',$username)->first();
        if($check){
            echo json_encode(FALSE);
        }else{
            echo json_encode(TRUE);
        }
    }

    public function customerLogin(){
    	$data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['menu_categories'] = Product::select('category_id')->groupBy('category_id')->get()->take(6);
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['six_category'] = Category::where('id','6')->first();
        $data['seven_category'] = Category::where('id','7')->first();
        $data['page_title'] = "home_title";
    	return view('frontend.single_pages.customer-login',$data);
    }

    public function customerSignup(){
    	$data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['menu_categories'] = Product::select('category_id')->groupBy('category_id')->get()->take(6);
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['six_category'] = Category::where('id','6')->first();
        $data['seven_category'] = Category::where('id','7')->first();
        $data['page_title'] = "home_title";
    	return view('frontend.single_pages.customer-signup',$data);
    }

    public function signupStore(Request $request){
        DB::transaction(function() use($request) {
            $this->validate($request,[
                // 'username'=>'required|unique:users,username',
                // 'email' => 'required|unique:users,email',
                // 'mobile' => ['required','unique:users,mobile', 'regex:/^(\+44\s?7\d{3}|\(?07\d{3}\)?)\s?\d{3}\s?\d{3}$/'],
                // 'post_code' => ['required','regex:/^([A-Z][A-HJ-Y]?[0-9][A-Z0-9]? ?[0-9][A-Z]{2}|GIR ?0A{2})$/'],
                // 'password' => 'required_with:password_confirmation|same:password_confirmation',
                 //  'captcha' => 'required|captcha'
                ]
            );

            $code = rand(000000,999999);

            // $user_id = User::latest('id')->first();
            // $member_serial = ($user_id)+1;
            // dd($member_serial);

               $user_id = User::select('id')->orderBy('id', 'desc')->first();
               $member_serial = ($user_id->id)+1;
             // dd($member_serial);


            $user = new User();
            $user->first_name = strip_tags($request->first_name);
            $user->last_name = strip_tags($request->last_name);
            $user->name = strip_tags($request->name);
            $user->email = strip_tags($request->email);
            $user->mobile = strip_tags($request->mobile);

            $user->fathers_name = strip_tags($request->fathers_name);
            $user->mothers_name = strip_tags($request->mothers_name);
            $user->date_of_birth = strip_tags($request->date_of_birth);
            $user->nid = strip_tags($request->nid);
            $user->gender = strip_tags($request->gender);
            $user->blood_group = strip_tags($request->blood_group);
            $user->education_qualification = strip_tags($request->education_qualification);
            $user->profession = strip_tags($request->profession);
            $user->other_expertise = strip_tags($request->other_expertise);

            $user->country = strip_tags($request->country);
            $user->division = strip_tags($request->division);
            $user->district = strip_tags($request->district);

            //password random
            $random_pass = str_random(6);
            $user->upazila = $random_pass;

            $user->union = '1';
            $user->address = strip_tags($request->address);
            $user->membership_type = strip_tags($request->membership_type);
            $user->member_id = $member_serial;
            $user->payment_id = '1';

            // $user->username = strip_tags($request->username);
            // $user->password = bcrypt($request->password);

            //username generate
            $user->username = strip_tags($request->last_name).$member_serial;
            //encrypt password
            $user->password = bcrypt($random_pass);

            $user->usertype = 'customer';
            $user->role = 'customer';
            $user->role_id = '0';
            $user->code = $code;
            $user->status = '1';

            if ($request->file('image')){
                $file = $request->file('image');
                $filename =date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/user_images'), $filename);
                $file = Image::make(public_path('upload/user_images/').$filename);
                $file->resize(590,708)->save(public_path('upload/user_images/').$filename);
                $user['image']= $filename;
            }

            $user->save();

            // $data = array(
            //     'email' => $request->email,
            //     'code' => $code
            // );

            // Mail::send('frontend.emails.verify-email',$data, function($message) use($data) {
            //     $message->from('support@onestop.com.bd','Onestop Bd');
            //     $message->to($data['email']);
            //     $message->subject('Please verify your email address');
            // });

        });

        Session::flash('signupMessage','You have successfully signed up,please login to continue!');
        return redirect()->route('customer.login');


       // Session::flash('signupMessage','You have successfully signed up,please verify your email!');
       // return redirect()->route('email.verify');
    }

    // captcha
    public function reloadCaptcha(){

        return response()->json(['captcha'=>captcha_img('math')]);

    }
    
    //registration success message
    public function registrationSuccess(){    

        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['menu_categories'] = Product::select('category_id')->groupBy('category_id')->get()->take(6);
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['six_category'] = Category::where('id','6')->first();
        $data['seven_category'] = Category::where('id','7')->first();
        $data['page_title'] = "home_title";

        return view('frontend.single_pages.registration-success',$data);
    }

    //old_customer_signup
    public function Old_signupStore(Request $request){
        DB::transaction(function() use($request) {
            $this->validate($request,[
                'division_id' => 'required',
                'district_id' => 'required',
                'upazila_id' => 'required',
                'union_id' => 'required',
                'name' => 'required',
                'email' => 'required|unique:users,email',
                'mobile' => ['required','unique:users,mobile', 'regex:/(^(\+8801|8801|01|008801))[1|5-9]{1}(\d){8}$/'],
                'password' => 'required_with:password_confirmation|same:password_confirmation'
            ]);
            $user = new User();
            $user->division_id = $request->division_id;
            $user->district_id = $request->district_id;
            $user->upazila_id = $request->upazila_id;
            $user->union_id = $request->union_id;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->password = bcrypt($request->password);
            $user->status = '1';
            $user->usertype = 'customer';
            $user->save();
        });

        return redirect()->route('customer.login')->with('success','You have successfully signed up,please login now');
    }

    public function vendorSignup()
    {
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['divisions'] = Division::all();
        $data['shope_categories'] = Category::all();
        return view('frontend.single_pages.vendor_signup', $data);
    }

    public function getAddressLatLng($address){

        $apiURL = 'https://api.opencagedata.com/geocode/v1/json?key=6f35973172764d7a9f03ee0ae9f1c66b&q='.urlencode($address)."&key=03c48dae07364cabb7f121d8c1519492&no_annotations=1&language=en";


        $cURLConnection = curl_init();

        curl_setopt($cURLConnection, CURLOPT_URL, $apiURL);
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

        $phoneList = curl_exec($cURLConnection);
        curl_close($cURLConnection);
        $jsonArrayResponse = json_decode($phoneList);
        $result = $jsonArrayResponse->results;
        $bound = (array)$result[0]->geometry;

        $lat = $bound['lat'];
        $long = $bound['lng'];

        return [$lat, $long];
    }

    public function vendorStore(Request $request)
    {
        DB::transaction(function() use($request) {
            $this->validate($request,[
                'name' => 'required',
                'store_name' => 'required|unique:users,store_name',
                'store_name' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required_with:password_confirmation|same:password_confirmation'
            ]);

            $code = rand(000000,999999);
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->store_name = $request->store_name;
            $user->store_address = $request->store_address;
            $user->store_lat_lng = implode(',', $this->getAddressLatLng($request->store_address));
            $user->slug = str_slug($request->store_name);
            $user->password = bcrypt($request->password);
            $user->status = '2';
            $user->usertype = 'admin';
            $user->role = 'vendor';
            $user->role_id = '3';
            $user->code = $code;
            $user->save();

            $data = array(
                'email' => $request->email,
                'code' => $code
            );

            Mail::send('frontend.emails.verify-email',$data, function($message) use($data) {
                $message->from('support@onestop.com.bd','Onestop Bd');
                $message->to($data['email']);
                $message->subject('Please verify your email address');
            });
        });

        return redirect()->route('email.verify')->with('success','You have successfully signed up,please verify your email');
    }

    public function vendorList()
    {
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['about'] = About::first();
        $data['shope_categories'] = Category::all();
        $data['vendors'] = Product::select('vendor_id')->groupBy('vendor_id')->get();
        return view('frontend.single_pages.vendor_list',$data);
    }

    public function vendorWiseProduct($vendor_id)
    {
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['about'] = About::first();
        $data['shope_categories'] = Category::all();
        $data['vendor_img'] = User::where('id',$vendor_id)->first();
        $data['vendor_wise_categories'] = Product::select('category_id')->where('vendor_id',$vendor_id)->groupBy('category_id')->get();
        $data['products'] = Product::where('vendor_id',$vendor_id)->orderBy('id','desc')->get();
        $data['vendor_user'] = User::where('id',$vendor_id)->first();
        return view('frontend.single_pages.vendor_wise_product',$data);
    }

    public function emailVerify(){
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['about'] = About::first();
        $data['menu_categories'] = Product::select('category_id')->groupBy('category_id')->get()->take(6);
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['page_title'] = "home_title";
        return view('frontend.single_pages.email-verify',$data);
    }

    public function verifyStore(Request $request){
        $this->validate($request,[
            'email' => 'required',
            'code' => 'required'
        ]);

        $checkData = User::where('email',$request->email)->where('code',$request->code)->first();
        if($checkData){
            if($checkData->usertype=='admin'){
                $status = '0';
            }elseif($checkData->usertype=='customer'){
                $status = '1';
            }
            $checkData->status = $status;
            $checkData->save();
            Session::flash('loginMessage','You have successfully verified,please login');
            return redirect()->route('customer.login');
        }else{
            Session::flash('verificatioErrorMessage','Sorry! email or verification code does not match!');
            return redirect()->back();
        }
    }

    public function getCollectionTime(Request $request){
        $current_date = date('Y-m-d');
        $order_date = date('Y-m-d',strtotime($request->date));
        $sale_type_id = $request->sale_type_id;
        if($order_date == $current_date && $sale_type_id=='1'){
            date_default_timezone_set('Europe/London');
            $current_time = date("H");
            // dd($current_time);
            if ($current_time <= '9.5') {
                $ids                = [9,10,11,12,13,14,15];
                $not_ids            = [1,2,3,4,5,6,7,8];
                $collection_times   = CollectionTime::whereIn('id', $ids)
                                        ->whereNotIn('id', $not_ids)
                                        ->get();
            }elseif($current_time > '9.5' && $current_time <= '10') {
                $ids                = [10,11,12,13,14,15];
                $not_ids            = [1,2,3,4,5,6,7,8,9];
                $collection_times   = CollectionTime::whereIn('id', $ids)
                                        ->whereNotIn('id', $not_ids)
                                        ->get();
            }elseif($current_time > '10' && $current_time <= '10.5') {
                $ids                = [11,12,13,14,15];
                $not_ids            = [1,2,3,4,5,6,7,8,9,10];
                $collection_times   = CollectionTime::whereIn('id', $ids)
                                        ->whereNotIn('id', $not_ids)
                                        ->get();
            }elseif($current_time > '10.5' && $current_time <= '11') {
                $ids                = [12,13,14,15];
                $not_ids            = [1,2,3,4,5,6,7,8,9,10,11];
                $collection_times   = CollectionTime::whereIn('id', $ids)
                                        ->whereNotIn('id', $not_ids)
                                        ->get();
            }elseif($current_time > '11' && $current_time <= '11.5') {
                $ids                = [13,14,15];
                $not_ids            = [1,2,3,4,5,6,7,8,9,10,11,12];
                $collection_times   = CollectionTime::whereIn('id', $ids)
                                        ->whereNotIn('id', $not_ids)
                                        ->get();
            }elseif($current_time > '11.5' && $current_time <= '12') {
                $ids                = [14,15];
                $not_ids            = [1,2,3,4,5,6,7,8,9,10,11,12,13];
                $collection_times   = CollectionTime::whereIn('id', $ids)
                                        ->whereNotIn('id', $not_ids)
                                        ->get();
            }elseif($current_time > '12' &&$current_time <= '12.5') {
                $ids                = [15];
                $not_ids            = [1,2,3,4,5,6,7,8,9,10,11,12,13,14];
                $collection_times   = CollectionTime::whereIn('id', $ids)
                                        ->whereNotIn('id', $not_ids)
                                        ->get();
            }elseif($current_time > '12.5'){
                $collection_times   = '';
            }
        }elseif($order_date != $current_date && $sale_type_id=='1'){
            $collection_times = CollectionTime::all();
        }
        return response()->json($collection_times);
    }

    public function shoppingType(){
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['sale_types'] = SaleType::all();
        $data['menu_categories'] = Product::select('category_id')->groupBy('category_id')->get()->take(6);
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['six_category'] = Category::where('id','6')->first();
        $data['seven_category'] = Category::where('id','7')->first();
        $data['page_title'] = "home_title";
        $data['customer_account_title'] = "shopping_type_title";
        return view('frontend.single_pages.customer-shopping-type',$data);
    }

    public function shoppingTypeStore(Request $request){
        $this->validate($request,[
            'sale_type_id' => 'required'
        ]);

        if($request->sale_type_id == "1"){
            $this->validate($request,[
                'date' => 'required',
                'collection_time_id' => 'required'
            ]);
        }elseif($request->sale_type_id == "2"){
            $this->validate($request,[
                'dalivery_date' => 'required',
                'dalivery_time' => 'required'
            ]);
        }

        $checkout = new Shipping();
        $checkout->user_id = Auth::user()->id;
        $checkout->sale_type_id = $request->sale_type_id;
        if($request->sale_type_id == "1"){
            $checkout->date = date('Y-m-d',strtotime($request->date));
            $checkout->collection_time_id = $request->collection_time_id;
        }elseif($request->sale_type_id == "2"){
            $checkout->dalivery_date = $request->dalivery_date;
            $checkout->dalivery_time = $request->dalivery_time;
        }
        $checkout->save();

        Session::put('shipping_id',$checkout->id);
        Session::put('sale_type_id',$checkout->sale_type_id);
        Session::flash('shoppingTypeCongratulation','Shopping Type Process successfully completed,now you can add to Cart Product');
        return redirect('/');
    }

    public function checkoutStore_Old(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'mobile_no' => 'required',
            'address' => 'required'
        ]);

        $checkout = new Shipping();
        $checkout->user_id = Auth::user()->id;
        $checkout->name = $request->name;
        $checkout->email = $request->email;
        $checkout->mobile_no = $request->mobile_no;
        $checkout->address = $request->address;
        $checkout->save();

        Session::put('shipping_id',$checkout->id);
        return redirect()->route('customer.payment')->with('success','Billing information successfully completed');
    }

    public function buyOrderCancel(Request $request){
        Session::flush();
        return redirect()->route('customer.order.list')->with('success','Order successfully cancelled');
    }

    public static function getVendorDetails($vendorId){
        $vendorDetails = User::select('store_name','store_address','store_lat_lng')->where('id',$vendorId)->get()->toArray();
        return $vendorDetails[0];
    }

}
