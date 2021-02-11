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
        return back()->with('success', 'Product added to cart successfully');
    }

    public function cartReduce($id_product)
    {
        $orderId = session('orderId');
        $order = Order::find($orderId);
        if ($order->products->contains($id_product)){
            $pivotRow = $order->products()->where('shop_id', $id_product)->first()->pivot;
            if ($pivotRow->count < 2){
                $order->products()->detach($id_product);
            }else{
                $pivotRow->count--;
                $pivotRow->update();
            }
            return back()->with('success', 'Product Reduced to cart successfully');
        }
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

    public function getCountCart()
    {
        $orderId = session('orderId');
        $order = [];
        if (!is_null($orderId)){
            $order = Order::find($orderId);
        }
        $countProd = [];
        foreach ($order->products as $product){
            $countProd[] = $product->pivot->count;
        }
        return response()->json(['orderCount'=>array_sum($countProd)],200);
    }

    public function cartVue()
    {
        $orderId = session('orderId');
        if (!is_null($orderId)){
            $order = Order::find($orderId);
            if (count($order->products) == 0){
                return view('layouts.basket_is_empty');
            }
            return response()->json(['order'=>$order],200);
        }else{
            return view('layouts.basket_is_empty');
        }
    }

    public function updateCartVue(Request $request)
    {
        $orderId = $request->input('orderId');
        $productsVue = $request->input('productsVue');
        $order = Order::find($orderId);
        foreach ($productsVue as $product){
            $id_product = $product['id'];
            $pivotRow = $order->products()->where('shop_id', $id_product)->first()->pivot;
            $pivotRow->count = $product['pivot']['count'];
            $pivotRow->update();
        }
    }

    public function deleteProductVue(Request $request)
    {
        $orderId = $request->input('orderId');
        $id_product = $request->input('productId');
        $order = Order::find($orderId);
        $result = $order->products()->detach($id_product);
        return response()->json(['result' => $result]);
    }
}
