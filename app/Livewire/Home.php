<?php

namespace App\Livewire;

use App\Models\Liga;
use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title("Selamat datang | Retrostrips Homepage")]

class Home extends Component
{

    public function render()
    {
        $products = Product::all()->take(8);
        $ligas = Liga::all();
        return view('livewire.home',[
            'ligas' => $ligas,
            'products' => $products,
        ]);
    }
}
