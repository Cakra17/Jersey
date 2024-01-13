<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AfterPaymentController extends Controller
{
    public function callback(Request $request)
    {
        $severkey = config('midtrans.server_key');
        $hashed = hash('sha512', $request->order_id.$request->status_code.$request->gross_amount.$severkey);
        if($hashed == $request->signature_key)
        {
            if($request->transaction_status == 'capture')
            {
                $order = Order::find($request->order_id);
                $order->update(['status' => 1]);
            }
        }
    }
}
