<?php

namespace App\Livewire\User;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Pembayaran')]
#[Layout('components.layouts.user')]

class Checkout extends Component
{
    public $orderid;

    public function mount($id)
    {
        $this->orderid = $id;
        $order = Order::find($id);
        if(empty($order) || $order->status == 1){
            return redirect()->route('home');
        }
    }
    public function render()
    {
        $order = Order::find($this->orderid);
        return view('livewire.pages.user.checkout',[
            'order' => $order   
        ]);
    }
}
