@extends('layouts.app6')
@section('title', 'Detail Studio Partner')
@section('content')
<div class="container mx-auto mt-4 px-4">
  <a href="/tampilan_studiogabungan" class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded">
    <i class="fas fa-arrow-left mr-2"></i> BACK
  </a>
</div>
<div class="container mx-auto mt-8 px-4 bg-[#540c0c] text-white p-6 rounded-3xl">
  <div class="flex flex-col md:flex-row gap-8 items-start">
    <div class="w-full md:w-1/2">
      <img src="{{ asset('images/gambar19.jpg') }}" alt="LEXUS Photobox" class="rounded-3xl w-full object-cover h-[420px]">
    </div>
    <div class="w-full md:w-1/2 flex flex-col justify-between">
      <div>
        <h2 class="text-3xl font-bold mb-4">LEXUS Photobox</h2>
        <p class="mb-4">Looking to add a unique touch to your event?</p>
        <p class="mb-4">
          LEXUS Photobox offers a beautifully crafted vintage photobooth, complete with Canon camera technology and high-quality lighting — ensuring every shot is sharp and memorable.
        </p>
        <ul class="mb-6 space-y-2">
          <li>📍 Based in Batam, available for nearby areas</li>
          <li>📞 Reach out to us anytime on WhatsApp:</li>
        </ul>
        <div class="text-center">
          <a 
            href="https://wa.me/6282133176988" 
            target="_blank"
            class="inline-block bg-white text-[#540c0c] font-semibold py-2 px-4 rounded-lg hover:bg-gray-200 transition"
          >
            Chat on WhatsApp with +62 821-3317-6988
          </a>
        </div>
      </div>
      <div class="mt-6 flex gap-3">
        <img src="{{ asset('images/gambar19.jpg') }}" alt="Preview 1" class="rounded-xl w-1/3 h-[100px] object-cover">
        <img src="{{ asset('images/gambar19.jpg') }}" alt="Preview 2" class="rounded-xl w-1/3 h-[100px] object-cover">
        <img src="{{ asset('images/gambar19.jpg') }}" alt="Preview 3" class="rounded-xl w-1/3 h-[100px] object-cover">
      </div>
    </div>
  </div>
</div>
@endsection
