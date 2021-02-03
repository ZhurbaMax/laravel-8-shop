<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class ShopController extends Controller
{
    public function getShop()
    {
        $products = Shop::orderBy('id', 'desc')->paginate(6);
        $brand = new ShopController();
        $brands = $brand->brandAdd();
        return view('shop', ['products' => $products, 'brands' => $brands]);
    }

    public function titleFilter(Request $request)
    {
        $search = new Shop;
        $search->title_product = $request->input('title');
        $products = Shop::where('title_product', 'LIKE', "%{$search->title_product}%")->get();
        $brand = new ShopController();
        $brands = $brand->brandAdd();
        return view('layouts.search-title', ['products' => $products, 'brands' => $brands]);
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
        $brand = new ShopController();
        $brands = $brand->brandAdd();
        return view('layouts.search-title', ['products' => $products, 'brands' => $brands]);
    }

    public function brandFilter(Request $request)
    {
        $checkedBrands = $request->brand;
        if (!isset($checkedBrands)){
            return redirect('shop');
        }else{
            $products = Shop::whereIn('brand', $checkedBrands)->get();
            $brand = new ShopController();
            $brands = $brand->brandAdd();
            return view('layouts.search-title', ['products' => $products, 'brands' => $brands]);
        }
    }

    public function brandAdd()
    {
        $brands = Shop::distinct()->get('brand');
        if (count($brands) == 0 ){
            $brands = Null;
        }
        return $brands;
    }
}
