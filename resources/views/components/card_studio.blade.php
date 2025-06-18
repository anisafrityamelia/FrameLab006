<div class="studio-item bg-primary text-white rounded-2xl overflow-hidden text-center transform transition duration-300 hover:scale-105 shadow-md hover:shadow-xl" data-category="{{ $category }}">
    <div class="relative h-52 w-full">
        <img src="{{ $image }}" alt="{{ $title }}" class="h-52 w-full object-cover">
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    </div>
    <div class="p-5">
        <h5 class="text-lg">{{ $title }}</h5>
        <p>{{ $price }}</p> 
        <a href="{{ $category === 'Studio Partner' 
            ? route('detail_studio_partner', ['id' => $id]) 
            : route('detail_studio_room', ['id' => $id]) }}">
            <button class="mt-2 bg-blue-600 hover:bg-blue-700 text-white py-1 px-4 rounded">
                Check
            </button>
        </a>
    </div>
</div>