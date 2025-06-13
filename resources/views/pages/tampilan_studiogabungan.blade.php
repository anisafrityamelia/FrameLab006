@extends('layouts.app4')

@section('title', 'Studio Gabungan')

@section('content')
    <div class="container mx-auto mt-8 mb-10 max-w-7xl">
		<h4 class="text-center font-bold text-2xl mb-8 text-primary">OUR SERVICE</h4></a>
		<div class="flex flex-col md:flex-row justify-between items-center mb-12 gap-4">
            @include('components.search')
            @include('components.sortby', ['labelClass' => 'text-primary'])
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($data as $produk)
                @include('components.card_studio', [
                    'category' => $produk->studio_type ?? $produk->category ?? '-',
                    'image' => asset(str_starts_with($produk->photo, 'images/') ? $produk->photo : 'images/' . $produk->photo),
                    'title' => $produk->room_name,
                    'price' => $produk->price ?? '',
                    'link' => $produk->link ?? '-',
                ])
            @endforeach
        </div>
    </div>      
    <script>
    	document.getElementById("studioFilter").addEventListener("change", function () {
    		const selectedCategory = this.value;
    		const cards = document.querySelectorAll("[data-category]");
    		cards.forEach(card => {
    			if (selectedCategory === "all" || card.dataset.category === selectedCategory) {
    				card.classList.remove("hidden");
    			} else {
    				card.classList.add("hidden");
    			}
    		});
    	});
    </script>
@endsection