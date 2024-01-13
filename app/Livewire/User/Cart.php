<?php

namespace App\Livewire\User;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Keranjang')]
#[Layout('components.layouts.user')]

class Cart extends Component
{

    protected $order;
    protected $order_details = []; 

    public function destroy($id)
    {
        $order_detail = OrderDetail::find($id);
        if(!empty($order_detail)){
            $order = Order::where('id', $order_detail->order_id)->first();
            $total_order_detail = OrderDetail::where('order_id', $order->id)->count();
            $product = Product::find($order_detail->product_id);
            if($total_order_detail == 1){
                $order->delete();
                $product->update(['is_ready' => true]);
            }else{
                $order->total_price = $order->total_price - $order_detail->total_price;
                $order->update();
                $product->update(['is_ready' => true]);
            }
            $order_detail->delete();
            
            flash('Pesanan dihapus dari keranjang', 'error');
            return redirect()->route('user.cart');
        }
    }

    public function checkout($id)
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        if (Auth::user()->address != null && Auth::user()->phone) {
            $order = Order::find($id);

            $params = array(
                'transaction_details' => array(
                    'order_id' => $order->id,
                    'gross_amount' => $order->total_price,
                ),
                'customer_details' => array(
                    'name' => Auth::user()->name,
                    'address' => Auth::user()->address,
                    'phone' => Auth::user()->phone,
                    'email' => Auth::user()->email,
                ),
            );

            $snapToken = \Midtrans\Snap::getSnapToken($params);
            $order->snap_token = $snapToken;
            $order->update();
            return redirect()->route('user.payment', $order->id);
        } else {
            redirect()->route('profile.setting');
            flash("Tolong lengkapi data diri dahulu sebelum melakukan checkout", 'error');
        }
        
    }

    public function render()
    {
        $this->order = Order::where('user_id', Auth::user()->id)->where('status',0)->first();
        if($this->order){
            $this->order_details = OrderDetail::where('order_id', $this->order->id)->get();
        }
        return view('livewire.pages.user.cart', [
            'order' => $this->order,
            'order_details' => $this->order_details,
        ]);
    }
}
