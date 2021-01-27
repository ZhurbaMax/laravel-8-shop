<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function getShop()
    {
        $products = Shop::orderBy('id', 'desc')->paginate(6);
        $brands = Shop::distinct()->get('brand');
        return view('shop', ['products' => $products, 'brands' => $brands,]);
    }

    public function titleFilter(Request $request)
    {
        $search = new Shop;
        $search->title_product = $request->input('title');
        $products = Shop::where('title_product', 'LIKE', "%{$search->title_product}%")->get();
        return view('layouts.search-title', ['products' => $products]);
    }

    public function filterPrice(Request $request)
    {
        $searchMaxMin = new Shop;
        $searchMaxMin->title_product = $request->input('filter_price');
        if ($searchMaxMin->title_product == 'dear first'){
            $products = Shop::orderBy('price',  'desc')->get();
        }else{
            $products = Shop::orderBy('price',  'asc')->get();
        }
        return view('layouts.search-title', ['products' => $products]);
    }

    public function brandFilter(Request $request)
    {
        $checkedBrands = $request->brand;
        $products = Shop::whereIn('brand', $checkedBrands)->get();
        return view('layouts.search-title', ['products' => $products]);
    }
}
