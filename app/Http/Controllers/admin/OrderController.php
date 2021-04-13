<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\OrderItem;
use App\Shipping;
use App\Cart;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function allOrder(){
        $order = Order::latest()->get();
        return view('admin.order.all-order', compact('order'));
    }

    public function viewOrder($id){
        $order = Order::findOrFail($id);
        $orderItem = OrderItem::where('order_id', $id)->get();
        $shipping = Shipping::where('order_id', $id)->first();
        return view('admin.order.view-order', compact('order', 'orderItem', 'shipping'));
    }

    public function deleteOrder($id){
        Order::findOrFail($id)->delete();
        OrderItem::where('order_id', $id)->delete();
        Shipping::where('order_id', $id)->delete();
        session()->flash('message', 'Order Deleted Sussessfully');
        return redirect()->back();
    }
}
