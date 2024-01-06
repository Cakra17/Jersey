<div>
    <span wire:ignore>
      <x-navbar />
    </span>
    <div class="drawer lg:drawer-open">
        <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content">
          <form class=" w-full mx-auto p-8 rounded-lg" wire:submit="save">
            <h2 class="text-4xl dark:text-white font-bold ">Tambah Produk</h2>

            @if (flash()->message)
              @if (flash()->class === 'success')
                <div role="alert" class="alert alert-success my-3">
                  <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                  <span>{{ flash()->message}}</span>
                </div>              
              @endif
              @if (flash()->class === 'error')
                <div role="alert" class="alert alert-error my-3">
                  <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                  <span>{{ flash()->message}}</span>
                </div> 
              @endif
            @endif

            <div class="flex flex-col text-gray-400 py-2">
                <label for="productName">Nama Produk</label>
                <input class="rounded-lg bg-gray-700 mt-2 p-2 focus:border-blue-500 focus:bg-gray-800 focus:outline-none" type="text" name="productName" id="productName" wire:model='name'>
                @error('name')
                  <small class="text-red-500 justify-center">{{ $message }}</small>
                @enderror
            </div>
            <div class="flex flex-col text-gray-400 py-2">
                <label>Liga</label>
                <select class="select bg-gray-700 mt-2 p-2 w-full" wire:model="liga_id" >
                    <option disabled>Pilih Liga</option>
                    <option value="1">Bundesliga</option>
                    <option value="2">Premier League</option>
                    <option value="3">La liga</option>
                    <option value="4">Serie A</option>
                </select>
            </div>
            <div class="flex flex-col text-gray-400 py-2">
              <label for="price">Harga</label>
              <input class="rounded-lg bg-gray-700 mt-2 p-2 focus:border-blue-500 focus:bg-gray-800 focus:outline-none" type="text" name="price" id="price" wire:model='price'>
              @error('price')
                <small class="text-red-500 justify-center">{{ $message }}</small>
              @enderror
            </div>
            <div class="flex flex-col text-gray-400 py-2">
              <label for="description">Deskripsi</label>
              <textarea class="rounded-lg bg-gray-700 mt-2 p-2 focus:border-blue-500 focus:bg-gray-800 focus:outline-none" name="description" id="description" rows="5" wire:model="description"></textarea>
              @error('description')
                <small class="text-red-500 justify-center">{{ $message }}</small>
              @enderror
            </div>
            <div class="flex flex-col text-gray-400 py-2">
              <label for="thumb">Gambar Produk</label>
              <input class="file-input file-input-bordered w-full bg-gray-700" type="file" name="thumb" id="" accept="image/*" wire:model='image'>
              @error('image')
                <small class="text-red-500 justify-center">{{ $message }}</small>
              @enderror
            </div>
          
            <button type="submit" class="btn btn-accent my-5 py-2 shadow-lg text-white font-semibold text-lg" >
                <span wire:loading.remove>Tambah</span>
                <span class="loading loading-spinner loading-md" wire:loading></span>
            </button>
            
          </form>
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
            <li><a class="text-lg hover:text-emerald-500 {{ Route::is('admin') ? 'bg-emerald-500 rounded-md text-white' : ''}}">Pembayaran</a></li>
            <li><a class="text-lg hover:text-emerald-500 {{ Route::is('admin') ? 'bg-emerald-500 rounded-md text-white' : ''}}">Pembayaran</a></li>
          </ul>
        </div>
      </div>
</div>
