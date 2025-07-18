<div class="w-full sm:w-auto flex" id="searchContainer">
    <input type="text" id="searchBar" name="keyword" value="{{ request('keyword') }}" placeholder="Search here!"
        class="w-full md:w-80 p-2 text-black rounded-l border border-primary focus:outline-none focus:ring-1 focus:ring-primary/40"
        autocomplete="off">
    <button type="submit"
        class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded-r">
        <i class="fa-solid fa-magnifying-glass"></i>
    </button>
</div>
