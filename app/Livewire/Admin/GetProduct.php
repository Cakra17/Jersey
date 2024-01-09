<?php

namespace App\Livewire\Admin;

use App\Http\Controllers\CloudinaryStorage;
use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Lihat Produk')]

#[Layout('components.layouts.guest')]

class GetProduct extends Component
{
    use WithPagination; 

    #[Url]
    public $search = '';

    public $productid;

    public function check($id)
    {
        $this->productid = $id;
    }

    public function destroy()
    {
        $product = Product::find($this->productid);
        CloudinaryStorage::delete($product->image);
        $product->delete();
    }

    public function render()
    {
        $products = Product::latest()->where('name', 'like', "%{$this->search}%")->paginate(8);
        return view('livewire.pages.admin.get-product', compact('products'));
    }
}
