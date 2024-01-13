<?php

namespace App\Livewire\User;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Riwayat Pembelian')]
#[Layout('components.layouts.user')]

class History extends Component
{
    public function render()
    {
        return view('livewire.pages.user.history');
    }
}
