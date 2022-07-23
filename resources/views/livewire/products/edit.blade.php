<x-show-modal id="kt_modal_2" title="Edit Product" request="update" submit="Save Change">
    <div class="fv-row mb-7 fv-plugins-icon-container">
        <input hidden wire:model="selected_id">
        <x-normal-input label="Name" name="name" placeholder="Enter Name" />
    </div>
    <div class="fv-row mb-7 fv-plugins-icon-container">
        <label class="required fw-bold fs-6 mb-2">Category Name</label>
        <select wire:model="category_id" name="category_id"
                class="form-control form-select form-select-solid" name="option">
            <option value="" style="color: #B5B5C3">-- Select --</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id0') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="fv-row mb-7 fv-plugins-icon-container">
        <x-textarea label="Description" name="description" placeholder="Enter Description....." />
    </div>
    <div class="fv-row mb-7 fv-plugins-icon-container">
        <x-normal-input label="Price" name="price" placeholder="Price" />
    </div>
    <div class="fv-row mb-7 fv-plugins-icon-container">
        <x-normal-input label="Quantity" name="quantity" placeholder="Quantity" />
    </div>
    <div class="fv-row mb-7 fv-plugins-icon-container">
        <x-image-input label="Image" name="image" :image="$image"
                       :background="$this->forEditImage !== null ? $this->forEditImage : '/images/placeholder.png'" />
    </div>
    <div class="fv-row mb-7 fv-plugins-icon-container">
        <x-status-input label="Status" name="status" />
    </div>
</x-show-modal>
