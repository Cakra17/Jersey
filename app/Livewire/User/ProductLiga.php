<?php

namespace App\Livewire\User;

use App\Models\Liga;
use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Produk Kami')]
#[Layout('components.layouts.user')]

class ProductLiga extends Component
{
    use WithPagination;

    #[Url()]
    public $search = '';

    public $liga;

    public function mount($ligaid)
    {
        $liga = Liga::find($ligaid);

        $this->liga = $liga;
    }

    public function render()
    {
        $products = Product::latest()->where('liga_id', $this->liga->id)->where('name', 'like', "%{$this->search}%")->paginate(8);
        return view('livewire.pages.user.product-liga', compact('products'));
    }
}
