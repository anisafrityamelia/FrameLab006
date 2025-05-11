@extends('layouts.app')

@section('title', 'Room Data Admin')

@section('content')
    <div class="bg-primary text-secondary rounded-3xl px-8 py-3 text-lg mb-6">
        <i class="fa-solid fa-house mr-2"></i>Room Data
    </div>
	<div class="bg-primary text-secondary rounded-3xl p-6">
        <div class="flex justify-between items-center mb-6">
          	<button onclick="document.getElementById('tambahDataModal').showModal();" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 rounded">
          		<i class="fas fa-plus-circle mr-2"></i>Add New Room
        	</button>
        </div>
		<div class="overflow-x-auto">
          	<table class="w-full text-center text-black">
            	<thead>
              		<tr class="bg-white text-black">
                		<th class="px-4 py-2">No</th>
                		<th class="px-4 py-2">Phone</th>
                		<th class="px-4 py-2">Room Name</th>
				        <th class="px-4 py-2">Price</th>
				        <th class="px-4 py-2">Description</th>
				        <th class="px-4 py-2">Duration</th>
				        <th class="px-4 py-2">Studio Type</th>
				        <th class="px-4 py-2">Action</th>
              		</tr>
            	</thead>
            	<tbody>
			    </tbody>
			</table>
		</div>
	</div>
	<dialog id="tambahDataModal" class="modal w-full max-w-md rounded-lg">
		<form method="dialog" class="bg-white text-primary p-6 rounded shadow-xl">
			<h5 class="text-center text-lg mb-4">Add New Room</h5>
			<div class="mb-3">
				<label for="room_name" class="block mb-1">Room Name</label>
				<input type="text" id="room_name" name="room_name" class="w-full border p-2 rounded text-black border border-primary focus:outline-none focus:ring-2 focus:ring-primary/40" placeholder="Enter Room Name" required>
			</div>
			<div class="mb-3">
				<label for="price" class="block mb-1">Price / Session</label>
				<input type="text" id="price" name="price" class="w-full border p-2 rounded text-black border border-primary focus:outline-none focus:ring-2 focus:ring-primary/40" placeholder="Enter Price" required>
			</div>
			<div class="mb-3">
				<label for="description" class="block mb-1">Description</label>
				<textarea id="description" name="description" class="w-full border p-2 rounded text-black border border-primary focus:outline-none focus:ring-2 focus:ring-primary/40" placeholder="Enter Description" required></textarea>
			</div>
			<div class="mb-3">
				<label for="duration" class="block mb-1">Duration</label>
				<input type="text" id="duration" name="duration" class="w-full border p-2 rounded text-black border border-primary focus:outline-none focus:ring-2 focus:ring-primary/40" placeholder="Enter Duration" required>
			</div>
			<div class="mb-3">
				<label for="studio_type" class="block mb-1">Studio Type</label>
				<select id="studio_type" name="studio_type" class="w-full border p-2 rounded text-black border border-primary focus:outline-none focus:ring-2 focus:ring-primary/40" required>
					<option value="" disabled selected>Select Studio Type</option>
					<option value="Studio Photo">Studio Photo</option>
					<option value="Studio Space">Studio Space</option>
					<option value="Studio Video">Studio Video</option>
				</select>
			</div>
			<div class="mb-3">
				<label for="photo" class="block mb-1">Photo</label>
				<input type="file" id="photo" name="photo" class="w-full border p-2 rounded text-black border border-primary focus:outline-none focus:ring-2 focus:ring-primary/40" accept="image/*" required>
			</div>
			<div class="text-center">
				<button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 rounded">
					<i class="fas fa-archive mr-2"></i>Save
				</button>
			</div>
		</form>
	</dialog>
	<script>
    	function toggleSubmenu() {
    		const submenu = document.getElementById('submenu');
    		submenu.classList.toggle('hidden');
    	}

    	const modal = document.getElementById('tambahDataModal');
    	const openButton = document.querySelector('[onclick*="tambahDataModal"]');
    	openButton.addEventListener('click', function(event) {
    		event.stopPropagation();
    		modal.showModal();
    	});

    	window.addEventListener('click', function(event) {
    		if (modal.open && !modal.querySelector('form').contains(event.target)) {
    			modal.close();
    		}
    	});
    </script>
@endsection