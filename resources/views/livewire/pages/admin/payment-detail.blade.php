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
    <span wire:ignore>
      <x-navbar />
    </span>
    <div class="drawer lg:drawer-open">
        <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content ">
            <div>
                <div class="overflow-x-auto p-8">
                    <table class="table w-full mx-auto text-center">
                      <!-- head -->
                      <thead>
                        <tr class="text-center">
                          <th>No.</th>
                          <th>Nama Pelanggan</th>
                          <th>No. Telepon</th>
                          <th>Alamat</th>
                          <th>Tanggal Pembelian</th>
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
                                {{$order->user->name}}
                            </td>
                            <td>
                              {{$order->user->phone}}
                            </td>
                            <td>
                              {{$order->user->address}}
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
        </div> 
        <div class="drawer-side">
          <label for="my-drawer-2" aria-label="close sidebar" class="drawer-overlay"></label> 
          <ul class="menu p-4 w-80 min-h-full bg-base-200 text-base-content">
            <h2 class="text-xl font-bold">Dashboard</h2>
            <!-- Sidebar content here -->
            <li>
              <a class="text-lg hover:text-emerald-500 {{ Route::is('admin.index') ? 'bg-emerald-500 rounded-md text-white' : ''}}" href="{{route('admin.index')}}" wire:navigate wire:ignore>
                <span class="text-2xl">
                  <ion-icon name="home-outline"></ion-icon>
                </span>
                Beranda
              </a>
            </li>
            <li>
              <a class="text-lg hover:text-emerald-500 {{ Route::is('admin.post') ? 'bg-emerald-500 rounded-md text-white' : ''}}" href="{{route('admin.post')}}" wire:navigate wire:ignore>
                <span class="text-2xl">
                  <ion-icon name="bag-add-outline"></ion-icon>
                </span>
                Tambah Produk
              </a>
            </li>
            <li>
              <a class="text-lg hover:text-emerald-500 {{ Route::is('admin.product') ? 'bg-emerald-500 rounded-md text-white' : ''}}" href="{{route('admin.product')}}" wire:navigate wire:ignore>
                <span class="text-2xl">
                  <ion-icon name="bag-outline"></ion-icon>
                </span>
                Lihat Produk
              </a>
            </li>
            <li>
              <a class="text-lg hover:text-emerald-500 {{ Route::is('admin.liga.post') ? 'bg-emerald-500 rounded-md text-white' : ''}}" href="{{route('admin.liga.post')}}" wire:navigate wire:ignore>
                <span class="text-2xl">
                  <ion-icon name="add-outline"></ion-icon>
                </span>
                Tambah Liga
              </a>
            </li>
            <li>
              <a class="text-lg hover:text-emerald-500 {{ Route::is('admin.liga') ? 'bg-emerald-500 rounded-md text-white' : ''}}" href="{{route('admin.liga')}}" wire:navigate wire:ignore>
                <span class="text-2xl">
                  <ion-icon name="football-outline"></ion-icon>
                </span>
                Lihat Liga
              </a>
            </li>  
            <li>
              <a class="text-lg hover:text-emerald-500 {{ Route::is('admin.payment') ? 'bg-emerald-500 rounded-md text-white' : ''}}" href="{{route('admin.payment')}}" wire:navigate wire:ignore>
                <span class="text-2xl">
                  <ion-icon name="card-outline"></ion-icon>
                </span>
                Pembayaran
              </a>
            </li>
          </ul>
        </div>
    </div>
</div>
