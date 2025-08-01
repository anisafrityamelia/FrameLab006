<nav class="bg-primary text-secondary px-4 sm:px-9 py-3 sm:py-5">
  <div class="container mx-auto flex items-center justify-between">
    
    <a href="#">
      <img src="{{ asset('images/logo_framelab_beige_teks.png') }}" alt="logo" class="h-12">
    </a>

    @if(session('logged_in_user'))
      <div class="flex items-center gap-2 text-white">
        <span>Hi, {{ session('logged_in_user')->username }}</span>
        @else
          <div class="w-10 h-10 bg-white text-primary font-bold rounded-full flex items-center justify-center">
            {{ strtoupper(substr(session('logged_in_user')->username, 0, 1)) }}
          </div>
       
      </div>
    @endif

  </div>
</nav>
