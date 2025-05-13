@extends('layouts.app5')

@section('title', 'Register FrameLab')

@section('content')
<div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-3xl">
    <h3 class="text-center text-3xl font-semibold mb-6 text-primary">CREATE ACCOUNT</h3>
    <form method="POST" autocomplete="off" class="space-y-4">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="email" class="block font-bold mb-1 text-primary">Email Address</label>
                <input type="email" name="email" id="email" placeholder="Enter a Email Address" required class="w-full px-3 py-1.5 border border-primary rounded-md focus:outline-none focus:ring-2 focus:ring-primary/30" />
            </div>
            <div>
                <label for="username" class="block font-bold mb-1 text-primary">Username</label>
                <input type="text" name="username" id="username" placeholder="Enter a Username" required class="w-full px-4 py-1.5 border border-primary rounded-md focus:outline-none focus:ring-2 focus:ring-primary/30" />
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="noTelepon" class="block font-bold mb-1 text-primary">Phone Number</label>
                <input type="number" name="noTelepon" id="noTelepon" placeholder="Enter a Phone Number" required class="w-full px-4 py-1.5 border border-primary rounded-md focus:outline-none focus:ring-2 focus:ring-primary/30" />
            </div>
            <div>
                <label for="date" class="block font-bold mb-1 text-primary">Date of Birth</label>
                <input type="date" name="date" id="date" required class="w-full px-4 py-1.5 border border-primary rounded-md focus:outline-none focus:ring-2 focus:ring-primary/30" />
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="password" class="block font-bold mb-1 text-primary">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter a Password" required class="w-full px-4 py-1.5 border border-primary rounded-md focus:outline-none focus:ring-2 focus:ring-primary/30" />
            </div>
            <div>
                <label for="confirm" class="block font-bold mb-1 text-primary">Confirm Password</label>
                <input type="password" name="confirm" id="confirm" placeholder="Confirm Password" required class="w-full px-4 py-1.5 border border-primary rounded-md focus:outline-none focus:ring-2 focus:ring-primary/30" />
            </div>
        </div>
        <div class="flex items-center justify-center gap-2 mt-4">
            <input type="checkbox" id="terms" required class="accent-blue-600"/>            
            <label for="terms" class="text-sm text-primary">I agree to the applicable Terms of Service and Privacy Policy</label>
        </div>
        <div class="flex justify-center mt-4">
            <button type="submit" name="register" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-20 rounded">Create Account</button>
        </div>
        <div class="text-center mt-4 text-primary">
            Already have an account? <a href="{{ url('/login') }}" class="text-blue-600 hover:text-blue-700">Login</a>
        </div>
    </form>
</div>
@endsection
