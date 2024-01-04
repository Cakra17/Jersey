<?php

namespace App\Livewire\User;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Produk Kami')]
#[Layout('components.layouts.user')]

class Index extends Component
{
    use WithPagination;

    #[Url]
    public $search = '';

    public function render()
    {
        $products = Product::latest()->where('name', 'like', "%{$this->search}%")->paginate(12);
        return view('livewire.pages.user.index',compact('products'));
    }
}
