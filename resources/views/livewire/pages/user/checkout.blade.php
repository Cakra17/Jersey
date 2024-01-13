@php

    function rupiah($price)
    {
        $hasil_rupiah = "Rp " . number_format($price,2,',','.');
	      return $hasil_rupiah;
    }

@endphp

<div class="flex justify-center items-center min-h-screen">
  <div class="card w-[60%] bg-accent text-primary-content">
      <div class="card-body">
        <h2 class="card-title text-2xl"> Hai {{$order->user->name}} :)</h2>
        <p class="text-xl">Detail Pelanggan:</p>
        <p>Nama: {{$order->user->name}}</p>
        <p>Alamat: {{$order->user->address}}</p>
        <p>No Telepon: {{$order->user->phone}}</p>
        
        <p>Silahkan Melakukan Pembayaran Sebesar <strong>{{rupiah($order->total_price)}}</strong></p>
        <div class="card-actions justify-end">
          <button class="btn" id="pay-button">Bayar</button>
        </div>
      </div>
    </div>
</div>

<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{config('midtrans.client_key')}}"></script>
<script type="text/javascript">
  // For example trigger on button clicked, or any time you need
  var payButton = document.getElementById('pay-button');
  payButton.addEventListener('click', function () {
    // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
    window.snap.pay('{{$order->snap_token}}', {
      onSuccess: function(result){
        /* You may add your own implementation here */
        alert("payment success!"); console.log(result);
      },
      onPending: function(result){
        /* You may add your own implementation here */
        alert("wating your payment!"); console.log(result);
      },
      onError: function(result){
        /* You may add your own implementation here */
        alert("payment failed!"); console.log(result);
      },
      onClose: function(){
        /* You may add your own implementation here */
        alert('you closed the popup without finishing the payment');
      }
    })
  });
</script>

