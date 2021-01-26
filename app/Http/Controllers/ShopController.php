<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\User;
use App\Models\Catalog;

class ShopController extends Controller
{
    public function getShop()
    {
        $products = Catalog::orderBy('id_product', 'desc')->paginate(6);
        $brands = Catalog::distinct()->get('brand');
        return view('shop', ['products' => $products, 'brands' => $brands,]);
    }

    public function titleFilter(Request $request)
    {
        $search = new Catalog;
        $search->title_product = $request->input('title');
        $products = Catalog::where('title_product', 'LIKE', "%{$search->title_product}%")->get();
        return view('layouts.search-title', ['products' => $products]);
    }

    public function filterPrice(Request $request)
    {
        $searchMaxMin = new Catalog;
        $searchMaxMin->title_product = $request->input('filter_price');
        if ($searchMaxMin->title_product == 'dear first'){
            $products = Catalog::orderBy('price',  'desc')->get();
        }else{
            $products = Catalog::orderBy('price',  'asc')->get();
        }
        return view('layouts.search-title', ['products' => $products]);
    }

    public function brandFilter(Request $request)
    {
        //
    }

}
