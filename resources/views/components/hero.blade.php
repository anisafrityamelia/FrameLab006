<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Hero 5 Gambar</title>
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
    <div class="carousel-item absolute inset-0 transition-opacity duration-1000 opacity-100">
      <img src="images/lpbg.png" alt="Studio 1" class="w-full h-full object-cover">
    </div>
    <div class="carousel-item absolute inset-0 transition-opacity duration-1000 opacity-100">
      <img src="images/lpbg1.png" alt="Studio 2" class="w-full h-full object-cover">
    </div>
    <div class="carousel-item absolute inset-0 transition-opacity duration-1000 opacity-100">
      <img src="images/lpbg2.png" alt="Studio 3" class="w-full h-full object-cover">
    </div>
    <div class="carousel-item absolute inset-0 transition-opacity duration-1000 opacity-100">
      <img src="images/lpbg3.png" alt="Studio 4" class="w-full h-full object-cover">
    </div>
    <div class="carousel-item absolute inset-0 transition-opacity duration-1000 opacity-100">
      <img src="images/lpbg4.png" alt="Studio 5" class="w-full h-full object-cover">
    </div>
    <div class="carousel-item absolute inset-0 transition-opacity duration-1000 opacity-100">
      <img src="images/lpbg5.png" alt="Studio 6" class="w-full h-full object-cover">
    </div>
    <div class="carousel-item absolute inset-0 transition-opacity duration-1000 opacity-100">
      <img src="images/lpbg6.png" alt="Studio 7" class="w-full h-full object-cover">
    </div>
    <div class="carousel-item absolute inset-0 transition-opacity duration-1000 opacity-100">
      <img src="images/lpbg7.png" alt="Studio 8" class="w-full h-full object-cover">
    </div>
    <div class="carousel-item absolute inset-0 transition-opacity duration-1000 opacity-100">
      <img src="images/lpbg8.png" alt="Studio 9" class="w-full h-full object-cover">
    </div>
    <div class="carousel-item absolute inset-0 transition-opacity duration-1000 opacity-100">
      <img src="images/lpbg9.png" alt="Studio 10" class="w-full h-full object-cover">
    </div>
    <div class="absolute inset-0 flex items-center justify-center z-10">
      <img src="images/logo_framelab_maroon.png" alt="Hero Logo" class="max-w-[120px] h-auto mr-4">
      <img src="images/teks_framelab_maroon.png" alt="Hero Text" class="max-w-[500px] h-auto">
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
  setInterval(showNextSlide, 3000);
</script>
</body>
</html>
