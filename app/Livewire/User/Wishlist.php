<?php

namespace App\Livewire\User;

use App\Models\Wishlist as ModelsWishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;

#[Title('Wishlist')]

class Wishlist extends Component
{
    public $wishlistid;

    #[Url]
    public $search;

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
        $wishlists = ModelsWishlist::where('user_id', Auth::user()->id)->where('product_name', 'like', "%{$this->search}%")->paginate(8);
        return view('livewire.pages.user.wishlist',compact('wishlists'));
    }
}
