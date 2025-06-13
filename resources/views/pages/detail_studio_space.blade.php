@extends('layouts.app6')

@section('title', 'Detail Studio Space')

@section('content')
<div class="container mx-auto mt-4 px-4">
  <a href="/tampilan_studiogabungan" class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded">
    <i class="fas fa-arrow-left mr-2"></i> BACK
  </a>
</div>
<div class="container mx-auto mt-4 px-4">
  <h2 class="text-center font-bold text-2xl mb-8">Detail Studio Space</h2>
  <div class="bg-primary text-white p-4 rounded-3xl flex flex-col md:flex-row items-center justify-between">
    <div class="w-1/2 h-[415px] overflow-hidden rounded-3xl ml-25">
      <img src="{{ asset('images/gambar11.jpeg') }}" alt="Terrena" class="w-full h-full object-cover rounded-3xl">
    </div>
    <div class="text-white p-5 mt-4 md:mt-0 max-w-md w-full mr-32">
      <h3 class="text-2xl">Terrena</h3>
      <p class="text-xl mt-2">Rp. 100.000/Session</p>
      <p class="mt-4">Capture moments with your loved ones in 15 minutes! Photobooth with a simple and timeless concept, perfect for you and your bestie or partner</p>
      <form action="/confirm_sewa_space" method="POST">
        @csrf
        <div class="mb-4">
          <label for="orderDate" class="block mb-2">Order Date</label>
          <input type="date" id="orderDate" name="order_date" class="w-[500px] p-2 rounded text-primary" required>
        </div>
        <div class="mb-4">
          <label for="orderTime" class="block mb-2">Order Time</label>
          <select id="orderTime" name="order_time" class="w-[500px] p-2 rounded text-primary" required>
            <option selected disabled>Select Session</option>
            <option>10:00 - 10:15</option>
            <option>10:30 - 10:45</option>
            <option>11:00 - 11:15</option>
          </select>
        </div>
        <button type="submit" class="w-[500px] bg-blue-600 hover:bg-blue-700 text-white py-3 px-4 rounded">Order Now</button>
      </form>
    </div>
  </div>
</div>

@endsection
