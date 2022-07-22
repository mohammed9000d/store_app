<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class CategoriesLivewire extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $name, $image, $description, $selected_id, $forEditImage;
    public $status;
    public function render()
    {
        return view('livewire.categories.categories-livewire', [
            'categories' => Category::paginate(5)
        ]);
    }

    public function resetInputs()
    {
        $this->name = null;
        $this->image = null;
        $this->description = null;
        $this->status = true;
        $this->forEditImage = null;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string|max:255|min:3|unique:categories,name',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'description' => 'nullable|string|min:3',
            'status' => 'boolean',
        ]);
        $category = Category::create($this->all());
        if($category) {
            $this->resetInputs();
            $this->dispatchBrowserEvent('toast', ['type' => 'success', 'message' => 'Created Category Successfully!']);
            return;
        }
        $this->dispatchBrowserEvent('toast', ['type' => 'error', 'message' => 'Failed to create Category!']);
    }

    public function edit($id)
    {
        $category = Category::find($id);
        $this->name = $category->name;
        $this->description = $category->description;
        $category->status == 'Active' ? $this->status = true : $this->status = false;
        $this->selected_id = $id;
        $this->forEditImage = $category->image_url;
    }

    public function update() {
        $this->validate([
            'name' => 'required|string|max:255|min:3|unique:categories,name,'.$this->selected_id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'description' => 'nullable|string|min:3',
            'status' => 'boolean',
        ]);
        $category = Category::find($this->selected_id);
        $isUpdated = $category->update($this->all());
        if($isUpdated) {
            $this->dispatchBrowserEvent('toast', ['type' => 'success', 'message' => 'Updated Category Successfully!']);
        }else {
            $this->dispatchBrowserEvent('toast', ['type' => 'error', 'message' => 'Failed to update Category!']);
        }
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
    }
}
