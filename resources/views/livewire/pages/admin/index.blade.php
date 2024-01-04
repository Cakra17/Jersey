<div>
    <span wire:ignore>
      <x-navbar />
    </span>
    <div class="drawer lg:drawer-open">
        <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content ">
          <div class="h-[350px] grid grid-cols-3 gap-12 items-center p-6">
            <div class="bg-white/10 h-2/3 flex items-center rounded-xl">
              <div class="mx-auto">
                <h1 class="lg:text-3xl text-xl font-bold">Total Barang</h1>
                <p class="opacity-50 text-xl hover:text-emerald-400">{{$totalProducts}} Items</p>
              </div>
              <div class="text-6xl mx-auto">
                <ion-icon name="bag-handle"></ion-icon>
              </div>
            </div>
            <div class="bg-white/10 h-2/3 flex items-center rounded-xl">
              <div class="mx-auto">
                <h1 class="lg:text-3xl text-xl font-bold">Total Pemasukan</h1>
                <p class="opacity-50 text-xl">10,000</p>
              </div>
              <div class="text-6xl mx-auto">
                <ion-icon name="cash-outline"></ion-icon>
              </div>
            </div>
            <div class="bg-white/10 h-2/3 flex items-center rounded-xl">
              <div class="mx-auto">
                <h1 class="lg:text-3xl text-xl font-bold">Total Order</h1>
                <p class="opacity-50 text-xl">10,000</p>
              </div>
              <div class="text-6xl mx-auto">
                <ion-icon name="pricetags"></ion-icon>
              </div>
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
            <li><a class="text-lg hover:text-emerald-500 {{ Route::is('admin') ? 'bg-emerald-500 rounded-md text-white' : ''}}">Pembayaran</a></li>
            <li><a class="text-lg hover:text-emerald-500 {{ Route::is('admin') ? 'bg-emerald-500 rounded-md text-white' : ''}}">Pembayaran</a></li>
          </ul>
        </div>
    </div>
</div>
