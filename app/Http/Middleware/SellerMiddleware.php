<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class SellerMiddleware
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
        if (Auth::check() && Auth::user()->role_id == 3 && Auth::user()->email_verified == 1) {
            return $next($request);
        } elseif (Auth::check() && Auth::user()->role_id == 3 && Auth::user()->email_verified == 0) {
            session()->flash('type', 'bg-danger');
            session()->flash('msg', 'Please verify your email from seller');
            return redirect('/login');
        } else {
            return redirect()->back();
        }
    }
}
