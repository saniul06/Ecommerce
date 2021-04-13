<?php

namespace App\Http\Controllers\user;

use App\Category;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderItem;
use App\Service;
use App\Shipping;
use App\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $services = Service::all()->where('status', 1);
        $services_3 = Service::where('status', 1)->limit(3)->get();
        $service_latest = Service::where('status', 1)->latest()->limit(3)->get();
        $categories = Category::all()->where('status', 1);
        return view('frontend.index', compact('services', 'categories', 'service_latest', 'services_3'));
    }
    public function category()
    {
        return view('user.category');
    }

    public function userProfile()
    {
        return view('user.user-profile');
    }

    public function userOrder()
    {
        return view('user.user-order');
    }

    public function userOrderView($id)
    {
        $order = Order::findOrFail($id);
        $orderItem = OrderItem::where('order_id', $id)->get();
        $shipping = Shipping::where('order_id', $id)->first();
        return view('user.order-view', compact('order', 'orderItem', 'shipping'));
    }

    public function changeUser($id, Request $request)
    {
        if (isset($request->password)) {
            $request->validate([
                'password' => ['required', 'string', 'min:6', 'confirmed'],
            ]);
            User::findOrFail($id)->update([
                'password' => Hash::make($request->password),
            ]);
        }
        if (isset($request->name)) {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
            ]);
            User::findOrFail($id)->update([
                'name' => $request->name,
            ]);
        }
        if (isset($request->email)) {
            $request->validate([
                'email' => ['string', 'email', 'max:255', 'unique:users'],
            ]);
            User::findOrFail($id)->update([
                'email' => $request->email,
            ]);
        }

        session()->flash('message', 'Profile Updated Successfully');
        return redirect()->back();
    }

    public function orderConfirm($id)
    {
        Order::findOrFail($id)->update([
            'confirm' => 1
        ]);
    }

    public function showOrder()
    {
        $order = Order::where('user_id', Auth::id())->first();
        if ($order != null) {
            $order = Order::where('user_id', Auth::id())->latest()->get();
        }
        return view('user.show-order', compact('order'));
    }

    public function deleteOrder($id){
        Order::findOrFail($id)->delete();
    }
}
