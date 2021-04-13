<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::check() && Auth::user()->role_id == 1 && Auth::user()->email_verified == 1) {
            return redirect()->route('admin.dashboard');
        } elseif (Auth::check() && Auth::user()->role_id == 2 && Auth::user()->email_verified == 1) {
            return redirect()->route('user.dashboard');
        } elseif (Auth::check() && Auth::user()->role_id == 1 && Auth::user()->email_verified == 1) {
            return redirect()->route('seller.dashboard');
        }
        // else {
        //     return view('home');
        //     // return redirect()->back();
        // }
    }
}
