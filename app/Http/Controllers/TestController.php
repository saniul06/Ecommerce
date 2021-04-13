<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderItem;
use App\Service;
use App\Shipping;
use Illuminate\Http\Request;
use Mail;

class TestController extends Controller
{
    public function a()
    {
        $id = 62;
        $order = Order::findOrFail($id);
        $orderItem = OrderItem::where('order_id', $id)->get();
        $shipping = Shipping::where('order_id', $id)->first();
        return view('layouts.a', compact('order', 'orderItem', 'shipping'));
    }


    public function aa(Request $request)
    {
        $service = Service::all();
        return view('layouts.ajax', compact('service'));
    }

    // public function postContact(Request $request){
    //     $id = 62;
    //     $order = Order::findOrFail($id);
    //     $orderItem = OrderItem::where('order_id', $id)->get();
    //     $shipping = Shipping::where('order_id', $id)->first();
    //     $a = [

    //     ];
    //     Mail::send('layouts.a',$a,function($mail){
    //         $mail->from('aaaa@a.com', 'aaaa')
    //         ->to('u0604012@student.cuet.ac.bd','bbbb')
    //         ->subject('ecommerce project');
    //     });
    // }

    public function s()
    {
        $p = Order::find(62)->orders;
        // $p = OrderItem::where('order_id', 62)->latest()->get();
        // dd($p);
        $p = json_decode(json_encode($p), true);
        $p = Order::with('orders')->where('id', 62)->first();
        echo '<pre>';
        print_r($p);

        // $a = [
        //     'id' => $p[0],
        //     'order_id' => $p[1],
        //     'quantity' => $p[2],
        //     'quantity' => $p[4],
        //     'created_at' => $p[5],
        // ];
        // Mail::send('layouts.a', $a, function ($mail) {
        //     $mail->from('aaaa@a.com', 'aaaa')
        //         ->to('u0604012@student.cuet.ac.bd', 'bbbb')
        //         ->subject('ecommerce project');
        // });
    }
}
