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
    <div class="overflow-x-auto max-h-[370px] overflow-y-auto">
      <table class="w-full text-center text-black">
        <thead>
          <tr class="bg-gray-100 text-black text-base">
            <th class="px-4 py-2 border">No</th>
            <th class="px-4 py-2 border">Username</th>
            <th class="px-4 py-2 border">Note</th>
            <th class="px-4 py-2 border">Date</th>
            <th class="px-4 py-2 border">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($feedbacks as $index => $feedback)
            <tr class="bg-white border-t text-black">
              <td class="px-4 py-2 border">{{ $index + 1 }}</td>
              <td class="px-4 py-2 border">{{ $feedback->username }}</td>
              <td class="px-4 py-2 border">{{ $feedback->note }}</td>
              <td class="px-4 py-2 border">{{ \Carbon\Carbon::parse($feedback->date)->format('d M Y, H:i') }}</td>
              <td class="px-4 py-2">
                <form action="{{ route('feedback.destroy', $feedback->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus feedback ini?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="bg-red-600 hover:bg-red-700 text-white py-1 px-3 rounded text-sm">Delete</button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td></td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
@endsection