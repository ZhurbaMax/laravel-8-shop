<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Http\Requests\CheckoutConfirmRequest;

class CheckoutController extends Controller
{
    public function cartCheckout()
    {
        $orderId = session('orderId');
        if (!is_null($orderId)){
            $order = Order::find($orderId);
            return view('order', compact('order'));
        }else{
            return view('layouts.basket_is_empty');
        }
    }

    public function checkoutConfirm(CheckoutConfirmRequest $request)
    {
        $orderId = session('orderId');
        if (is_null($orderId)){
            return redirect()->route('shop');
        }
        $order = Order::find($orderId);
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->status = 1;
        $order->save();
        session()->forget('orderId');
        return view('layouts.successful_order');
    }
}
