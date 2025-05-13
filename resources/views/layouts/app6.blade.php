<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title></title>
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
            wine: '#5A0717',
          },
          fontFamily: {
            custom: ['"Jacques Francois"', 'sans-serif'],
          }
        }
      }
    }
  </script>
</head>
<body class="bg-secondary text-primary font-custom">
  @include('components.navbar3')
  @yield('content')
</body>
</html>
