<?php

namespace App\Livewire\User;

use App\Models\Wishlist as ModelsWishlist;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Wishlist')]

class Wishlist extends Component
{
    public function render()
    {
        $wishlists = ModelsWishlist::paginate(8);
        return view('livewire.pages.user.wishlist',compact('wishlists'));
    }
}
