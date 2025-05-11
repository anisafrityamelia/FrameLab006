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
        </tbody>
      </table>
    </div>
  </div>
@endsection
