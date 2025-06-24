@extends('layouts.app')

@section('title', 'Orders Total Admin')
@if(session('logged_in_user') && session('logged_in_user')->role === 'user')
  <script>
    window.location.href = "/landing_page1";
  </script>
  @php exit; @endphp
@endif
@section('content')
  <div class="bg-primary text-secondary rounded-3xl px-8 py-3 text-lg mb-6">
    <i class="fa-solid fa-cart-shopping mr-2"></i>Orders Total
  </div>

  <div class="bg-primary text-secondary rounded-3xl p-6">
    <div class="flex justify-between items-center mb-6">
        @include('components.search')
        @include('components.sortby')
    </div>
    <div class="overflow-x-auto">
      <table class="w-full text-center text-black">
        <thead>
          <tr class="bg-white text-black">
            <th class="px-4 py-2">No</th>
            <th class="px-4 py-2">Code Orders</th>
            <th class="px-4 py-2">Room Name</th>
            <th class="px-4 py-2">Order Date</th>
            <th class="px-4 py-2">Total</th>
            <th class="px-4 py-2">Renters</th>
            <th class="px-4 py-2">Studio Type</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
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
