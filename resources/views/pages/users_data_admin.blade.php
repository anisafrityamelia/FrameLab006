@extends('layouts.app')

@section('title', 'Users Data Admin')
@if(session('logged_in_user') && session('logged_in_user')->role === 'user')
  <script>
    window.location.href = "/landing_page1";
  </script>
  @php exit; @endphp
@endif
@section('content')
  <div class="bg-primary text-secondary rounded-3xl px-8 py-3 text-lg mb-6">
    <i class="fa-solid fa-users mr-2"></i>Users Data
  </div>

  <div class="bg-primary text-secondary rounded-3xl p-6">
    <div class="flex justify-between items-center mb-6">
      <form method="GET" action="{{ route('users.search') }}">
        @include('components.search')
      </form>
    </div>
    <div class="overflow-x-auto max-h-[370px] overflow-y-auto">
      <table class="w-full text-center text-black">
        <thead>
          <tr class="bg-gray-100 text-black text-base">
            <th class="px-4 py-2 border">No</th>
            <th class="px-4 py-2 border">Username</th>
            <th class="px-4 py-2 border">Email</th>
            <th class="px-4 py-2 border">Date of Birth</th>
            <th class="px-4 py-2 border">Phone Number</th>
            <th class="px-4 py-2 border">Registration Date</th>
            <th class="px-4 py-2 border">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $index => $user)
            <tr class="bg-white text-black text-base">
              <td class="px-4 py-2 border">{{ $index + 1 }}</td>
              <td class="px-4 py-2 border">{{ $user->username }}</td>
              <td class="px-4 py-2 border">{{ $user->email }}</td>
              <td class="px-4 py-2 border">{{ $user->date }}</td>
              <td class="px-4 py-2 border">{{ $user->noTelepon }}</td>
              <td class="px-4 py-2 border">{{ \Carbon\Carbon::parse($user->created_at)->format('d M Y') }}</td>
              <td class="px-4 py-2 text-center">
                <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure want to delete user {{ $user->username }}?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="bg-red-600 hover:bg-red-700 text-white py-1 px-3 rounded">
                    Delete
                  </button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  @if(request('keyword') && $users->isEmpty())
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        if (confirm('There are no users with usernames starting with "{{ request('keyword') }}"')) {
          window.location.href = "{{ route('users_data_admin') }}";
        }
      });
    </script>
  @endif
@endsection
