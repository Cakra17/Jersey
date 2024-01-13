@php
  use App\Models\Liga;
  use App\Models\Wishlist;
  use App\Models\Order;
  use App\Models\OrderDetail;

  $ligas_europe = Liga::where('region_id', 1)->get();
  $ligas_america = Liga::where('region_id', 2)->get();  
  $ligas_asia = Liga::where('region_id', 3)->get();
  $order_details = 0;

  if (Auth::user()) {
    $wishlist = Wishlist::where('user_id', Auth::user()->id)->count();
    $order = Order::where('user_id', Auth::user()->id)->where('status',0)->first();
    if($order)
    {
      $order_details = OrderDetail::where('order_id', $order->id)->count();
    }
  }

@endphp

<div class="flex justify-between items-center w-full mx-auto p-2 bg-[#232D3F]">
  {{-- SIDEBAR HAMBURGER --}}
  @if (Route::is('admin.*'))
    <label for="my-drawer-2">
      <ion-icon name="menu" class="text-3xl cursor-pointer lg:hidden drawer-button" for="my-drawer-2" wire:ignore></ion-icon>
    </label>
  @endif
  {{-- LOGO --}}
  <div class="mx-3">
    <a class="text text-2xl font-bold bg-gradient-to-r from-white via-emerald-300 to-red-500 inline-block text-transparent bg-clip-text" href="/" wire:navigate>RetroStrips</a>
  </div>
  {{-- NAVLINKS --}}
  @if (Route::is('home') || Route::is('user.*'))
    <div class="nav-links md:static md:min-h-fit absolute md:bg-inherit bg-black min-h-[60vh] left-0 top-[-100%] md:w-auto w-full z-10 flex items-center px-5">
      <ul class="flex md:flex-row flex-col md:items-center md:gap-[4vw] gap-8">
        <li>
          <div class="dropdown dropdown-hover">
            <div tabindex="0" role="button" class="m-1 hover:text-accent transition text-white font-bold">Klub</div>
            <ul tabindex="0" class="dropdown-content bg-white z-[1] menu p-2 shadow  w-52">
              <li>
                <details class="dropdown dropdown-right">
                  <summary class="m-1 text-black list-none">Eropa</summary>
                  <ul class="p-2 shadow menu dropdown-content z-[1] bg-white rounded-box w-52">
                    @if($ligas_europe->isEmpty())
                      <li><a class="pointer-events-none">Liga tidak tersedia</a></li>
                    @else
                      @foreach ($ligas_europe as $liga)
                        <li><a class="hover:bg-emerald-500 text-black" href="{{route('user.productLiga',$liga->id)}}" wire:navigate>{{$liga->name}}</a></li>
                      @endforeach
                    @endif
                  </ul>
                </details>
              </li>
              <li>
                <details class="dropdown dropdown-right">
                  <summary class="m-1 text-black " >Amerika</summary>
                  <ul class="p-2 shadow menu dropdown-content z-[1] bg-white rounded-box w-52">
                    @if($ligas_america->isEmpty())
                      <li><a class="pointer-events-none">Liga tidak tersedia</a></li>
                    @else
                      @foreach ($ligas_america as $liga)
                        <li><a class="hover:bg-emerald-500 text-black" href="{{route('user.productLiga',$liga->id)}}" wire:navigate>{{$liga->name}}</a></li>
                      @endforeach
                    @endif
                  </ul>
                </details>
              </li>
              <li>
                <details class="dropdown dropdown-right">
                  <summary class="m-1 text-black ">Asia</summary>
                  <ul class="p-2 shadow menu dropdown-content z-[1] bg-white rounded-box w-52">
                    @if($ligas_asia->isEmpty())
                      <li><a class="pointer-events-none">Liga tidak tersedia</a></li>
                    @else
                      @foreach ($ligas_asia as $liga)
                        <li><a class="hover:bg-emerald-500 text-black" href="{{route('user.productLiga',$liga->id)}}" wire:navigate>{{$liga->name}}</a></li>
                      @endforeach
                    @endif
                  </ul>
                </details>
              </li>
              <li><a href="{{route('user.product')}}" class="text-black" wire:navigate>Semua Klub</a></li>
            </ul>
          </div>
        </li>
        <li>
          <a class="hover:text-accent transition text-white font-bold" href="#">Tentang</a>
        </li>
        <li>
          <a class="hover:text-accent transition text-white font-bold" href="#">Kontak</a>
        </li>
        <li>
          <a class="hover:text-accent transition text-white font-bold" href="#">Media Sosial</a>
        </li>
      </ul>
    </div>
  @endif
  <div class="flex items-center gap-6">
    {{-- AUTH DROPDOWN --}}
    @auth
      {{-- ADMIN DROPDOWN --}}
      @if(Auth::user()->role == 'admin')
      <div class="dropdown dropdown-end">
        <div class="flex justify-center items-center">
          <p class="mx-2 text-white">{{Auth::user()->name}}</p>
          <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
            <div class="w-10 rounded-full">
              <img alt="Tailwind CSS Navbar component" src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
            </div>
          </div>
        </div>
        <ul tabindex="0" class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52">
          <li>
            <a class="justify-between" href="/admin" wire:navigate>
              Dashboard
            </a>
          </li>
          <li>
            <a href="{{route('profile.setting')}}">
              Settings
            </a>
          </li>
          <li>
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button type="submit">Logout</button>
            </form>
          </li>
        </ul>
      </div>
      @else
      {{-- PELANGGAN DROPDOWN --}}
      <div class="flex justify-end">
        <div class="flex justify-center items-center">
          <a class="mx-2 flex justify-center items-center hover:text-emerald-500" href="{{route('user.cart')}}" wire:navigate>
            <span class="flex justify-center items-center text-2xl">
              <ion-icon name="cart-outline" wire:ignore></ion-icon>
            </span>
            <p class="badge badge-primary badge-outline">{{$order_details}}</p>
          </a>
          <a class="mx-2 text-2xl flex justify-center items-center hover:text-emerald-500" href="{{route('user.wishlist')}}" wire:navigate>
            <span class="flex justify-center items-center text-2xl">
              <ion-icon name="heart-outline" wire:ignore></ion-icon>
            </span>
            <p class="badge badge-primary badge-outline">{{$wishlist}}</p>
          </a>
        </div>
        <div class="dropdown dropdown-end">
          <div class="flex justify-center items-center">
            <p class="mx-2 text-white">{{Auth::user()->name}}</p>
            <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
              <div class="w-10 rounded-full">
                <img alt="Tailwind CSS Navbar component" src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
              </div>
            </div>
          </div>
          <ul tabindex="0" class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52">
            <li>
              <a href="{{route('profile.setting')}}">Settings</a>
            </li>
            <li>
              <a href="{{route('user.history')}}">Riwayat Pembelian</a>
            </li>
            <li>
              <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Logout</button>
              </form>
            </li>
          </ul>
        </div>
      </div>
      @endif
    @else
    {{-- GUEST --}}
    <a class="btn btn-outline btn-accent" href="{{route('register')}}" wire:navigate>Daftar</a>
    <a class="btn btn-outline btn-accent" href="{{route('login')}}" wire:navigate>Masuk</a>
    @endauth
    {{-- HAMBURGER --}}
    @if (Route::is('home'))
    <ion-icon name="menu" class="text-3xl cursor-pointer md:hidden" onclick="onToggleMenu(this)" wire:ignore></ion-icon>
    @endif
  </div>
</div>

<script>
  const navLinks = document.querySelector('.nav-links')

  function onToggleMenu(e) {
    e.name = e.name === 'menu' ? 'close' : 'menu'
    if (e.name === 'close') {
      navLinks.classList.remove('top-[-100%]')
      navLinks.classList.add('top-[9%]')
    } else {
      navLinks.classList.remove('top-[9%]')
      navLinks.classList.add('top-[-100%]')
    }
  }
</script>