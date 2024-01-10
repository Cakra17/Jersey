<?php

namespace App\Livewire\User;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Detail Produk')]

class ProductDetail extends Component
{
    public $product;
    public $total_order = 1;

    public function mount($id)
    {
        $this->product = Product::find($id);
    }

    public function addToCart() 
    {
        dd($this->total_order);
    }

    public function addToWishlist()
    {
        $isExist = Wishlist::where('user_id', Auth::user()->id)->where('product_id', $this->product->id)->first();
        if ($isExist) {
            flash('Barang sudah pernah ditambah ke wishlist', 'info');
        } else {
            try {
                Wishlist::create([
                    'user_id' => Auth::user()->id,
                    'product_id' => $this->product->id,
                ]);
                flash('Berhasil menambahkan ke wishlist', 'success');
                return redirect()->route('user.productDetail',['id' => $this->product->id]);    
            } catch (\Throwable $th) {
                flash('Gagal menambahkan ke wishlist', 'error');
            }
        }

    }

    public function render()
    {
        return view('livewire.pages.user.product-detail', [
            "product" => $this->product,
        ]);
    }
}
