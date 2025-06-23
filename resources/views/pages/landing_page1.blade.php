@extends('layouts.app3')

@section('content')

@if(session('logged_in_user') && session('logged_in_user')->role === 'admin')
  <script>
    window.location.href = "/dashboard_admin";
  </script>
  @php exit; @endphp
@endif

@if(session()->has('logged_in_user'))
  <div id="welcome-message" class="bg-white-100 text-black-800 px-6 py-4 rounded-lg shadow mb-6 mx-auto w-fit text-xl font-semibold transition-opacity duration-500">
    Selamat Datang di FrameLab, {{ session('logged_in_user')->username }}
  </div>

  <script>
    setTimeout(() => {
      const msg = document.getElementById('welcome-message');
      if (msg) {
        msg.style.opacity = '0';
        setTimeout(() => msg.remove(), 500); 
      }
    }, 1500);
  </script>
@endif

  @include('components.hero')
  @include('components.services')
  @include('components.why')
  @include('components.about')

@endsection
