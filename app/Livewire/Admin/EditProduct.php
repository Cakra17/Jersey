<?php

namespace App\Livewire\Admin;

use App\Http\Controllers\CloudinaryStorage;
use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

#[Title('Edit Produk')]
#[Layout('components.layouts.guest')]

class EditProduct extends Component
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

    public $product;

    public function mount($id){
        $this->product = Product::find($id); 
        
        $this->name = $this->product->name;
        $this->liga_id = $this->product->liga_id;
        $this->price = $this->product->price;
        $this->description = $this->product->description;
    }

    public function update()
    {
        $validated = $this->validate();
        $validated['image'] = CloudinaryStorage::replace($validated['image'], $validated['image']->getRealPath(), $validated['image']->getClientOriginalName());
        try {
            $this->product->update($validated);
            flash('Post has been updated', 'success');
        } catch (\Throwable $th) {
            flash('Failed to update a Post', 'error');
        }
    }
    
    public function render()
    {
        return view('livewire.pages.admin.edit-product',[
            'product' => $this->product
        ]);
    }

    
}
