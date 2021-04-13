<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // if (Auth::check() && Auth::user()->role_id == 2 && Auth::user()->email_verified == 1) {
        //     return $next($request);
        // } elseif (Auth::check() && Auth::user()->role_id == 2 && Auth::user()->email_verified == 0) {
        //     session()->flash('type', 'bg-danger');
        //     session()->flash('msg', 'Registration Successful.Please verify your email from user 1');
        //     // return redirect('/login');
        //     return redirect()->back();
        // } else {
        //     session()->flash('type', 'bg-danger');
        //     session()->flash('msg', 'Registration Successful.Please verify your email from user 2');
        //     return redirect()->back();
        // }
        if (Auth::check() && Auth::user()->email_verified == 1) {
            if (Auth::user()->role_id == 2 || Auth::user()->role_id == 1 || Auth::user()->role_id == 3) {
                return $next($request);
            }
        } elseif (Auth::check() && Auth::user()->role_id == 2 && Auth::user()->email_verified == 0) {
            session()->flash('type', 'bg-danger');
            session()->flash('msg', 'Registration Successful.Please verify your email from user 1');
            // return redirect('/login');
            return redirect()->back();
        } else {
            session()->flash('type', 'bg-danger');
            session()->flash('msg', 'Registration Successful.Please verify your email from user 2');
            return redirect()->back();
        }
    }
}
