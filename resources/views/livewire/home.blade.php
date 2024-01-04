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
  <!-- Hero -->
  <section class="hero min-h-screen" style="background-image: url(https://images.unsplash.com/photo-1577212017184-80cc0da11082?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D);">
    <div class="hero-overlay bg-opacity-60 bg-slate-600"></div>
    <div class="hero-content text-center text-neutral-content">
      <div class="max-w-md">
        <h1 class="mb-5 md:text-5xl font-bold text-white text-4xl">Selamat Datang</h1>
        <p class="mb-5 md:text-xl text-white font-semibold text-sm"> <span class="bg-gradient-to-r from-white via-emerald-300 to-red-500 inline-block text-transparent bg-clip-text">RetroStrips</span> adalah tempat jual beli jersey sepakbola retro</p>
        <a class="btn btn-accent" href="#product">Lihat Produk </a>
      </div>
    </div>
  </section>


  <!-- Product -->
  <section class="p-8" id="product">
    <h1 class="font-bold lg:text-5xl text-3xl text-center m-8 text-white">Produk Kami</h1>
  
    <div class="grid grid-cols-1 content-center lg:grid-cols-4 justify-items-center gap-8 ">
      @foreach ($products as $product)
        <div class="card w-4/5 bg-base-100 shadow-xl">
          <figure><img src="{{ checkImagePath($product->image)}}" alt="jersey" /></figure>
          <div class="card-body">
            <h2 class="card-title">{{$product->name}}</h2>
            <p>{{$product->description}}</p>
            <p>{{ rupiah($product->price) }}</p>
            <div class="card-actions justify-end">
              <button class="btn btn-primary">Beli sekarang</button>
            </div>
          </div>
        </div>
      @endforeach
    </div>

    <div class="my-6 flex item-center justify-center">
      <a href="{{route('user.product')}}" class="btn btn-accent" wire:navigate>Lihat Selengkapnya</a>
    </div>
  </section>

  {{-- Liga --}}
  <section class="p-1 min-h-[400px] bg-[#2E4F4F]">
    
    <h1 class="font-bold text-5xl text-center m-8 text-white">Liga</h1>

    <div class="flex lg:flex-row flex-col justify-center items-center gap-6 lg:h-52 h-screen">
      @foreach ($ligas as $liga)
      <div class="card w-96 bg-base-100 shadow-xl justify-center items-center h-full">
        <img src="{{url('assets/liga')}}/{{$liga->image}}" alt="" class="max-h-[100px]"/>
      </div>
      @endforeach
    </div>
  </section>

  
</div>