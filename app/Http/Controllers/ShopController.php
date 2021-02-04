<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class ShopController extends Controller
{
    public function getShop(Request $request)
    {
        $productQuery = Shop::query();
        if ($request->filled('title_product')){
            $productQuery->where('title_product', 'like', "%$request->title_product%");
        }
        if ($request->filled('filter_price')){
            $productQuery->filter_price = $request->input('filter_price');
            if ($productQuery->filter_price == 'dear first'){
                $productQuery->orderBy('price',  'desc');
            }else{
                $productQuery->orderBy('price',  'asc');
            }
        }
        if ($request->filled('brand')){
            $checkedBrands = $request->brand;
            $productQuery->whereIn('brand', $checkedBrands);
        }
        $brand = new ShopController();
        $brands = $brand->brandAdd();
        $products = $productQuery->paginate(6)->withPath("?" . $request->getQueryString());
        return view('shop', ['products' => $products, 'brands' => $brands]);
    }

    public function brandAdd()
    {
        $brands = Shop::distinct()->get('brand');
        if (count($brands) == 0 ){
            $brands = Null;
        }
        return $brands;
    }

    public function getProduct($id)
    {
        $product = Shop::find($id);
        return view('layouts.product', compact('product'));
    }
}
