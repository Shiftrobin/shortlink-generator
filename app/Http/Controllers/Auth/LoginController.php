<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
// use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        $username = $request->username;
        $password = $request->password;
        $validData = User::where('username', $username)->first();
        $password_check = password_verify($password, @$validData->password);
        if ($password_check == false) {
            return redirect()->back()->with('message', 'Username or Password does not match!');
        }
        if ($validData->status == '0') {
            return redirect()->back()->with('message', 'Sorry! you are not approved yet.please wait or contact us');
        }
        if ($validData->status == '2') {
            return redirect()->back()->with('message', 'Sorry! you are not verified yet');
        }
        if (Auth::attempt(['username' => $username, 'password' => $password])) {
            return redirect()->route('login');
        }
    }

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return username;
    }
}
