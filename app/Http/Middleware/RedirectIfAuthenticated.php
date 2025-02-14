<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;
use Session;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if(Auth::user()->usertype=='admin'){
                return redirect('/home');
            }elseif (Auth::user()->usertype=='customer') {
                return redirect('/dashboard');
            }
        }

        // if (Auth::guard($guard)->check()) {
        //     if(Auth::user()->usertype=='admin'){
        //         return redirect('/home');
        //     }elseif (Auth::user()->usertype=='customer' && Session::get('add_buy_now')) {
        //         return redirect('/checkout');
        //     }elseif (Auth::user()->usertype=='customer') {
        //         return redirect('/shopping_type');
        //     }
        // }

        return $next($request);
    }
}
