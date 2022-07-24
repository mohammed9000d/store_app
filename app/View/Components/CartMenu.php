<?php

namespace App\View\Components;

use App\Http\Controllers\CartController;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class CartMenu extends Component
{
    public $items = [];
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        $this->items = collect([]);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        if($this->items->count() == 0){
            $this->items = Cart::where('cookie_id', $this->getCookieId())
                ->orWhere('user_id', Auth::id())
                ->get();
        }
        return view('components.cart-menu', [
            'cart' => $this->items,
            'total' => $this->quantity()
        ]);
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
        $items = $this->items;
        return $items->sum('quantity');
    }
}
