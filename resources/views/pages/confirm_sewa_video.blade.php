@extends('layouts.app6')
@section('title', 'Detail Sewa Studio Video')
@section('content')
<div class="container mx-auto mt-4 px-4">
  <a href="/detail_studio_video" class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded">
    <i class="fas fa-arrow-left mr-2"></i> BACK
  </a>
</div>
  <div class="container mx-auto mt-4 px-4">
    <h2 class="text-center font-bold text-2xl mb-8">Detail Studio Video</h2>
    <div class="bg-primary text-white p-4 rounded-3xl flex flex-col md:flex-row items-center justify-between">
      <div class="w-1/2 h-[415px] overflow-hidden rounded-3xl ml-25">
        <img src="images/gambar15.jfif" alt="PodSpace" class="w-full h-full object-cover rounded-3xl">
      </div>
      <div class="text-white p-5 mt-4 md:mt-0 max-w-md w-full mr-32">
        <h3 class="text-lg font-bold mb-5">PodSpace</h3>
        <div class="mb-3">
          <label class="block mb-1">Total Order</label>
          <input type="text" name="total_order" class="w-[500px] border border-white rounded-1xl py-1 px-2 text-primary" readonly />
        </div>
        <h5 class="mt-4">Customer Info</h5>
        <form action="confirm_sewa_video.php" method="POST" enctype="multipart/form-data">
          <input type="text" class="w-[500px] border border-white rounded-none py-1 px-2 mb-2 text-primary" name="username" readonly />
          <input type="email" class="w-[500px] border border-white rounded-none py-1 px-2 mb-2 text-primary" name="email" readonly />
          <input type="tel" class="w-[500px] border border-white rounded-none py-1 px-2 mb-3 text-primary" name="phone" readonly />
          <h5 class="mt-4">Payment Method</h5>
          <button type="button" class="bg-blue-600 text-white rounded py-1 px-2 mb-3 hover:bg-blue-700" onclick="document.getElementById('qrisModal').classList.remove('hidden')">
            Scan QRIS Here
          </button>
          <h5 class="mt-4">Upload Payment Proof</h5>
          <div class="mb-3">
            <input type="file" class="w-[500px] border border-white rounded-none py-1 px-2 text-primary bg-white" name="payment_proof" accept="image/*" required />
          </div>
          <div class="flex justify-center">
            <a href="review" class="bg-blue-600 hover:bg-blue-700 text-white w-fit px-3 py-1.5 rounded mt-4 ml-20 inline-block mt-4 ml-20">Confirm & Pay</a>
          </div>
        </form>
      </div>
    </div>
  </div>
  @include('components.modal_qris')
@endsection
