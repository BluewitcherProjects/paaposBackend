<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;

class ProductShowController extends Controller
{
    public function index($subdomain)
    {
        $shop = User::with('products')
            ->whereSubdomain($subdomain)
            ->firstOrFail();
        echo '<pre>';
         
        $products=$shop->products;

        foreach ($products as $value) {
            echo $value;
            echo '<br>';
        }
        
        //return view('products.index', compact('shop'));
    }

    public function show(Request $request)
    {
        $product=Product::where('id',$request->id)->first();

        return $product;//view('products.show', compact('product'));
    }
}
