@extends('layouts.app3')

@section('content')

@if(session('logged_in_user') && session('logged_in_user')->role === 'admin')
  <script>
    window.location.href = "/dashboard_admin";
  </script>
  @php exit; @endphp
@endif

@if(session()->has('logged_in_user'))
  <div id="welcome-message" class="absolute top-20 left-1/2 transform -translate-x-1/2 -translate-y-full z-40 text-white px-6 py-4 text-xl font-semibold opacity-0 transition-all duration-500 ease-out">
    <span id="typed-text"></span>
    <span id="cursor" class="animate-pulse">|</span>
  </div>

  <script>
    const welcomeText = "Welcome to Framelab, @if(session('logged_in_user')){{ session('logged_in_user')->username }}@endif";
    const message = document.getElementById('welcome-message');
    const typedText = document.getElementById('typed-text');
    const cursor = document.getElementById('cursor');

    setTimeout(() => {
      message.style.transform = 'translateX(-50%) translateY(0)';
      message.style.opacity = '1';
      
      setTimeout(() => {
        typeWriter(welcomeText, typedText, 80, () => {
          setTimeout(() => {
            cursor.style.display = 'none';
          }, 1000);
        });
      }, 300);
    }, 200);

    function typeWriter(text, element, speed = 100, callback = null) {
      let i = 0;
      element.innerHTML = '';
      
      function type() {
        if (i < text.length) {
          element.innerHTML += text.charAt(i);
          i++;
          setTimeout(type, speed);
        } else {
          if (callback) callback();
        }
      }
      type();
    }

    setTimeout(() => {
      message.style.transform = 'translateX(-50%) translateY(-100%)';
      message.style.opacity = '0';
      setTimeout(() => message.remove(), 500);
    }, 8000);
  </script>
@endif

@include('components.hero')
@include('components.services')
@include('components.why')
@include('components.about')

@endsection