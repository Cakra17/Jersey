<?php

namespace App\Livewire\Admin;

use App\Models\Order;
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
            'totalRevenue' => Order::where('status',1)->sum('total_price'),
            'totalOrder' => Order::where('status',1)->count(),
        ]);
    }
}
