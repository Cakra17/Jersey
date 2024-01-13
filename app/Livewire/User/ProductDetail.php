<?php

namespace App\Livewire\User;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Detail Produk')]

class ProductDetail extends Component
{
    public $product;

    public function mount($id)
    {
        $this->product = Product::find($id);
    }

    public function addToCart() 
    {

        $order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();

        try {
            if(empty($order)){
                Order::create([
                    'user_id' => Auth::user()->id,
                    'total_price' => $this->product->price,
                    'status' => 0,
                    'unique_code' => mt_rand(1000,9999),
                ]);
    
                $order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
                $order->order_code = 'RTS-'.$order->id;
                $order->update();
            } else {
                $order->total_price = $order->total_price + $this->product->price;
                $order->update();
            }
    
            OrderDetail::create([
                'product_id' => $this->product->id,
                'order_id' => $order->id,
                'total_orders' => 1,
                'total_price' => $this->product->price,
            ]);
            $product = Product::find($this->product->id);
            $product->update(['is_ready' => false]);
            flash('Berhasil menambahkan ke keranjang', 'success');
            return redirect()->route('user.productDetail',['id' => $this->product->id]);

        } catch (\Throwable $th) {
            flash('Gagal menambahkan ke keranjang', 'error');
        }

        
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
                    'product_name' => $this->product->name,
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
