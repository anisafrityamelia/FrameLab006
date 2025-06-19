@extends('layouts.app')

@section('title', 'Users Data Admin')

@section('content')
  <div class="bg-primary text-secondary rounded-3xl px-8 py-3 text-lg mb-6">
    <i class="fa-solid fa-users mr-2"></i>Users Data
  </div>

  <div class="bg-primary text-secondary rounded-3xl p-6">
    <div class="flex justify-between items-center mb-6">
        @include('components.search')
    </div>
    <div class="overflow-x-auto">
      <table class="w-full text-center text-black">
        <thead>
          <tr class="bg-white text-black">
            <th class="px-4 py-2">No</th>
            <th class="px-4 py-2">Username</th>
            <th class="px-4 py-2">Email</th>
            <th class="px-4 py-2">Date of Birth</th>
            <th class="px-4 py-2">Phone Number</th>
            <th class="px-4 py-2">Registration Date</th>
            <th class="px-4 py-2">Action</th>
          </tr>
        </thead>
<tbody>
  @foreach($users as $index => $user)
    <tr class="bg-white border-b">
      <td class="px-4 py-2">{{ $index + 1 }}</td>
      <td class="px-4 py-2">{{ $user->username }}</td>
      <td class="px-4 py-2">{{ $user->email }}</td>
      <td class="px-4 py-2">{{ $user->date }}</td>
      <td class="px-4 py-2">{{ $user->noTelepon }}</td>
      <td class="px-4 py-2">{{ \Carbon\Carbon::parse($user->created_at)->format('d M Y') }}</td>
      <td class="px-4 py-2 text-center">-</td>
    </tr>
  @endforeach
</tbody>
      </table>
    </div>
  </div>
@endsection
