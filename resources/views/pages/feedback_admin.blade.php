@extends('layouts.app')

@section('title', 'Feedback Admin')

@section('content')
  <div class="bg-primary text-secondary rounded-3xl px-8 py-3 text-lg mb-6">
    <i class="fa-solid fa-message mr-2"></i>Feedback
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
            <th class="px-4 py-2">Note</th>
            <th class="px-4 py-2">Date</th>
            <th class="px-4 py-2">Action</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>
@endsection