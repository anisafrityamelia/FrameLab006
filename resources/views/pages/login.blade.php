@extends('layouts.app5')

@section('title', 'Login FrameLab')

@section('content')
<div class="flex flex-col md:flex-row bg-white rounded-lg shadow-lg overflow-hidden w-[90%] max-w-3xl mx-auto my-10">
	<div class="hidden md:flex flex-col items-center justify-center bg-secondary p-10 w-1/2">
		<img src="{{ asset('images/logo_framelab_maroon_teks.png') }}" alt="logo" class="max-w-full h-auto mb-2" />
		<h5 class="text-center text-lg text-primary">More Than Just a Studio</h5>
	</div>	
	<div class="w-full md:w-1/2 p-6 sm:p-8">
		<h4 class="text-center text-2xl text-primary">Welcome To</h4>
		<img src="{{ asset('images/teks_framelab_maroon.png') }}" alt="logo" class="mx-auto w-2/3 my-3" />
		<h5 class="text-center text-lg text-primary">Sign In To Continue</h5>
		@if ($errors->has('login'))
			<div class="bg-red-100 border border-red-300 text-red-700 px-3 py-2 rounded-md mb-5 mt-4 text-sm text-center shadow-sm">
				{{ $errors->first('login') }}
			</div>
		@endif
		<form method="POST" action="{{ route('login.post') }}" class="pt-2">
			@csrf
			<div class="mb-4">
				<label for="username" class="block font-bold mb-1 text-primary">Username</label>
				<input type="text" id="username" name="username" placeholder="Enter a Username" autocomplete="off" required class="w-full px-4 py-2 border border-primary rounded-md focus:outline-none focus:ring-2 focus:ring-primary/40" />
			</div>
			<div class="mb-4">
				<label for="password" class="block font-bold mb-1 text-primary">Password</label>
				<input type="password" id="password" name="password" placeholder="Enter a Password" required class="w-full px-4 py-2 border border-primary rounded-md focus:outline-none focus:ring-2 focus:ring-primary/40" />
			</div>
			<button type="submit" name="login" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition duration-200 mb-4">
				<i class="fa-solid fa-right-to-bracket mr-2"></i>Login
			</button>
		</form>
		<p class="text-center text-primary">Don't have an account? 
			<a href="{{ url('/register') }}" class="text-blue-600 hover:text-blue-700">Register now</a>
		</p>
	</div>
</div>

@if(session('success'))
	<script>
		alert("{{ session('success') }}");
	</script>
@endif
@endsection