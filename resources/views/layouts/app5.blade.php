<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title')</title>
	<script src="https://cdn.tailwindcss.com"></script>
	<link href="https://fonts.googleapis.com/css2?family=Jacques+Francois&display=swap" rel="stylesheet">
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
<body class="h-screen flex items-center justify-center font-custom bg-cover bg-center" style="background-image: url('{{ asset('images/gradasi.png') }}');">
	@yield('content')
</body>
</html>
