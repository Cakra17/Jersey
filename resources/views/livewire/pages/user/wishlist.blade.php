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
        <h1 class="mt-5 lg:mb-2 text-xl lg:text-3xl text-white capitalize font-bold">Wishlist</h1>
        <p class="lg:mb-3 mb-5">Produk yang telah anda sukai</p>
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
            <div class="flex justify-center flex-col items-center lg:flex-row lg:flex-wrap lg:items-stretch gap-8 mt-6 pb-6">
              @foreach ($wishlists as $wishlist)
              <div class="card lg:w-1/5 w-3/5 bg-neutral-400/10 shadow-2xl">
                  <figure><img src="{{ checkImagePath($wishlist->product->image)}}" alt="jersey" /></figure>
                  <div class="card-body">
                    <h2 class="card-title">{{$wishlist->product->name}}</h2>
                    <p>{{ rupiah($wishlist->product->price) }}</p>
                    <div class="card-actions justify-end">
                      <a href="{{route('user.productDetail', $wishlist->product->id)}}" class="btn btn-primary" wire:navigate>
                        <span class="text-2xl flex justify-center items-center">
                          <ion-icon name="eye-outline" wire:ignore></ion-icon>
                        </span>
                        Detail
                      </a>
                      <!-- Open the modal using ID.showModal() method -->
                      <button class="btn btn-error" onclick="my_modal_1.showModal()" wire:click="check({{$wishlist->id}})">
                        <span class="text-2xl flex justify-center items-center">
                          <ion-icon name="trash-outline" wire:ignore></ion-icon>
                        </span>
                        Remove
                      </button>
                      <dialog id="my_modal_1" class="modal" wire:ignore>
                        <div class="modal-box">
                          <h3 class="font-bold text-lg">Peringatan!</h3>
                          <p class="py-4">Apakah kamu yakin menghapus data ini?</p>
                          <div class="modal-action">
                            <form method="dialog">
                              <!-- if there is a button in form, it will close the modal -->
                              <button class="btn btn-error" wire:click="destroy()" >Delete</button>
                              <button class="btn">Close</button>
                            </form>
                          </div>
                        </div>
                      </dialog>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
            {{-- PAGINATION --}}
            <div class="flex justify-center items-center">
              {{ $wishlists->links('components.custom-pagination-links') }}  
            </div>
        </div>
    </div>
</div>
