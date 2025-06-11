<section id="services" class="mt-16 mb-10">
    <h2 class="text-3xl font-bold text-center text-primary mb-8 drop-shadow-md">OUR SERVICE</h2>
    <div class="container mx-auto px-4">
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($rooms as $produk)
          @include('components.card_studio', [
            'category' => $produk->studio_type ?? '-',
            'image' => asset(str_starts_with($produk->photo, 'images/') ? $produk->photo : 'images/' . $produk->photo),
            'title' => $produk->room_name,
            'price' => $produk->price ?? '-',
            'link' => $produk->link ?? '#',
          ])
        @endforeach
      </div>
      <div class="text-center mt-8">
        <a href="{{ route('tampilan_studiogabungan') }}" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded transition-all duration-300 hover:shadow-lg">View More</a>
      </div>
    </div>
  </section>