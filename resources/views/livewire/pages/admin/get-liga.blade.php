@php
    
    function checkImagePathLiga($image)
    {
      if (substr($image,0, 5) === 'https') {
        return url($image);
      }else {
        return url('assets/liga/'.$image);
      }
    }

@endphp

<div>
    <span wire:ignore>
      <x-navbar />
    </span>
    <div class="drawer lg:drawer-open">
        <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content">
          <div class="w-full min-h-screen p-8">
            <h2 class="text-4xl dark:text-white font-bold text-center lg:text-left">Lihat Liga</h2>
            <div class="w-2/3 relative mx-auto lg:my-10">
              <div class="relative">
                  <input type="text" placeholder="Type here" class="input input-bordered w-full rounded-2xl" wire:model.live="search"/>
                  <div>
                      <ion-icon name="search" class="absolute right-[0.01rem] top-1/2 -translate-y-1/2 p-4 bg-slate-600 rounded-e-2xl" wire:ignore></ion-icon>
                  </div>
              </div>
            </div>
            <div class="grid grid-cols-1 content-center lg:grid-cols-4 md:grid-cols-2 justify-items-center gap-8 p-8">
                @foreach ($ligas as $liga)
                <div class="card h-full bg-slate-400/40 p-6">
                  <div class="w-72 p-6 flex justify-center" href="{{route('user.productLiga', $liga->id)}}" wire:navigate>
                    <img src="{{ checkImagePathLiga($liga->image)}}" alt="" class="max-h-[100px] lg:max-h-[130px]"/>
                  </div>
                  <div class="flex justify-end gap-4">
                    <a class="btn btn-warning" href="{{route('admin.liga.edit', $liga->id)}}" wire:navigate>
                      <span class="text-2xl flex justify-center items-center">
                        <ion-icon name="settings-outline" wire:ignore></ion-icon>
                      </span>
                      Edit
                    </a>
                    <!-- Open the modal using ID.showModal() method -->
                    <button class="btn btn-error" onclick="my_modal_1.showModal()" wire:click="check({{$liga->id}})">
                      <span class="text-2xl flex justify-center items-center" wire:ignore>
                        <ion-icon name="trash-outline"></ion-icon>
                      </span>
                      Delete
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
              @endforeach
            </div>
            {{-- PAGINATION --}}
            <div class="flex justify-center items-center">
              {{ $ligas->links('components.custom-pagination-links') }}  
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
                <span class="text-2xl" wire:ignore>
                  <ion-icon name="home-outline"></ion-icon>
                </span>
                Beranda
              </a>
            </li>
            <li>
              <a class="text-lg hover:text-emerald-500 {{ Route::is('admin.post') ? 'bg-emerald-500 rounded-md text-white' : ''}}" href="{{route('admin.post')}}" wire:navigate wire:ignore>
                <span class="text-2xl" wire:ignore>
                  <ion-icon name="bag-add-outline"></ion-icon>
                </span>
                Tambah Produk
              </a>
            </li>
            <li>
              <a class="text-lg hover:text-emerald-500 {{ Route::is('admin.product') ? 'bg-emerald-500 rounded-md text-white' : ''}}" href="{{route('admin.product')}}" wire:navigate wire:ignore>
                <span class="text-2xl" wire:ignore>
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
