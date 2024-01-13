<?php

namespace App\Livewire\User;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Riwayat Pembelian')]
#[Layout('components.layouts.user')]

class History extends Component
{
    public function render()
    {
        $orders = Order::where('user_id', Auth::user()->id)->where('status','=',1)->get();
        return view('livewire.pages.user.history',[
            'orders' => $orders
        ]);
    }
}
