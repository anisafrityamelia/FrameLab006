<nav class="bg-primary text-secondary px-9 py-5">
  <div class="container mx-auto flex items-center justify-between">
    
    <a href="#hero">
      <img src="{{ asset('images/logo_framelab_beige_teks.png') }}" alt="logo" class="h-12">
    </a>

    <div class="hidden md:flex gap-12">
      <a href="landing_page1" class="hover:underline">Home Page</a>
      <a href="landing_page1#services" class="hover:underline">Our Service</a>
      <a href="landing_page1#about" class="hover:underline">About Us</a>
    </div>

    <div>
      @if(session()->has('logged_in_user'))
        <div class="flex items-center space-x-2 text-white">
          <span>Hi, {{ session('logged_in_user')->username }}</span>

          <a href="{{ route('edit_profile') }}">
            @if(session('logged_in_user')->photo)
              <img src="{{ asset('uploads/' . session('logged_in_user')->photo) }}" class="h-8 w-8 rounded-full object-cover border border-white hover:ring-2 ring-white transition" alt="Foto Profil">
            @else
              <div class="h-8 w-8 rounded-full bg-white text-primary font-bold flex items-center justify-center hover:ring-2 ring-white transition">
                {{ strtoupper(substr(session('logged_in_user')->username, 0, 1)) }}
              </div>
            @endif
          </a>
        </div>
      @else
        <a href="{{ url('/login') }}">
          <button class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-3 rounded">Login / Sign Up</button>
        </a>
      @endif
    </div>
  </div>
</nav>
