@extends('layouts.app6')
@section('title', 'Detail Studio Space')
@section('content')
<div class="container mx-auto mt-4 px-4">
  <a href="{{ route('tampilan_studiogabungan') }}" class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded">
    <i class="fas fa-arrow-left mr-2"></i> BACK
  </a>
</div>

<div class="container mx-auto mt-4 px-4">
  <h2 class="text-center font-bold text-2xl mb-8">Detail Studio Room</h2>

  <div class="bg-primary text-white p-4 rounded-3xl flex flex-col md:flex-row items-center justify-between">
    <div class="w-1/2 h-[415px] overflow-hidden rounded-3xl ml-25">
      <img src="{{ asset($room->photo) }}" alt="{{ $room->room_name }}" class="w-full h-full object-cover rounded-3xl">
    </div>

    <div class="text-white p-5 mt-4 md:mt-0 max-w-md w-full mr-32">
      <h3 class="text-2xl">{{ $room->room_name }}</h3>
      <p class="text-xl mt-2">Rp. {{ number_format($room->price, 0, ',', '.') }}/Session</p>

      <!-- Rating Display -->
      @if($totalReviews > 0)
        <div class="flex items-center mt-2 mb-3">
          <div class="flex">
            @for($i = 1; $i <= 5; $i++)
              @if($i <= floor($averageRating))
                <i class="fas fa-star text-yellow-400 text-sm"></i>
              @elseif($i == ceil($averageRating) && $averageRating - floor($averageRating) >= 0.5)
                <i class="fas fa-star-half-alt text-yellow-400 text-sm"></i>
              @else
                <i class="far fa-star text-gray-300 text-sm"></i>
              @endif
            @endfor
          </div>
          <span class="ml-2 text-sm">{{ number_format($averageRating, 1) }} ({{ $totalReviews }} reviews)</span>
        </div>
      @endif

      <p class="mt-4">{{ $room->description }}</p>

      <form action="{{ route('confirm_sewa_room') }}" method="POST">
      @csrf
      <input type="hidden" name="room_id" value="{{ $room->id }}">
        @csrf
        <div class="mb-4">
          <label for="orderDate" class="block mb-2">Order Date</label>
          <input type="date" id="orderDate" name="order_date" class="w-[500px] p-2 rounded text-primary" required min="{{ date('Y-m-d') }}">
        </div>

        <div class="mb-4">
            <label for="orderTime" class="block mb-2 text-white">Order Time</label>
            <div class="grid grid-cols-5 gap-2">
              @php
                $excluded = ['All In', 'No Session'];
              @endphp
              @foreach(explode(',', $room->duration) as $durasi)
                @php
                  $durasiTrim = trim($durasi);
                  @endphp
                  @if(!in_array($durasiTrim, $excluded))
                    <label class="relative block cursor-pointer">
                      <input type="checkbox" name="order_time[]" value="{{ $durasiTrim }}" class="hidden peer">
                        <div class="px-4 py-2 rounded text-center transition-all duration-200 bg-white text-primary border border-gray-300 peer-checked:bg-blue-500 peer-checked:text-white peer-checked:border-blue-600">
                          {{ $durasiTrim }}
                        </div>
                      </label>
                    @endif
              @endforeach
            </div>
        </div>

        <button type="submit" class="w-[500px] bg-blue-600 hover:bg-blue-700 text-white py-3 px-4 rounded mt-4">Order Now</button>
      </form>
    </div>
  </div>
</div>

