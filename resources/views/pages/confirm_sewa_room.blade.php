@extends('layouts.app6')

@section('title', 'Detail Sewa Studio Room')

@section('content')

<div class="container mx-auto mt-4 px-4">
  <a href="/detail_studio_room/{{ $room->id }}" class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded">
    <i class="fas fa-arrow-left mr-2"></i> BACK
  </a>
</div>

<div class="container mx-auto mt-4 px-4">
  <h2 class="text-center font-bold text-2xl mb-8">Confirm Sewa Room</h2>

  <div class="bg-primary text-white p-4 rounded-3xl flex flex-col lg:flex-row gap-6 items-start lg:items-center justify-between">
    <div class="w-full lg:w-1/2 h-[300px] md:h-[400px] overflow-hidden rounded-3xl">
      <img src="{{ asset($room->photo) }}" alt="{{ $room->room_name }}" class="w-full h-full object-cover rounded-3xl">
    </div>

    <div class="text-white p-5 mt-4 md:mt-0 max-w-md w-full mr-32">
      <h3 class="text-lg font-bold mb-5">{{ $room->room_name }}</h3>

      <div class="mb-3">
        <label class="block mb-1">Total Order</label>
        <input type="text" value="Rp {{ number_format($total_order, 0, ',', '.') }}"
               class="w-full md:w-[500px] border border-white rounded-1xl py-1 px-2 text-primary" readonly />
      </div>

      <h5 class="mt-4">Order Info</h5>

      <form action="/review" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="room_id" value="{{ $room->id }}">
        <input type="hidden" name="order_times" value="{{ json_encode($order_times) }}">

        <input type="text" name="code_order" value="{{ $code_order }}"
               class="w-full md:w-[500px] border border-white rounded-none py-1 px-2 mb-2 text-primary" readonly />
        <input type="text" name="order_date" value="{{ $order_date }}"
               class="w-full md:w-[500px] border border-white rounded-none py-1 px-2 mb-2 text-primary" readonly />
        <input type="text" name="order_time" value="{{ implode(', ', $order_times) }}"
               class="w-full md:w-[500px] border border-white rounded-none py-1 px-2 mb-3 text-primary" readonly />

        <h5 class="mt-4">Payment Method</h5>

        <button type="button" id="pay-button"
                class="w-full md:w-[500px] bg-blue-600 text-white rounded py-3 px-4 mb-3 hover:bg-blue-700">
          Scan QRIS Here
        </button>

          
      </form>
    </div>
  </div>
</div>

<!-- Midtrans Snap JS -->
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script>
document.getElementById('pay-button').addEventListener('click', function () {
    // Tampilkan loading
    this.innerHTML = 'Loading...';
    this.disabled = true;

    // Data yang akan dikirim ke server
    const formData = new FormData();
    formData.append('room_id', {{ $room->id }});
    formData.append('order_times', JSON.stringify({!! json_encode($order_times) !!}));
    formData.append('order_date', '{{ $order_date }}');
    // HAPUS BARIS INI - tidak perlu kirim code_order lagi
    // formData.append('code_order', '{{ $code_order }}');
    formData.append('_token', '{{ csrf_token() }}');

    fetch('/generate-qris', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        // Reset button
        document.getElementById('pay-button').innerHTML = 'Scan QRIS Here';
        document.getElementById('pay-button').disabled = false;

        if (data.success) {

            window.currentOrderId = data.order_id;
            console.log('Saved Order ID:', data.order_id);
            // Buka Midtrans Snap popup
            snap.pay(data.snap_token, {
                onSuccess: function(result) {
                  console.log('Payment Success Result:', result);
                  alert("Payment success!");
                  
                  // Ambil order_id dari result, bisa dari berbagai property
                  let orderId = result.order_id || window.currentOrderId;
                    console.log('Order ID for redirect:', orderId);
                  
                  // Jika masih tidak ada, ambil dari global variable yang kita set
                  if (!orderId) {
                      orderId = window.currentOrderId;
                  }
                  
                  console.log('Order ID for redirect:', orderId);
                  
                  if (orderId) {
                      // Redirect ke halaman review
                      window.location.href = '/review?order_id=' + orderId;
                  } else {
                      // Fallback jika order_id tidak ada
                      alert('Pembayaran berhasil! Silakan cek riwayat pesanan Anda.');
                      window.location.href = '/';
                  }
              },
                onPending: function(result) {
                    alert("Waiting for your payment!");
                    console.log(result);
                },
                onError: function(result) {
                    alert("Payment failed!");
                    console.log(result);
                },
                onClose: function() {
                    alert('Payment popup closed');
                }
            });
        } else {
            alert('Error: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan sistem');
        // Reset button
        document.getElementById('pay-button').innerHTML = 'Scan QRIS Here';
        document.getElementById('pay-button').disabled = false;
    });
});
</script>

@endsection