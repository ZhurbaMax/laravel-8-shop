<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class AdminController extends Controller
{
    public function admin()
    {
        $products = Shop::orderBy('id', 'desc')->paginate(6);
        return view('admin', ['products' => $products]);
    }

    public function addProduct()
    {
        return view('admin.create');
    }

    public function create(Request $request)
    {
        $request->validate([
            'title_product' => 'required',
            'price'         => 'required',
            'brand'         => 'required',
            'description'   => 'required',
            'image'         => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $path = $request->file('image')->store('uploads', 'public');
        $product = new Shop();
        $product->title_product = $request->title_product;
        $product->price = $request->price;
        $product->brand = $request->brand;
        $product->description = $request->description;
        $product->image = $path;
        $product->save();
        return redirect('admin')->with('success', 'Product added successfully');
    }

    public function editProduct($id)
    {
        $productUp  = Shop::where("id",$id)->get();
        return view('admin.edit-product', ['productUp' => $productUp]);
    }

    public function updateProduct(Request $request, $id_product)
    {
        $request->validate([
            'title_product' => 'required',
            'price'         => 'required',
            'brand'         => 'required',
            'description'   => 'required',
        ]);
        $product = Shop::find($id_product);
        if($request->hasFile('image')){
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);
            $product->image->delete();
            $path = $request->file('image')->store('uploads', 'public');
            $product->image = $path;
        }
        $product->title_product = $request->title_product;
        $product->price = $request->price;
        $product->brand = $request->brand;
        $product->description = $request->description;
        $product->save();
        return redirect('admin')->with('success', 'Product edited successfully');
    }

    public function destroy($id_product)
    {
        Shop::where("id",$id_product)->delete();
        return back()->with('success', 'Product removed successfully');
    }
}
