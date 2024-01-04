<?php

namespace App\Livewire\Admin;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Admin Dashboard')]

#[Layout('components.layouts.guest')]

class Index extends Component
{

    public function render()
    {
        return view('livewire.pages.admin.index',[
            'totalProducts' => Product::count(),
        ]);
    }
}
