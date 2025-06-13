@extends('layouts.app6')

@section('title', 'Detail Studio Space')

@section('content')
<div class="container mx-auto mt-4 px-4">
  <a href="/tampilan_studiogabungan" class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded">
    <i class="fas fa-arrow-left mr-2"></i> BACK
  </a>
</div>
<div class="container mx-auto mt-4 px-4">
  <h2 class="text-center font-bold text-2xl mb-8">Detail Studio Room</h2>
  <div class="bg-primary text-white p-4 rounded-3xl flex flex-col md:flex-row items-center justify-between">
    <div class="w-1/2 h-[415px] overflow-hidden rounded-3xl ml-25">
      <img src="{{ asset($room->photo) }}" alt="{{ $room->room_name }}" class="w-full h-full object-cover rounded-3xl">
    </div>
    <div class="text-white p-5 mt-4 md:mt-0 max-w-md w-full mr-32">
      <h3 class="text-2xl">{{ $room->room_name }}</h3>
      <p class="text-xl mt-2">Rp. {{ number_format($room->price, 0, ',', '.') }}/Session</p>
      <p class="mt-4">{{ $room->description }}</p>
      <form action="{{ route('confirm_sewa_room') }}" method="POST">
      @csrf
      <input type="hidden" name="room_id" value="{{ $room->id }}">
        @csrf
        <div class="mb-4">
          <label for="orderDate" class="block mb-2">Order Date</label>
          <input type="date" id="orderDate" name="order_date" class="w-[500px] p-2 rounded text-primary" required>
        </div>
        <div class="mb-4">
            <label for="orderTime" class="block mb-2 text-white">Order Time</label>
            <div class="grid grid-cols-5 gap-2">
                @foreach(explode(',', $room->duration) as $durasi)
                    @php $durasiTrim = trim($durasi); @endphp
                    <label class="relative block cursor-pointer">
                        <input type="checkbox" name="order_time[]" value="{{ $durasiTrim }}" class="hidden peer">
                        <div class="px-4 py-2 rounded text-center transition-all duration-200 bg-white text-primary border border-gray-300 peer-checked:bg-blue-500 peer-checked:text-white peer-checked:border-blue-600">
                            {{ $durasiTrim }}
                        </div>
                    </label>
                @endforeach
            </div>
        </div>
        <button type="submit" class="w-[500px] bg-blue-600 hover:bg-blue-700 text-white py-3 px-4 rounded mt-4">Order Now</button>
      </form>
    </div>
  </div>
</div>

@endsection
