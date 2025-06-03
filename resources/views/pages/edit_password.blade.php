@extends('layouts.app2')

@section('title', 'Edit Password')

@section('content')
    <div class="bg-primary text-secondary rounded-3xl p-10 h-[100vh] max-h-[560px]">
        <h4 class="text-center text-2xl mb-10">Edit Password</h4>
        <form method="POST" class="space-y-6">
        	<div class="m-4">
        		<label for="username" class="block mb-2">Username</label>
            	<input type="text" id="username" name="username" placeholder="Enter a Username" required class="w-full px-4 py-1.5 rounded border border-white bg-white text-black focus:outline-none focus:ring-2 focus:ring-primary/30" />
            </div>
            <div class="m-4">
            	<label for="password" class="block mb-2">Password</label>
            	<input type="password" id="password" name="password" placeholder="Enter a Password" required class="w-full px-4 py-1.5 rounded border border-white bg-white text-black focus:outline-none focus:ring-2 focus:ring-primary/30" />
            </div>
            <div class="m-4">
			    <label for="new_password" class="block mb-2">New Password</label>
			    <input type="password" id="new_password" name="new_password" placeholder="Enter New Password" required class="w-full px-4 py-1.5 rounded border border-white bg-white text-black focus:outline-none focus:ring-2 focus:ring-primary/30" />
          	</div>
          	<div class="text-end m-4">
            	<button type="submit" class="mt-3 bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 rounded">
              		<i class="fas fa-archive mr-2"></i>Save
            	</button>
          	</div>
        </form>
    </div>
@endsection