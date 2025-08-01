@extends('layouts.app') 

@section('title', 'Settings Admin')
@if(session('logged_in_user') && session('logged_in_user')->role === 'user')
  <script>
    window.location.href = "/landing_page1";
  </script>
  @php exit; @endphp
@endif
@section('content')
  <div class="bg-primary text-secondary rounded-3xl p-10 h-[100vh] max-h-[560px]">
    <h4 class="text-center text-2xl mb-10">Settings</h4>

    <form method="POST" action="{{ route('edit_password.update') }}" class="space-y-6">
      @csrf

      <div class="m-4">
        <label for="password" class="block mb-2">Old Password</label>
        <input type="password" id="password" name="password" placeholder="Enter Old Password" required
          class="w-full px-4 py-1.5 rounded border border-white bg-white text-black focus:outline-none focus:ring-2 focus:ring-primary/30" />
      </div>

      <div class="m-4">
        <label for="new_password" class="block mb-2">New Password</label>
        <input type="password" id="new_password" name="new_password" placeholder="Enter New Password" required
          class="w-full px-4 py-1.5 rounded border border-white bg-white text-black focus:outline-none focus:ring-2 focus:ring-primary/30" />
      </div>

      <div class="text-end m-4">
        <button type="submit" class="mt-3 bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 rounded">
          <i class="fas fa-archive mr-2"></i>Save
        </button>
      </div>
    </form>

  </div>
@endsection
