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
            @include('components.card_studio', [
                'category' => 'Studio Photo',
                'image' => 'images/gambar1.jpg',
                'title' => 'Photobooth',
                'price' => 'Rp. 50.000',
                'link' => 'detail_studio_photo',
            ])

            @include('components.card_studio', [
                'category' => 'Studio Space',
                'image' => 'images/gambar9.jpeg',
                'title' => 'Verdura',
                'price' => 'Rp. 100.000',
                'link' => '',
            ])

            @include('components.card_studio', [
                'category' => 'Studio Videos',
                'image' => 'images/gambar16.jpeg',
                'title' => 'Streamline',
                'price' => 'Rp. 135.000',
                'link' => '',
            ])

            @include('components.card_studio', [
                'category' => 'Studio Photo',
                'image' => 'images/gambar2.jpeg',
                'title' => 'Studio Pro Regular',
                'price' => 'Rp. 185.000',
                'link' => '',
            ])

            @include('components.card_studio', [
                'category' => 'Studio Space',
                'image' => 'images/gambar10.jpeg',
                'title' => 'Aqualoom',
                'price' => 'Rp. 100.000',
                'link' => '',
            ])

            @include('components.card_studio', [
                'category' => 'Studio Videos',
                'image' => 'images/gambar15.jfif',
                'title' => 'Pod Space',
                'price' => 'Rp. 135.000',
                'link' => 'detail_studio_video',
            ])

            @include('components.card_studio', [
                'category' => 'Studio Photo',
                'image' => 'images/gambar3.jpeg',
                'title' => 'High Angle',
                'price' => 'Rp. 50.000',
                'link' => '',
            ])

            @include('components.card_studio', [
                'category' => 'Studio Space',
                'image' => 'images/gambar11.jpeg',
                'title' => 'Terrena',
                'price' => 'Rp. 100.000',
                'link' => 'detail_studio_space',
            ])

            @include('components.card_studio', [
                'category' => 'Studio Videos',
                'image' => 'images/gambar14.jpeg',
                'title' => 'LoopBox',
                'price' => 'Rp. 120.000',
                'link' => '',
            ])

            @include('components.card_studio', [
                'category' => 'Studio Photo',
                'image' => 'images/gambar4.jpg',
                'title' => 'Wide Angle',
                'price' => 'Rp. 50.000',
                'link' => '',
            ])

            @include('components.card_studio', [
                'category' => 'Studio Space',
                'image' => 'images/gambar12.jpeg',
                'title' => 'Y2Kraze',
                'price' => 'Rp. 100.000',
                'link' => '',
            ])

            @include('components.card_studio', [
                'category' => 'Studio Videos',
                'image' => 'images/gambar13.jpeg',
                'title' => 'FrameRun',
                'price' => 'Rp. 100.000',
                'link' => '',
            ])

            @include('components.card_studio', [
                'category' => 'Studio Photo',
                'image' => 'images/gambar5.jpeg',
                'title' => 'Studio Pro Large',
                'price' => 'Rp. 300.000',
                'link' => '',
            ])

            @include('components.card_studio', [
                'category' => 'Studio Photo',
                'image' => 'images/gambar6.jpeg',
                'title' => 'Fish Eye',
                'price' => 'Rp. 50.000',
                'link' => '',
            ])

            @include('components.card_studio', [
                'category' => 'Studio Photo',
                'image' => 'images/gambar7.jpeg',
                'title' => 'Formal Photo',
                'price' => 'Rp. 130.000',
                'link' => '',
            ])

            @include('components.card_studio', [
                'category' => 'Studio Photo',
                'image' => 'images/gambar8.jpg',
                'title' => 'Bird Eye',
                'price' => 'Rp. 50.000',
                'link' => '',
            ])

            @include('components.card_studio', [
                'category' => 'Studio Partner',
                'image' => 'images/gambar19.jpg',
                'title' => 'LEXUS Photobox',
                'price' => '',
                'link' => '',
            ])

            @include('components.card_studio', [
                'category' => 'Studio Partner',
                'image' => 'images/gambar18.jpg',
                'title' => 'Hana Studio',
                'price' => '',
                'link' => '',
            ])

            @include('components.card_studio', [
                'category' => 'Studio Partner',
                'image' => 'images/gambar21.jpg',
                'title' => 'StudioLune',
                'price' => '',
                'link' => '',
            ])

            @include('components.card_studio', [
                'category' => 'Studio Partner',
                'image' => 'images/gambar20.jpg',
                'title' => 'EarthDio',
                'price' => '',
                'link' => '',
            ])
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