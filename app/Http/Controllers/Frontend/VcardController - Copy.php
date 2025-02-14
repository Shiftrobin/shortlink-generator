<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Mail;
use Auth;
use Session;
use JeroenDesloovere\VCard\VCard;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Response;


class VcardController extends Controller
{
    public function memberSearch()
    {
        return view("frontend.vcard.pages.member-search");
    }
    public function memberSearchResult(Request $request)
    {
        $email = $request->input("email");
        // dd($email);
        // $user = User::where("email", $email)->where('role', 'customer')->where('status', 1)->first();
        try {
            $user = User::select('name', 'profession', 'image', 'id')
                ->where("email", $email)
                ->where('role', 'customer')
                ->firstOrFail();
            ;
            // dd($user);
            return view("frontend.vcard.pages.member-search-result", compact("user"));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('member.search')->with('error', 'Member not found. You are not registered with us.');
        }
    }

    public function memberProfile($name, $id)
    {
        $user = User::where('id', $id)->where('role', 'customer')->where('status', 1)->first();
        //dd($user);

        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        //dd($actual_link);
        $qrCode = QrCode::size(150)->generate($actual_link);

        return view('frontend.vcard.pages.member-profile', compact('user', 'qrCode', 'actual_link'));
    }

    public function vcfDownload($id)
    {
        $user = User::where('id', $id)->where('role', 'customer')->first();
        // $image = $user->image;
        $vcard = new VCard();
        $vcard->addName($user->name);
        // $vcard->addJobtitle($user->profession);
        $vcard->addEmail($user->email);
        $vcard->addPhoneNumber($user->mobile);
        // $vcard->addAddress($user->address);
        // $vcard->addURL($user->facebook_link);
        // $vcard->addURL($user->twitter_link);
        // $vcard->addURL($user->whatsapp_link);
        // $vcard->addURL($user->linkedin_link);
        // $vcard->addURL($user->instagram_link);
        // $vcard->addURL($user->youtube_link);
        // $vcard->addURL($user->messenger_link);

        $vcard->addPhoto(public_path('upload/member_images/' . $user->image));

        // if($image){
        //     $vcard->addPhoto(public_path('upload/member_images/'.$image));
        // }else
        // {
        //     $vcard->addPhoto(public_path('public/frontend/img/logo.png')); // 'public/frontend/img/logo.png'.
        // }
        //return $vcard->getOutput();

        return $vcard->download();


        // $user = User::findOrFail($id);

        // $vcard = 'BEGIN:VCARD' . "\r\n";
        // $vcard .= 'VERSION:3.0' . "\r\n";
        // $vcard .= 'FN:' . $user->name . "\r\n";
        // $vcard .= 'EMAIL:' . $user->email . "\r\n";
        // $vcard .= 'TEL;TYPE=WORK,VOICE:' . $user->mobile . "\r\n";
        // $vcard .= 'END:VCARD' . "\r\n";

        // $fileName = 'contact.vcf';

        // return Response::make($vcard, 200, [
        //     'Content-Type' => 'text/vcard',
        //     'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        // ]);

    }

    public function qrDownload($id)
    {
        $user = User::where('id', $id)->where('role', 'customer')->first();
        $name = Str::lower(str_replace(' ', '-', $user->name));
        $HomeLink = "https://$_SERVER[HTTP_HOST]";
        $url = $HomeLink . '/member/' . $name . '/' . $id;
        $qrCode = QrCode::format('png')->size(300)->generate($url);

        return Response::make($qrCode, 200, [
            'Content-Type' => 'image/png',
            'Content-Disposition' => 'attachment; filename="qrcode.png"',
        ]);


    }

    public function memberUsernameCheck(Request $request)
    {
        $username = $request->input('username');
        $check = User::where('username', $username)->first();
        if ($check) {
            echo json_encode(FALSE);
        } else {
            echo json_encode(TRUE);
        }
    }
    public function memberEmailCheck(Request $request)
    {
        $email = $request->input('email');
        $check = User::where('email', $email)->first();
        if ($check) {
            echo json_encode(FALSE);
        } else {
            echo json_encode(TRUE);
        }
    }

    public function reloadCaptcha()
    {

        return response()->json(['captcha' => captcha_img('math')]);

    }

    public function index()
    {
        return view('frontend.vcard.pages.signup');
    }

    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {
            $this->validate(
                $request,
                [
                    'email' => 'required|unique:users,email',
                    'username' => 'required',
                    'password' => 'required_with:password_confirmation|same:password_confirmation',
                    //'captcha' => 'required|captcha',
                ]
            );

            $user = new User();
            $user->name = strip_tags($request->name);
            $user->email = strip_tags($request->email);
            $user->username = strip_tags($request->username);
            //password view for admin
            $user->upazila = $request->password;
            $user->password = bcrypt($request->password);
            $user->usertype = 'customer';
            $user->role = 'customer';
            $user->role_id = '0';
            $code = rand(000000, 999999);
            $user->code = $code;
            $user->status = '1';
            $user->save();

            $data = array(
                'name' => $request->name,
                'email' => $request->email,
                'username' => $request->username,
                'password' => $request->password,
                // 'code' => $code
            );

            Mail::send('frontend.emails.member-registration', $data, function ($message) use ($data) {
                $message->from('info@aims-education.co.uk', $data['name'] . ' - ' . 'Thank you for register with AIMS Education VCard Membership');
                $message->to($data['email'], $data['name']);
                $message->cc(['marketing@aimseducation.co.uk', 'lutfor@aimseducation.co.uk']);
                $message->bcc('shefat@aimseducation.co.uk', $data['name'] . ' - ' . 'New Registration with AIMS Education VCard Membership');
                $message->subject($data['name'] . ' - ' . 'New Registration with AIMS Education VCard Membership');
            });

            // Mail::send('frontend.emails.verify-email',$data, function($message) use($data) {
            //     $message->from('support@onestop.com.bd','Onestop Bd');
            //     $message->to($data['email']);
            //     $message->subject('Please verify your email address');
            // });

        });

        Session::flash('signupMessage', 'You have successfully signed up,please login to continue!');
        return redirect()->back();
        // return redirect()->route('customer.login');

    }

    public function login(Request $request)
    {
        return view('frontend.vcard.pages.member-login');
    }
}
