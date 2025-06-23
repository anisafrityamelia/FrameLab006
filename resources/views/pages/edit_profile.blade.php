@extends('layouts.app2')

@section('title', 'Edit Profile')
@if(session('logged_in_user') && session('logged_in_user')->role === 'admin')
  <script>
    window.location.href = "/dashboard_admin";
  </script>
  @php exit; @endphp
@endif

@section('content')
<!-- Font Awesome CDN untuk ikon kamera -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

<div class="bg-primary text-secondary rounded-3xl p-10 h-[100vh] max-h-[560px] overflow-auto">
  <h4 class="text-center text-2xl mb-4">Edit Profile</h4>

  <form method="POST" action="{{ route('edit_profile.update') }}" enctype="multipart/form-data" class="space-y-2">
    @csrf

    <!-- Foto Profil + Icon Kamera -->
    <div class="relative w-24 h-24 mx-auto mb-6">
      <div class="w-full h-full rounded-full overflow-hidden border-2 border-secondary">
        @if(session('logged_in_user')->photo)
          <img id="previewImage" src="{{ asset('uploads/' . session('logged_in_user')->photo) }}" alt="Profile Picture" class="object-cover w-full h-full">
        @else
          <div id="previewImage" class="flex items-center justify-center bg-white w-full h-full text-primary font-bold text-xl">
            {{ strtoupper(substr(session('logged_in_user')->username, 0, 1)) }}
          </div>
        @endif
      </div>

      <!-- Label Kamera -->
      <label for="photo" class="absolute bottom-0 right-0 bg-white p-2 rounded-full shadow-md cursor-pointer">
        <i class="fas fa-camera text-primary"></i>
      </label>

      <!-- Input file tersembunyi -->
      <input type="file" id="photo" name="photo" class="hidden" accept="image/*" onchange="previewFile(event)" />
    </div>

    <!-- Input Username -->
    <div class="m-4">
      <label for="username" class="block mb-1">Username</label>
      <input type="text" id="username" name="username" value="{{ session('logged_in_user')->username }}" required
        class="w-full px-4 py-1.5 rounded border border-white bg-white text-black focus:outline-none focus:ring-2 focus:ring-primary/30" />
    </div>

    <!-- Input No Telepon -->
    <div class="m-4">
      <label for="noTelepon" class="block mb-1">Phone</label>
      <input type="number" id="noTelepon" name="noTelepon" value="{{ session('logged_in_user')->noTelepon }}" required
        class="w-full px-4 py-1.5 rounded border border-white bg-white text-black focus:outline-none focus:ring-2 focus:ring-primary/30" />
    </div>

    <!-- Input Email (nonaktif) -->
    <div class="m-4">
      <label for="email" class="block mb-1">Email</label>
      <input type="email" id="email" name="email" value="{{ session('logged_in_user')->email }}" disabled
        class="w-full px-4 py-1.5 rounded border border-white bg-white text-black cursor-not-allowed" />
    </div>

    <!-- Input Tanggal Lahir -->
    <div class="m-4">
      <label for="date" class="block mb-1">Birthday</label>
      <input type="date" id="date" name="date" value="{{ session('logged_in_user')->date }}" required
        class="w-full px-4 py-1.5 rounded border border-white bg-white text-black focus:outline-none focus:ring-2 focus:ring-primary/30" />
    </div>

    <!-- Tombol Submit -->
    <div class="text-end m-4">
      <button type="submit" class="mt-3 bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 rounded">
        <i class="fas fa-archive mr-2"></i>Save
      </button>
    </div>
  </form>
</div>

<!-- Script Preview Gambar -->
<script>
  function previewFile(event) {
    const reader = new FileReader();
    const preview = document.getElementById('previewImage');

    reader.onload = function () {
      if (preview.tagName === 'IMG') {
        preview.src = reader.result;
      } else {
        // Jika sebelumnya pakai huruf awal nama
        const newImg = document.createElement('img');
        newImg.id = 'previewImage';
        newImg.className = 'object-cover w-full h-full';
        newImg.src = reader.result;

        preview.replaceWith(newImg);
      }
    };

    const file = event.target.files[0];
    if (file) {
      reader.readAsDataURL(file);
    }
  }
</script>
@endsection
