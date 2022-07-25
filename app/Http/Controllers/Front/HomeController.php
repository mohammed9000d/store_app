<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index()
    {
        $products = Product::latest()->limit(16)->get();
        return view('front.home', ['products' => $products]);
    }

    public function productDetails($slug)
    {
        $product = Product::where('slug', $slug)->first();
        return view('front.product-details', ['product' => $product]);
    }
}
