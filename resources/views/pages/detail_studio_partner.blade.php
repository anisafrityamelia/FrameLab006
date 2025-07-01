@extends('layouts.app6')
@section('title', 'Detail Studio Partner')
@section('content')
<div class="container mx-auto mt-4 px-4">
  <a href="{{ route('tampilan_studiogabungan') }}" class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded">
    <i class="fas fa-arrow-left mr-2"></i> BACK
  </a>
</div>
<div class="max-w-[1498px] mx-auto mt-4 px-4 bg-[#540c0c] text-white p-6 rounded-3xl">
  <div class="flex flex-col md:flex-row gap-8 items-start md:items-center">
    <div class="w-full md:w-1/2">
      <img src="{{ asset('images/' . $partner->photo) }}" alt="{{ $partner->room_name }}" class="rounded-3xl w-full object-cover h-[420px]">
    </div>
    <div class="w-full md:w-1/2 flex flex-col justify-between">
      <div>
        <h2 class="text-3xl font-bold mb-4">{{ $partner->room_name }}</h2>
        <p class="mb-4">{{ $partner->description1 }}</p>
        <p class="mb-4">{{ $partner->description2 }}</p>
        <ul class="mb-6 space-y-2">
          <li class="flex items-start gap-3">
            <span>📍</span> <span>{{ $partner->description3 }}</span>
          </li>
          <li class="flex items-start gap-1">
            <span>📞</span> <span>Reach out to us anytime on WhatsApp:</span>
          </li>
        </ul>
        <div class="text-center">
          @php
            $cleanNumber = preg_replace('/[^0-9]/', '', $partner->noTelepon);
            if (Str::startsWith($cleanNumber, '0')) {
                $cleanNumber = '62' . substr($cleanNumber, 1);
            }
          @endphp
          <a 
            href="https://wa.me/{{ $cleanNumber }}" 
            target="_blank"
            class="inline-block bg-white text-[#540c0c] font-semibold py-2 px-4 rounded-lg hover:bg-gray-200 transition">
            Chat on WhatsApp with {{ $partner->noTelepon }}
          </a>
        </div>
      </div>
      <div class="mt-6 grid grid-cols-3 gap-3">
        <img src="{{ asset('images/' . $partner->photo1) }}" alt="Preview 1" class="rounded-xl w-full h-[200px] object-cover">
        <img src="{{ asset('images/' . $partner->photo2) }}" alt="Preview 2" class="rounded-xl w-full h-[200px] object-cover">
        <img src="{{ asset('images/' . $partner->photo3) }}" alt="Preview 3" class="rounded-xl w-full h-[200px] object-cover">
      </div>
    </div>
  </div>
</div>
@endsection
