<?php

namespace App\Http\Livewire\Products;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Products extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $name, $category_id, $price, $image, $quantity, $description, $selected_id, $forEditImage;
    public $status;
    public function render()
    {
        $categories = Category::all();
        $products = Product::with('category')->paginate(5);
        return view('livewire.products.products', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    public function resetInputs()
    {
        $this->name = null;
        $this->image = null;
        $this->description = null;
        $this->status = true;
        $this->forEditImage = null;
        $this->price = null;
        $this->quantity = null;
        $this->category_id = null;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string|max:255|min:3|unique:products,name',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'description' => 'nullable|string|min:3',
            'status' => 'boolean',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'category_id' => 'required|numeric',
        ]);
        $product = Product::create($this->all());
        if($product) {
            $this->resetInputs();
            $this->dispatchBrowserEvent('toast', ['type' => 'success', 'message' => 'Created Product Successfully!']);
        }else{
            $this->dispatchBrowserEvent('toast', ['type' => 'error', 'message' => 'Failed to create Product!']);
        }
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $this->name = $product->name;
        $this->description = $product->description;
        $product->status == 'Active' ? $this->status = true : $this->status = false;
        $this->selected_id = $id;
        $this->forEditImage = $product->image_url;
        $this->price = $product->price;
        $this->quantity = $product->quantity;
        $this->category_id = $product->category_id;
    }

    public function update() {
        $this->validate([
            'name' => 'required|string|max:255|min:3|unique:products,name,'.$this->selected_id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'description' => 'nullable|string|min:3',
            'status' => 'boolean',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'category_id' => 'required|numeric',
        ]);
        $product = Product::find($this->selected_id);
        $isUpdated = $product->update($this->all());
        if($isUpdated) {
            $this->dispatchBrowserEvent('toast', ['type' => 'success', 'message' => 'Updated Product Successfully!']);
        }else{
            $this->dispatchBrowserEvent('toast', ['type' => 'error', 'message' => 'Failed to update Product!']);
        }
    }

    public function destroy($id)
    {
        $category = Product::find($id);
        $category->delete();
    }
}
