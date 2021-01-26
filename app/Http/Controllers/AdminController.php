<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin()
    {
        $products = Catalog::orderBy('id_product', 'desc')->paginate(6);
        return view('admin', ['products' => $products]);
    }

    public function addProduct()
    {
        return view('admin.create');
    }

    public function create(Request $request)
    {
        $product = new Catalog;
        $product->title_product = $request->input('title_product');
        $product->price = $request->input('price');
        $product->brand = $request->input('brand');
        $product->description = $request->input('description');
        $product->image = $request->file('image')->store('uploads', 'public');
        $product->save($request->all());
        return redirect('admin')->with('success', 'Product added successfully');
    }

    public function editProduct($id)
    {
        $productUp  = Catalog::where("id_product",$id)->get();
        return view('admin.edit-product', ['productUp' => $productUp]);
    }

    public function updateProduct(Request $request, $id)
    {
        //
    }

    public function destroy($id_product)
    {
        Catalog::where("id_product",$id_product)->delete();
        return back()->with('success', 'Product removed successfully');
    }
}
