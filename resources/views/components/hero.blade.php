<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Hero Carousel</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <style>
    #hero {
      height: 500px;
    }
  </style>
</head>
<body>
<div id="hero" class="relative w-full overflow-hidden">
  <div id="carousel" class="relative w-full h-full">
    @php
      $images = [
        'lpbg.png', 'lpbg2.png', 'lpbg1.png', 'lpbg3.png', 'lpbg4.png',
        'lpbg5.png', 'lpbg6.png', 'lpbg7.png', 'lpbg8.png', 'lpbg9.png'
      ];
    @endphp

    @foreach ($images as $index => $img)
      <div class="carousel-item absolute inset-0 transition-opacity duration-1000 {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}">
        <img src="images/{{ $img }}" alt="Studio {{ $index + 1 }}" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
      </div>
    @endforeach

    <div class="absolute inset-0 flex flex-col md:flex-row items-center justify-center z-10 text-center md:text-left px-4 space-y-2 md:space-y-0 md:space-x-4">
      <img src="images/logo_framelab_maroon.png" alt="Hero Logo" class="w-[80px] md:w-[120px] lg:w-[140px] h-auto">
      <img src="images/teks_framelab_maroon.png" alt="Hero Text" class="w-[250px] md:w-[500px] lg:w-[600px] h-auto">
    </div>
  </div>
</div>

<script>
  const items = document.querySelectorAll('.carousel-item');
  let current = 0;

  function showNextSlide() {
    items[current].classList.remove('opacity-100');
    items[current].classList.add('opacity-0');

    current = (current + 1) % items.length;

    items[current].classList.remove('opacity-0');
    items[current].classList.add('opacity-100');
  }

  setInterval(showNextSlide, 2000); 
</script>
</body>
</html>