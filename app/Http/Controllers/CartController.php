<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()
    {
        return view('cart');
    }

    public function order()
    {
        return view('order');
    }

    public function cartAdd($id_product)
    {
        $orderId = session('orderId');
        if (is_null($orderId)){
            $orderId = Order::create()->id;
            session(['orderId' => $orderId]);
        }
        dump($orderId);
//        else{
//            $order = Order::find($orderId);
//        }
//        $order->products()->attach($id_product);
//        return view('cart', compact('order'));
    }
}
