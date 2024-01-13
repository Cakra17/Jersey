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
    <div class="overflow-x-auto p-8">
        <table class="table w-[60%] mx-auto text-center">
          <!-- head -->
          <thead>
            <tr class="text-center">
              <th>No.</th>
              <th>Tanggal Pemesanan</th>
              <th>Kode Pemesanan</th>
              <th>Pesanan</th>
              <th>Status</th>
              <th><span class="text-white">Total Harga</span></th>
            </tr>
          </thead>
          <tbody>
            @forelse ($orders as $order)
            <tr>
                <td>
                  <span>{{$no++}}</span>
                </td>
                <td>
                    {{$order->created_at}}
                </td>
                <td>
                    {{$order->order_code}}
                </td>
                <td>
                    <?php $order_details =  \App\Models\OrderDetail::where('order_id', $order->id)->get(); ?>
                    @foreach ($order_details as $order_detail)
                    <div class="max-w-[100px] mx-auto">
                        <img src="{{checkImagePath($order_detail->product->image)}}" alt="Avatar Tailwind CSS Component" />
                        {{$order_detail->product->name}}
                    </div>
                    @endforeach
                </td>
                <td>
                    @if ($order->status == 1)
                    <div class="badge badge-success gap-2">
                        Lunas
                    </div>                          
                    @else
                    <div class="badge badge-error gap-2">
                        Belum Lunas
                    </div> 
                    @endif
                </td>
                <td>
                    {{rupiah($order->total_price)}}
                </td>
            </tr>
            @empty
                <td colspan="4">Data Kosong</td>
            @endforelse

          </tbody>
        </table>
      </div>
</div>
