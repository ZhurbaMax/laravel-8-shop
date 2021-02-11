<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Order;
use App\Models\Category;
use App\Http\Requests\AdminShopProduct;
use App\Http\Requests\AdminImageProduct;
use App\Http\Requests\ProductCategoryRequest;


class AdminController extends Controller
{
    public function admin()
    {
        $products = Shop::orderBy('id', 'desc')->paginate(6);
        return view('admin', ['products' => $products]);
    }

    public function addProduct()
    {
        return view('admin.create', ['categories'=>Category::get()]);
    }

    public function create(AdminShopProduct $request)
    {
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

    public function updateProduct(AdminImageProduct $request, $id_product)
    {
        $product = Shop::find($id_product);
        if($request->hasFile('image')){
            $pathOld = $product->image;
            $oldImg = public_path('storage/' . $pathOld);
            \File::delete($oldImg);
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
        $product = Shop::find($id_product);
        $pathOld = $product->image;
        $oldImg = public_path('storage/' . $pathOld);
        \File::delete($oldImg);
        Shop::where("id",$id_product)->delete();
        return back()->with('success', 'Product removed successfully');
    }

    public function orders()
    {
        $orders = Order::orderBy('id', 'desc')->paginate(10);
        return view('admin.orders', ['orders' => $orders]);
    }

    public function detailOrder($id)
    {
        $orderDetail  = Order::where("id",$id)->get();
        return view('admin.order-details', ['orderDetail' => $orderDetail]);
    }

    public function orderDestroy($id)
    {
        Order::where("id",$id)->delete();
        return back()->with('success', 'Order removed successfully');
    }

    public function adminCategory()
    {
        $categoryes = Category::orderBy('id', 'desc')->get();
        return view('admin.category', compact('categoryes'));
    }

    public function createCategory(ProductCategoryRequest $request)
    {
        $path = $request->file('img_category')->store('uploads', 'public');
        $category = new Category;
        $category->title_category = $request->title_category;
        $category->desc = $request->desc;
        $category->alias = $request->alias;
        $category->img_category = $path;
        $category->save();
        return redirect(route('admin.category'))->with('success', 'Category added successfully');
    }
    public function addCategory()
    {
        return view('admin.create-category');
    }

}
