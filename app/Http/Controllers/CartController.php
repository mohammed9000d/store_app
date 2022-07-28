<?php

namespace App\Http\Controllers;

use App\Http\Traits\CartTrait;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CartController extends Controller
{

    use CartTrait;

    public function index()
    {
        return view('components.cart-menu', [
            'cart' => $this->all(),
            'total' => $this->quantity()
        ]);
    }

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
        $cart = $this->add($request->post('product_id'), $request->post('quantity', 1));
        if($request->expectsJson()){
            return $this->all();
        }
        return redirect()->back()->with('success', 'Product added to cart');
    }
}
