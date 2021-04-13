<?php

namespace App\Http\Controllers;

use App\Category;
use App\Cart;
use App\Service;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private function total(){
        $total = 0;
        $cart = Cart::select('quantity', 'price')->where('ip', request()->ip())->get();
        foreach ($cart as $item) {
            $total += $item->quantity * $item->price;
        }
        $quantity = Cart::where('ip', request()->ip())->sum('quantity');
        $arr = [$total, $quantity];
        return $arr;
    }

    public function addToCart($service_id, $price)
    {
        $check = Cart::where('service_id', $service_id)->where('ip', request()->ip())->first();
        if ($check) {
            Cart::where('service_id', $service_id)->where('ip', request()->ip())->increment('quantity');
        } else {
            Cart::insert([
                'service_id' => $service_id,
                'quantity' => 1,
                'price' => $price,
                'ip' => request()->ip()
            ]);
        }
        return $this->total();
    }

    public function addToCartDetails(Request $request)
    {
        if ($request->q <= 0) {
            // session()->flash('message', 'Can not process negative value');
            // return redirect()->back();
            return true;
        } else {
            $check = Cart::where('service_id', $request->service_id)->where('ip', request()->ip())->first();
            if ($check != null) {
                Cart::where('service_id', $request->service_id)->increment('quantity', $request->q);
            } else {
                Cart::insert([
                    'service_id' => $request->service_id,
                    'quantity' => $request->q,
                    'price' => $request->price,
                    'ip' => request()->ip()
                ]);
            }
            return $this->total();
        }
    }

    public function addToCartDetailss()
    {
        Service::all();
        return 6;
    }

    public function cartDelete($id)
    {
        Cart::where('id', $id)->where('ip', request()->ip())->delete();
        return $this->total();
    }

    public function cartPage()
    {
        $cart = Cart::where('ip', request()->ip())->first();
        if ($cart != null) {
            $cart = Cart::where('ip', request()->ip())->latest()->get();
        }
        return view('frontend.cart-page', compact('cart'));
    }

    public function updateCart()
    {
        $cart = Cart::where('ip', request()->ip())->first();
        if ($cart != null) {
            $cart = Cart::where('ip', request()->ip())->latest()->get();
        }
        return view('frontend.update-cart', compact('cart'));
    }

    public function cartUpdate(Request $request)
    {
        $cart_id = $request->id;
        $quantity = $request->q;
        if ($quantity < 0) {
            return false;
        }
        if ($quantity == 0) {
            $cart = Cart::findOrFail($cart_id)->delete();
            return $this->total();
        } else {
            Cart::where('id', $cart_id)->where('ip', request()->ip())->update([
                'quantity' => $quantity
            ]);
            return $this->total();
        }
    }

    public function singleCart($id, $service_name, $price, $service_code, $category_name, $img){
        $cart = Cart::where('ip', request()->ip())->where('service_id', $id)->first();
        $total = $this->total();
        $total = $total[0];
        return view('frontend.single-cart', compact('cart', 'id', 'service_name', 'price', 'total', 'service_code', 'category_name', 'img'));
    }
}