<!-- Reviews Section -->
@if($totalReviews > 0)
<div class="container mx-auto mt-8 px-4">
  <h3 class="text-2xl font-bold mb-6 text-center">Customer Reviews ({{ $totalReviews }})</h3>
  
  <!-- Average Rating Summary -->
  <div class="bg-gray-50 rounded-lg p-6 mb-8 text-center">
    <div class="flex justify-center items-center mb-2">
      <div class="flex mr-3">
        @for($i = 1; $i <= 5; $i++)
          @if($i <= floor($averageRating))
            <i class="fas fa-star text-yellow-400 text-xl"></i>
          @elseif($i == ceil($averageRating) && $averageRating - floor($averageRating) >= 0.5)
            <i class="fas fa-star-half-alt text-yellow-400 text-xl"></i>
          @else
            <i class="far fa-star text-gray-300 text-xl"></i>
          @endif
        @endfor
      </div>
      <span class="text-2xl font-bold text-gray-800">{{ number_format($averageRating, 1) }}</span>
    </div>
    <p class="text-gray-600">Based on {{ $totalReviews }} reviews</p>
  </div>

  <!-- Individual Reviews -->
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="reviewsContainer">
    @foreach($reviews->take(6) as $review)
      <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-200 hover:shadow-xl transition-shadow duration-300">
        <!-- Review Header -->
        <div class="flex items-center justify-between mb-4">
          <div class="flex items-center">
            <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold text-sm">
              {{ strtoupper(substr($review->user_name, 0, 1)) }}
            </div>
            <div class="ml-3">
              <h4 class="font-semibold text-gray-800 text-sm">{{ $review->user_name }}</h4>
              <p class="text-gray-500 text-xs">{{ $review->created_at->format('d M Y') }}</p>
            </div>
          </div>
        </div>

        <!-- Rating Stars -->
        <div class="flex items-center mb-3">
          @for($i = 1; $i <= 5; $i++)
            @if($i <= $review->rating)
              <i class="fas fa-star text-yellow-400 text-sm"></i>
            @else
              <i class="far fa-star text-gray-300 text-sm"></i>
            @endif
          @endfor
          <span class="ml-2 text-sm text-gray-600 font-medium">{{ $review->rating }}/5</span>
        </div>

        <!-- Review Text -->
        <p class="text-gray-700 text-sm leading-relaxed line-clamp-4">{{ $review->feedback }}</p>
      </div>
    @endforeach
  </div>

  @if($totalReviews > 6)
    <div class="text-center mt-8">
      <button 
        class="bg-blue-500 hover:bg-blue-600 text-white py-3 px-8 rounded-lg font-medium transition-colors duration-200 shadow-md hover:shadow-lg" 
        onclick="showMoreReviews()"
        id="showMoreBtn"
      >
        Show More Reviews ({{ $totalReviews - 6 }} more)
      </button>
    </div>

    <!-- Hidden Reviews for Load More -->
    <div class="hidden grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6" id="moreReviews">
      @foreach($reviews->skip(6) as $review)
        <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-200 hover:shadow-xl transition-shadow duration-300">
          <!-- Review Header -->
          <div class="flex items-center justify-between mb-4">
            <div class="flex items-center">
              <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold text-sm">
                {{ strtoupper(substr($review->user_name, 0, 1)) }}
              </div>
              <div class="ml-3">
                <h4 class="font-semibold text-gray-800 text-sm">{{ $review->user_name }}</h4>
                <p class="text-gray-500 text-xs">{{ $review->created_at->format('d M Y') }}</p>
              </div>
            </div>
          </div>

          <!-- Rating Stars -->
          <div class="flex items-center mb-3">
            @for($i = 1; $i <= 5; $i++)
              @if($i <= $review->rating)
                <i class="fas fa-star text-yellow-400 text-sm"></i>
              @else
                <i class="far fa-star text-gray-300 text-sm"></i>
              @endif
            @endfor
            <span class="ml-2 text-sm text-gray-600 font-medium">{{ $review->rating }}/5</span>
          </div>

          <!-- Review Text -->
          <p class="text-gray-700 text-sm leading-relaxed">{{ $review->feedback }}</p>
        </div>
      @endforeach
    </div>
  @endif
</div>

<script>
function showMoreReviews() {
  const moreReviews = document.getElementById('moreReviews');
  const showMoreBtn = document.getElementById('showMoreBtn');
  
  if (moreReviews.classList.contains('hidden')) {
    moreReviews.classList.remove('hidden');
    moreReviews.classList.add('grid');
    showMoreBtn.textContent = 'Show Less Reviews';
  } else {
    moreReviews.classList.add('hidden');
    moreReviews.classList.remove('grid');
    showMoreBtn.innerHTML = 'Show More Reviews ({{ $totalReviews - 6 }} more)';
  }
}
</script>

@else
<div class="container mx-auto mt-8 px-4">
  <div class="bg-gray-50 rounded-lg p-8 text-center">
    <i class="fas fa-comments text-gray-400 text-4xl mb-4"></i>
    <h3 class="text-xl font-semibold text-gray-600 mb-2">No Reviews Yet</h3>
    <p class="text-gray-500">Be the first to leave a review for this studio room!</p>
  </div>
</div>
@endif

@endsection