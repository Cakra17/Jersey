<?php

namespace App\Livewire\Admin;

use App\Http\Controllers\CloudinaryStorage;
use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;


#[Title('Tambah Produk')]

#[Layout('components.layouts.guest')]

class AddProduct extends Component
{
    use WithFileUploads;
    
    #[Validate('required')]
    public $name = '';

    #[Validate('numeric')]
    public $liga_id = '1';

    #[Validate('required', 'numeric')]
    public $price = '';

    #[Validate('required', 'min:5')]
    public $description = '';

    #[Validate('required', 'image', 'mimes:jpeg,jpg,png', 'max:1024')]
    public $image;

    public function save() 
    {
        $validated = $this->validate();
        $validated['image'] = CloudinaryStorage::upload($validated['image']->getRealPath(), $validated['image']->getClientOriginalName());
        try {
            Product::create($validated);
            flash('Post created successfully', 'success');
            $this->reset();
        } catch (\Throwable $th) {
            flash('Failed to make a Post', 'error');
        }

    }

    public function render()
    {
        return view('livewire.pages.admin.add-product');
    }
}
