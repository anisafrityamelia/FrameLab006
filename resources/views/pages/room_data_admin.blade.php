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
                		<th class="px-4 py-2">Photo</th>
                		<th class="px-4 py-2">Room Name</th>
				        <th class="px-4 py-2">Description</th>
				        <th class="px-4 py-2">Duration</th>
				        <th class="px-4 py-2">Studio Type</th>
						<th class="px-4 py-2">Price</th>
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
			<h5 class="text-center text-lg mb-2">Add New Room</h5>
			<div class="mb-2">
				<label for="room_name" class="block mb-1">Room Name</label>
				<input type="text" id="room_name" name="room_name" class="w-full border p-1 rounded text-black border border-primary focus:outline-none focus:ring-2 focus:ring-primary/40" placeholder="Enter Room Name" required>
			</div>
			<div class="mb-2">
				<label for="description" class="block mb-1">Description</label>
				<textarea id="description" name="description" class="w-full border p-1 rounded text-black border border-primary focus:outline-none focus:ring-2 focus:ring-primary/40" placeholder="Enter Description" required></textarea>
			</div>
			<div class="mb-3">
				<label for="duration" class="block mb-1">Duration</label>
				<div class="flex items-center mb-2">
					<input id="all-in" type="checkbox" name="duration[]" value="All In" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
					<label for="all-in" class="ms-2 text-sm font-medium text-gray-900">All In</label>
				</div>
				<div class="flex items-center mb-2">
					<input id="no-session" type="checkbox" name="duration[]" value="No Session" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
					<label for="no-session" class="ms-2 text-sm font-medium text-gray-900">No Session</label>
				</div>
				<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2">
					<div class="flex items-center">
						<input id="jam-1000" type="checkbox" name="duration[]" value="10.00" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
						<label for="jam-1000" class="ms-2 text-sm font-medium text-gray-900">10.00 AM</label>
					</div>
					<div class="flex items-center">
						<input id="jam-1110" type="checkbox" name="duration[]" value="11.10" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
						<label for="jam-1110" class="ms-2 text-sm font-medium text-gray-900">11.10 AM</label>
					</div>
					<div class="flex items-center">
						<input id="jam-1210" type="checkbox" name="duration[]" value="12.10" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
						<label for="jam-1210" class="ms-2 text-sm font-medium text-gray-900">12.10 PM</label>
					</div>
					<div class="flex items-center">
						<input id="jam-1220" type="checkbox" name="duration[]" value="12.20" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
						<label for="jam-1220" class="ms-2 text-sm font-medium text-gray-900">12.20 PM</label>
					</div>
					<div class="flex items-center">
						<input id="jam-0130" type="checkbox" name="duration[]" value="01.30" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
						<label for="jam-0130" class="ms-2 text-sm font-medium text-gray-900">01.30 PM</label>
					</div>
					<div class="flex items-center">
						<input id="jam-0220" type="checkbox" name="duration[]" value="02.20" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
						<label for="jam-0220" class="ms-2 text-sm font-medium text-gray-900">02.20 PM</label>
					</div>
					<div class="flex items-center">
						<input id="jam-0240" type="checkbox" name="duration[]" value="02.40" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
						<label for="jam-0240" class="ms-2 text-sm font-medium text-gray-900">02.40 PM</label>
					</div>
					<div class="flex items-center">
						<input id="jam-0350" type="checkbox" name="duration[]" value="03.50" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
						<label for="jam-0350" class="ms-2 text-sm font-medium text-gray-900">03.50 PM</label>
					</div>
					<div class="flex items-center">
						<input id="jam-0430" type="checkbox" name="duration[]" value="04.30" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
						<label for="jam-0430" class="ms-2 text-sm font-medium text-gray-900">04.30 PM</label>
					</div>
					<div class="flex items-center">
						<input id="jam-0500" type="checkbox" name="duration[]" value="05.00" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
						<label for="jam-0500" class="ms-2 text-sm font-medium text-gray-900">05.00 PM</label>
					</div>
				</div>
			</div>
			<div class="mb-2">
				<label for="studio_type" class="block mb-1">Studio Type</label>
				<select id="studio_type" name="studio_type" class="w-full border p-1 rounded text-black border border-primary focus:outline-none focus:ring-2 focus:ring-primary/40" required>
					<option value="" disabled selected>Select Studio Type</option>
					<option value="Studio Photo">Studio Photo</option>
					<option value="Studio Space">Studio Space</option>
					<option value="Studio Video">Studio Video</option>
				</select>
			</div>
			<div class="mb-2">
				<label for="price" class="block mb-1">Price</label>
				<input type="text" id="price" name="price" class="w-full border p-1 rounded text-black border border-primary focus:outline-none focus:ring-2 focus:ring-primary/40" placeholder="Enter Price" required>
			</div>
			<div class="mb-2">
				<label for="photo" class="block mb-1">Photo</label>
				<input type="file" id="photo" name="photo" class="w-full border p-1 rounded text-black border border-primary focus:outline-none focus:ring-2 focus:ring-primary/40" accept="image/*" required>
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
	<script>
		document.addEventListener("DOMContentLoaded", function () {
			const allInCheckbox = document.getElementById("all-in");
			const noSessionCheckbox = document.getElementById("no-session");
			const otherCheckboxes = Array.from(document.querySelectorAll('input[name="duration[]"]'))
				.filter(cb => cb.id !== "all-in" && cb.id !== "no-session");

			allInCheckbox.addEventListener("change", function () {
				if (this.checked) {
					noSessionCheckbox.checked = false;
					otherCheckboxes.forEach(cb => cb.checked = true);
				} else {
					otherCheckboxes.forEach(cb => cb.checked = false);
				}
			});

			noSessionCheckbox.addEventListener("change", function () {
				if (this.checked) {
					allInCheckbox.checked = false;
					otherCheckboxes.forEach(cb => cb.checked = false);
				}
			});

			otherCheckboxes.forEach(cb => {
				cb.addEventListener("change", function () {
					if (this.checked) {
						allInCheckbox.checked = false;
						noSessionCheckbox.checked = false;
					}
				});
			});
		});
	</script>
@endsection