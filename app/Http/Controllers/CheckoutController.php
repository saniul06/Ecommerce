<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout(){
        $cart = Cart::where('ip', request()->ip())->latest()->get();
        return view('frontend.checkout', compact('cart'));
    }
}
