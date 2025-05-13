<nav class="bg-primary text-secondary px-9 py-5">
  <div class="container mx-auto flex items-center justify-between">
    <a href="#hero">
      <img src="images/logo_framelab_beige_teks.png" alt="logo" class="h-12">
    </a>
    <div class="hidden md:flex gap-12">
      <a href="#hero" class="hover:underline">Home Page</a>
      <a href="#services" class="hover:underline">Our Service</a>
      <a href="#about" class="hover:underline">About Us</a>
    </div>
    <div>
      <a href="{{ url('/login') }}">
        <button class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-3 rounded">Login / Sign Up</button>
      </a>
    </div>
  </div>
</nav>
