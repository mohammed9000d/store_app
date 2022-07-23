<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use Livewire\Component;

class Products extends Component
{
    public function render()
    {
        $products = Product::with('category')->paginate(5);
        return view('livewire.products.products');
    }
}
