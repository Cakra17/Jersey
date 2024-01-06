@php

    function rupiah($price)
    {
        $hasil_rupiah = "Rp " . number_format($price,2,',','.');
	      return $hasil_rupiah;
    }
    
    function checkImagePath($image)
    {
      if (substr($image, 0, 5) === 'https') {
        return url($image);
      }else {
        return url('assets/jersey/'.$image);
      }
    }

    function formatDescription($text)
    {
      return nl2br(e($text));
    }

@endphp
<section>
  <div class="w-full min-h-screen flex justify-center items-center flex-col">
    <div class="grid grid-col-1 lg:grid-cols-2 w-3/4 card bg-neutral-400/10 shadow-2xl mx-auto">
      <div>
        <img src="{{ checkImagePath($product->image) }}" alt="{{$product->name}}">
      </div>
      <div class="flex flex-col gap-6 p-6">
        <div class="flex flex-col gap-6">
          <h1 class="text-4xl text-white">{{$product->name}}</h1>
          <p class="text-lg text-white">{{rupiah($product->price)}}</p>
          <p class="text-white">{!! formatDescription($product->description) !!}</p>
        </div>
        <div class="flex flex-col lg:w-2/3 mx-auto gap-4 justify-end lg:h-full">
          <button class="btn btn-primary rounded-2xl">Tambah ke Wishlist</button>
          <button class="btn btn-accent rounded-2xl">Tambah ke Keranjang</button>
        </div>
      </div>
    </div>
  </div>
</section>
