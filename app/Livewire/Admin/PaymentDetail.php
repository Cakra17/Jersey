<?php

namespace App\Livewire\Admin;

use App\Models\Order;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Payment Detail')]
#[Layout('components.layouts.guest')]

class PaymentDetail extends Component
{
    public function render()
    {
        $orders = Order::where('status','=',1)->get();
        return view('livewire.pages.admin.payment-detail', [
            'orders' => $orders
        ]);
    }
}
