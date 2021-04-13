<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Service;
use App\Category;
use Auth;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $services = Service::all()->where('status', 1);
        $services_3 = Service::where('status', 1)->limit(3)->get();
        $service_latest = Service::where('status', 1)->latest()->limit(3)->get();
        $categories = Category::all()->where('status', 1);
        return view('frontend.index', compact('services', 'categories', 'service_latest', 'services_3'));
    }

    public function logout()
    {
        Cart::where('ip', request()->ip())->delete();
        Auth::logout();
        return redirect('/');
    }

    public function shopPage(){
        $services = Service::where('status', 1)->latest()->paginate(9);
        $categories = Category::all()->where('status', 1);
        return view('frontend.shop-page', compact('services', 'categories'));
    }

    public function categoryPage($id){
        $services = Service::where('category_id', $id)->where('status', 1)->paginate(9);
        $categories = Category::all()->where('status', 1);
        return view('frontend.category', compact('services','categories'));
    }

    public function detailsPage($id){
        $service = Service::findOrFail($id);
        $cart = Cart::where('ip', request()->ip())->where('service_id', $id)->first();
        // if ($cart != null) {
        //     $cart = Cart::where('ip', request()->ip())->where('service_id', $id)->first();
        // }

        return view('frontend.service-details', compact('service', 'cart'));
    }
}
