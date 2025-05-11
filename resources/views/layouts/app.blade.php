<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Jacques+Francois&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#5A0717',
            secondary: '#F9F5E8',
          },
          fontFamily: {
            custom: ['"Jacques Francois"', 'sans-serif'],
          }
        }
      }
    }
  </script>
</head>
<body class="min-h-screen bg-secondary font-custom">
  @include('components.navbar')
  <div class="flex flex-col md:flex-row mt-12 px-12 gap-11">
    @include('components.sidebar')
    <div class="flex-1">
      @yield('content')
    </div>
  </div>
  <script>
    function toggleSubmenu() {
      const submenu = document.getElementById('submenu');
      submenu.classList.toggle('hidden');
    }
  </script>
</body>
</html>
