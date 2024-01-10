<?php

namespace App\Livewire\User;

use App\Models\Wishlist as ModelsWishlist;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Wishlist')]

class Wishlist extends Component
{
    public $wishlistid;

    public function check($id)
    {
        $this->wishlistid = $id;
    }

    public function destroy() 
    {
        $wishlist = ModelsWishlist::find($this->wishlistid);
        $wishlist->delete();
        return redirect()->route('user.wishlist');
    }

    public function render()
    {
        $wishlists = ModelsWishlist::paginate(8);
        return view('livewire.pages.user.wishlist',compact('wishlists'));
    }
}
