<div class="studio-item bg-primary text-white rounded-2xl overflow-hidden text-center" data-category="{{ $category }}">
    <img src="{{ $image }}" alt="{{ $title }}" class="h-52 w-full object-cover">
    <div class="p-5">
        <h5 class="text-lg">{{ $title }}</h5>
        <p>Rp. {{ $price }}</p>
        <a href="{{ $link }}">
            <button class="mt-2 bg-blue-600 hover:bg-blue-700 text-white py-1 px-4 rounded">Check</button>
        </a>
    </div>
</div>