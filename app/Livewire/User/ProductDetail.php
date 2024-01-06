<?php

namespace App\Livewire\User;

use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Detail Produk')]

class ProductDetail extends Component
{
    public $product;

    public function mount($id)
    {
        $this->product = Product::find($id);
    }

    public function render()
    {
        return view('livewire.pages.user.product-detail', [
            "product" => $this->product,
        ]);
    }
}
