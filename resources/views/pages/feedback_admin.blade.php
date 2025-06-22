@extends('layouts.app')

@section('title', 'Feedback Admin')

@section('content')
  <div class="bg-primary text-secondary rounded-3xl px-8 py-3 text-lg mb-6">
    <i class="fa-solid fa-message mr-2"></i>Feedback
  </div>

  <div class="bg-primary text-secondary rounded-3xl p-6">
    <div class="flex justify-between items-center mb-6">
        <form method="GET" action="{{ route('feedback.search') }}">
            @include('components.search')
        </form>
    </div>
    <div class="overflow-x-auto max-h-[370px] overflow-y-auto">
      <table class="w-full table-fixed text-center text-black">
        <thead>
          <tr class="bg-gray-100 text-black text-base">
            <th class="px-2 py-2 border w-[40px]">No</th>
            <th class="px-4 py-2 border w-[150px]">Username</th>
            <th class="px-4 py-2 border w-[270px]">Note</th>
            <th class="px-4 py-2 border w-[150px]">Date</th>
            <th class="px-4 py-2 border w-[80px]">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($feedbacks as $index => $feedback)
            <tr class="bg-white border-t text-black">
              <td class="px-4 py-2 border">{{ $index + 1 }}</td>
              <td class="px-4 py-2 border">{{ $feedback->username }}</td>
              <td class="px-4 py-2 border break-words w-[270px]">{{ $feedback->note }}</td>
              <td class="px-4 py-2 border">{{ \Carbon\Carbon::parse($feedback->date)->format('d M Y, H:i') }}</td>
              <td class="px-4 py-2">
                <form action="{{ route('feedback.destroy', $feedback->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus feedback dari {{ $feedback->username }}?')">
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
  @if(request('keyword') && $feedbacks->isEmpty())
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        if (confirm('Tidak ada username yang dimulai dengan "{{ request('keyword') }}"')) {
          window.location.href = "{{ route('feedback_admin') }}";
        }
      });
    </script>
  @endif
@endsection