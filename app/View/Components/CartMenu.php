<?php

namespace App\View\Components;

use App\Http\Controllers\CartController;
use App\Http\Traits\CartTrait;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class CartMenu extends Component
{
//    public $items = [];
    use CartTrait;
    /**
     * Create a new component instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        //
//        $this->items = collect([]);
//    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $this->all();
        return view('components.cart-menu', [
            'cart' => $this->items,
            'total' => $this->quantity()
        ]);
    }
}
