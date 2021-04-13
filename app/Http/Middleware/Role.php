<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class Role
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
        if (Auth::user()->email_verified == 1)
            return $next($request);
        else {
            Auth::logout();
            session()->flash('type', 'bg-success');
            session()->flash('msg', 'Registration Successful.Please verify your email.');
            return redirect()->route('login');
        }
    }
}
