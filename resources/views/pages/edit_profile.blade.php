@extends('layouts.app2')

@section('title', 'Edit Profile')

@section('content')
    <div class="bg-primary text-secondary rounded-3xl p-10 h-[100vh] max-h-[560px]">
        <h4 class="text-center text-2xl mb-4">Edit Profile</h4>
        <div class="flex justify-center">
          	<div class="w-20 h-20 rounded-full border-2 border-secondary overflow-hidden">
            	<img src="images/gambar8.jpg" alt="Profile Picture" class="object-cover w-full h-full">
          	</div>
        </div>
        <form method="POST" class="space-y-2">
        	<div class="m-4">
        		<label for="username" class="block mb-1">Username</label>
            	<input type="text" id="username" name="username" placeholder="Enter a Username" required class="w-full px-4 py-1.5 rounded border border-white bg-white text-black focus:outline-none focus:ring-2 focus:ring-primary/30" />
            </div>
            <div class="m-4">
            	<label for="noTelepon" class="block mb-1">Phone</label>
            	<input type="number" id="noTelepon" name="noTelepon" placeholder="Enter a Phone Number" required class="w-full px-4 py-1.5 rounded border border-white bg-white text-black focus:outline-none focus:ring-2 focus:ring-primary/30" />
            </div>
            <div class="m-4">
			    <label for="email" class="block mb-1">Email</label>
			    <input type="email" id="email" name="email" placeholder="Enter a Email" required class="w-full px-4 py-1.5 rounded border border-white bg-white text-black focus:outline-none focus:ring-2 focus:ring-primary/30" />
          	</div>
          	<div class="m-4">
			    <label for="date" class="block mb-1">Birthday</label>
			    <input type="date" id="date" name="date" required class="w-full px-4 py-1.5 rounded border border-white bg-white text-black focus:outline-none focus:ring-2 focus:ring-primary/30" />
          	</div>
          	<div class="text-end m-4">
            	<button type="submit" class="mt-3 bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 rounded">
              		<i class="fas fa-archive mr-2"></i>Save
            	</button>
          	</div>
        </form>
    </div>
@endsection