<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Auth;
use Cookie;
use Session;
use App\Models\Shipping;
use App\Models\Payment;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Division;
use App\Models\District;
use App\Models\Upazila;
use App\Models\Union;
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
use App\Models\Category;
use Cart;

class PasswordResetController extends Controller
{
    public function resetPassword()
    {
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['about'] = About::first();
        $data['menu_categories'] = Product::select('category_id')->groupBy('category_id')->get()->take(6);
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['page_title'] = "home_title";
        return view('frontend.reset_password.reset-email',$data);
    }

    public function checkEmail(Request $request)
    {
        $check_email = User::where('email',$request->email)->first();

        Session::put('email',$request->email);
        if($check_email)
        {
            $code = rand(000000,999999);
            $minutes = 10;
            $value = Cookie::queue('last_name', $code, $minutes);
            $data['last_name'] = $check_email['last_name'];
            $data['logo'] = Logo::first();
            $data['contact'] = Contact::first();
            $data['about'] = About::first();
            $data['menu_categories'] = Product::select('category_id')->groupBy('category_id')->get()->take(6);
            $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
            $data['page_title'] = "home_title";
            return view('frontend.reset_password.reset-code')->with($data);
        }
        else
        {
            Session::flash('emailResetErrorMessage','Email does not match! Please try again!');
            return redirect()->back();
        }
    }

    public function checkName(Request $request)
    {
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['about'] = About::first();
        $data['menu_categories'] = Product::select('category_id')->groupBy('category_id')->get()->take(6);
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['page_title'] = "home_title";
        $data['code'] = $request->cookie('last_name');
        $email = Session::get('email');
        $data['user_email'] = $email;
        $user_id = User::where('email',$email)->first();
        $data['last_name'] = $user_id['last_name'];

        // Mail::send('frontend.emails.reset-password-page', $data, function ($message) use ($data){
        //     $message->from('support@onestop.com.bd','Onestop Bd');
        //     $message->to($data['user_email']);
        //     $message->subject('Password reset code.');
        // });

        return view('frontend.reset_password.check-code',$data);

    }

    public function submitCode(Request $request)
    {
        $email = Session::get('email');
        $cookie_code = $request->cookie('last_name');
        // $cookie_code = '12';
        if($cookie_code == $request->code)
        {
            // dd('test');
            return redirect()->route('new.password');
        }
        else
        {
            Session::flash('verificationCodeErrorMessage','Verification Code does not match! Please Try again!');
            return redirect()->back();
        }
    }

    public function newPassword()
    {
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['about'] = About::first();
        $data['menu_categories'] = Product::select('category_id')->groupBy('category_id')->get()->take(6);
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['page_title'] = "home_title";
        return view('frontend.reset_password.new-password',$data);
    }

    public function newPasswordStore(Request $request)
    {
        $request->validate([
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|same:new_password'
        ]);
        $email = Session::get('email');
        $user = User::where('email',$email)->first();
        if($request->new_password == $request->confirm_password)
        {
            $password = bcrypt($request->new_password);
            $user->password = $password;
            $user->update();
            return redirect()->route('customer.login')->with('success','Your password Successfully Updated.');
        }
        else
        {
            session()->flash('message', 'Password and Confirm password does not match.');
            return redirect()->back();
        }
    }
}
