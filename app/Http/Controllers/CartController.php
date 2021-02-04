<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()
    {
        $orderId = session('orderId');
        if (!is_null($orderId)){
            $order = Order::find($orderId);
            if (count($order->products) == 0){
                return view('layouts.basket_is_empty');
            }
             return view('cart', compact('order'));
        }else{
            return view('layouts.basket_is_empty');
        }
    }

    public function cartAdd($id_product)
    {
        $orderId = session('orderId');
        if (is_null($orderId)){
            $orderId = Order::create()->id;
            session(['orderId' => $orderId]);
            $order = Order::find($orderId);
        }else{
            $order = Order::find($orderId);
        }
        if ($order->products->contains($id_product)){
            $pivotRow = $order->products()->where('shop_id', $id_product)->first()->pivot;
            $pivotRow->count++;
            $pivotRow->update();
        }else{
            $order->products()->attach($id_product);
        }
        //session(['orderCount'=>count($order->products)]);
        return back()->with('success', 'Product added to cart successfully');
    }

    public function cartRemove($id_product)
    {
        $orderId = session('orderId');
        if (is_null($orderId)){
            return view('cart', compact('order'));
        }
        $order = Order::find($orderId);
        $order->products()->detach($id_product);
        return back()->with('success', 'The product has been successfully removed from the cart');
    }
}
