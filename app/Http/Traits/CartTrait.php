<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;
use App\Models\Cart;
use App\Models\Product;

trait CartTrait
{
    public $items = [];

    public function __construct()
    {
        //
        $this->items = collect([]);
    }

    public function all()
    {
        if($this->items->count() == 0){
            if(Auth::check()) {
                $this->items = Cart::where('cookie_id', $this->getCookieId())
                    ->orWhere('user_id', Auth::id())
                    ->get();
            } else {
                $this->items = Cart::where('cookie_id', $this->getCookieId())
                    ->get();
            }
        }
        return $this->items;
    }
    public function add($item, $qty = 1)
    {
        $cart = Cart::updateOrCreate([
            'cookie_id' => $this->getCookieId(),
            'product_id'=> ($item instanceof Product) ? $item->id : $item,
        ],[
            'user_id' => Auth::id(),
            'quantity' => DB::raw('quantity +'.$qty) ,
        ]);
//        $this->items->push($cart);
        $this->items = collect([]);
        return $cart;
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

    public function quantity()
    {
        $items = $this->all();
        return $items->sum('quantity');
    }

    public function total()
    {
        $items = $this->all();
        return $items->sum(function($item){
            return $item->quantity * $item->product->price;
        });
    }
}
