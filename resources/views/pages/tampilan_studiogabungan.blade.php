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
                    'id' => $produk->id,
                    'category' => $produk->studio_type ?? $produk->category ?? '-',
                    'image' => asset(str_starts_with($produk->photo, 'images/') ? $produk->photo : 'images/' . $produk->photo),
                    'title' => $produk->room_name,
                    'price' => $produk->price ?? '',
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
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const searchBar = document.getElementById("searchBar");
            const gridContainer = document.querySelector(".grid");

            searchBar.addEventListener("input", function () {
                const keyword = this.value.trim();

                fetch(`/search-studio?keyword=${encodeURIComponent(keyword)}`)
                    .then(response => response.json())
                    .then(data => {
                        gridContainer.innerHTML = ""; // Kosongkan dulu isinya

                        if (data.length === 0) {
                            gridContainer.innerHTML = `<p class="col-span-full text-center text-gray-500">No studio found.</p>`;
                            return;
                        }

                        data.forEach(item => {
                            const image = item.photo.startsWith('images/') ? item.photo : 'images/' + item.photo;
                            const card = `
                                <div class="studio-item bg-primary text-white rounded-2xl overflow-hidden text-center transform transition duration-300 hover:scale-105 shadow-md hover:shadow-xl" data-category="${item.studio_type ?? item.category ?? '-'}">
                                    <div class="relative h-52 w-full">
                                        <img src="/${image}" alt="${item.room_name}" class="h-52 w-full object-cover">
                                        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
                                    </div>
                                    <div class="p-5">
                                        <h5 class="text-lg">${item.room_name}</h5>
                                        <p>${item.price ?? ''}</p>
                                        <a href="${item.kategori === 'partner' ? `/detail_studio_partner/${item.id}` : `/detail_studio_room/${item.id}`}">
                                            <button class="mt-2 bg-blue-600 hover:bg-blue-700 text-white py-1 px-4 rounded">Check</button>
                                        </a>
                                    </div>
                                </div>
                            `;
                            gridContainer.insertAdjacentHTML("beforeend", card);
                        });
                    })
                    .catch(error => {
                        console.error("Error fetching studio:", error);
                    });
            });
        });
    </script>
@endsection