<div class="drawer lg:drawer-open">
  <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
  <div class="drawer-content">
    @if (Route::is('admin.index'))
        hehe
    @elseif (Route::is('admin.post'))
        <x-add-product/>
    @endif
  </div> 
  <div class="drawer-side">
    <label for="my-drawer-2" aria-label="close sidebar" class="drawer-overlay"></label> 
    <ul class="menu p-4 w-80 min-h-full bg-base-200 text-base-content">
      <h2 class="text-xl">Dashboard</h2>
      <!-- Sidebar content here -->
      <li><a class="hover:text-emerald-500 {{ Route::is('admin.index') ? 'bg-emerald-500 rounded-md text-white' : ''}}" href="{{route('admin.index')}}" wire:navigate>Beranda</a></li>
      <li><a class="hover:text-emerald-500 {{ Route::is('admin.post') ? 'bg-emerald-500 rounded-md text-white' : ''}}" href="{{route('admin.post')}}" wire:navigate>Tambah Produk</a></li>
      <li><a class="hover:text-emerald-500 {{ Route::is('admin') ? 'bg-emerald-500 rounded-md text-white' : ''}}">Lihat Produk</a></li>
      <li><a class="hover:text-emerald-500 {{ Route::is('admin') ? 'bg-emerald-500 rounded-md text-white' : ''}}">Pembayaran</a></li>
      <li><a class="hover:text-emerald-500 {{ Route::is('admin') ? 'bg-emerald-500 rounded-md text-white' : ''}}">Pembayaran</a></li>
    </ul>
  </div>
</div>