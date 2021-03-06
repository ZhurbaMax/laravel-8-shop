<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Category;
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

    public function getShopCategory(Request $request, $alias)
    {
        $category = Category::where('alias', $alias)->first();
        $reset = $category->alias;
        $prod = $category->shops;
        if ($request->filled('title_product')) {
            $titleProduct = $request->title_product;
            $prod = $prod->filter(function ($product) use ($titleProduct) {
                return false !== stripos($product->title_product, $titleProduct);
            });
        }
        if ($request->filled('filter_price')){
            $prod->filter_price = $request->input('filter_price');
            if ($prod->filter_price == 'dear first'){
                $prod = $prod->sortByDesc('price');
            }else{
                $prod = $prod->sortBy('price');
            }
        }
        if ($request->filled('brand')){
                  $checkedBrands = $request->brand;
                  $prod = $prod->whereIn('brand', $checkedBrands);
            }
        $products = $prod->paginate(6)->withPath("?" . $request->getQueryString());
        $brands = $category->shops()->pluck('brand');
        $brands = $brands->unique();
        return view('shop-category', ['products' => $products, 'brands' => $brands, 'reset' => $reset]);
    }
}
