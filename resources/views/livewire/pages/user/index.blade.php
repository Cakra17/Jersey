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

@endphp

<div>
    <div class=" w-2/3 mx-auto">
        <h1 class="mt-5 lg:mb-2 text-xl lg:text-3xl text-white capitalize font-bold">Cari Produk</h1>
        <p class="lg:mb-3 mb-5">temukan produk yang anda suka</p>
    </div>
    <div class="w-2/3 relative mx-auto lg:my-10">
        <div class="relative">
            <input type="text" placeholder="Type here" class="input input-bordered w-full rounded-2xl" wire:model.live="search"/>
            <div>
                <ion-icon name="search" class="absolute right-[0.01rem] top-1/2 -translate-y-1/2 p-4 bg-slate-600 rounded-e-2xl" wire:ignore></ion-icon>
            </div>
        </div>
    </div>
    <div>
        <div class="w-full p-8">
            <div class="flex justify-center flex-col items-center lg:flex-row lg:flex-wrap lg:items-stretch item-center gap-8 mt-6 pb-6">
              @foreach ($products as $product)
              <div class="card lg:w-1/5 w-3/5 bg-base-100 shadow-xl">
                  <figure><img src="{{ checkImagePath($product->image)}}" alt="jersey" /></figure>
                  <div class="card-body">
                    <h2 class="card-title">{{$product->name}}</h2>
                    <p>{{$product->description}}</p>
                    <p>{{ rupiah($product->price) }}</p>
                    <div class="card-actions justify-end">
                      <a class="btn btn-accent">Beli Sekarang</a>
                    </div>
                  </div>
                </div>
              @endforeach
              {{-- {{dd($products)}} --}}
            </div>
            {{-- PAGINATION --}}
            <div class="flex justify-center items-center">
              {{ $products->links('components.custom-pagination-links') }}  
            </div>
        </div>
    </div>
</div>
