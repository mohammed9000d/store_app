<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CartController extends Controller
{

    public function store(Request $request) {
        $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'quantity' => ['integer', 'min:1', function($att, $value, $fail) {
                $id = request()->input('product_id');
                $product = Product::find($id);
                if($value > $product->quantity){
                    $fail('There are only ' . $product->quantity . ' items in stock');
                }
            }]
        ]);
        Cart::updateOrCreate([
            'cookie_id' => $this->getCookieId(),
            'product_id'=> $request->product_id,
        ],[
            'user_id' => Auth::id(),
            'quantity' => DB::raw('quantity +'.$request->quantity),
        ]);
        return redirect()->back()->with('success', 'Product added to cart');
    }

    public function getCookieId()
    {
        $id = Cookie::get('cart_cookie_id');
        if(!$id){
            $id = Str::uuid();
            Cookie::queue('cart_cookie_id', $id, 60 * 24 * 30);
        }
        return $id;
    }

}
