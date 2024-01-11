@php

    function rupiah($price)
    {
        $hasil_rupiah = "Rp " . number_format($price,2,',','.');
	      return $hasil_rupiah;
    }
    
    function checkImagePath($image)
    {
      if (substr($image,0, 5) === 'https') {
        return url($image);
      }else {
        return url('assets/jersey/'.$image);
      }
    }

    $no = 1

@endphp

<div>
    <div class="p-8">
        @if (flash()->message)
            <div role="alert" class="alert alert-error my-3 mx-auto lg:w-2/3">
                <span>{{ flash()->message}}</span>
            </div>     
        @endif
    </div>
    <div class="overflow-x-auto p-8">
        <table class="table w-[60%] mx-auto text-center">
          <!-- head -->
          <thead>
            <tr class="text-center">
              <th>No.</th>
              <th>Gambar</th>
              <th>Nama Produk</th>
              <th><span class="text-white">Harga</span></th>
            </tr>
          </thead>
          <tbody>
            @forelse ($order_details as $order_detail)
            <tr>
                <td>
                  <span>{{$no++}}</span>
                </td>
                <td>
                  <div class="max-w-[200px] mx-auto">
                      <img src="{{checkImagePath($order_detail->product->image)}}" alt="Avatar Tailwind CSS Component" />
                  </div>
                </td>
                <td>
                  <span>{{$order_detail->product->name}}</span>
                </td>
                <td>
                    <span class="text-white font-bold">{{rupiah($order_detail->total_price)}}</span>
                </td>
                <td>
                    <button wire:click="destroy({{$order_detail->id}})">
                        <span class="text-2xl hover:text-red-500">
                            <ion-icon name="trash-outline" wire:ignore></ion-icon>
                        </span>
                    </button>
                </td>
            </tr>
            @empty
                <td colspan="4">Data Kosong</td>
            @endforelse

            @if (!empty($order))
            <tr>
                <td colspan="3" align="right" class="font-bold text-white">Total Harga:</td>
                <td class="text-white font-bold">{{rupiah($order->total_price)}}</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3" align="right" class="font-bold text-white">Kode Pesanan:</td>
                <td class="text-white font-bold">{{$order->order_code}}</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td colspan="2">
                    <button wire:click="checkout({{$order->id}})" class="btn btn-success">
                        Checkout
                        <span class="text-2xl flex items-center justify-center">
                            <ion-icon name="arrow-forward-outline" wire:ignore></ion-icon>
                        </span>
                    </button>
                </td>
            </tr>
            @endif
          </tbody>
        </table>
      </div>
</div>
