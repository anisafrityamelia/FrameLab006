@extends('layouts.app')

@section('title', 'Room Partner Admin')

@section('content')
    <div class="bg-primary text-secondary rounded-3xl px-8 py-3 text-lg mb-6">
        <i class="fa-solid fa-house mr-2"></i>Room Partner
    </div>
	<div class="bg-primary text-secondary rounded-3xl p-6 h-[100vh] max-h-[485px]">
        <div class="flex justify-between items-center mb-6">
          	<button onclick="document.getElementById('tambahDataModal').showModal();" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 rounded">
          		<i class="fas fa-plus-circle mr-2"></i>Add New Room
        	</button>
        </div>
		<div class="overflow-x-auto overflow-y-auto w-full max-h-[370px] max-w-[1060px]">
			<div class="overflow-x-auto w-full">
				<table class="table-fixed w-full min-w-[1400px] border-collapse border border-gray-300 text-black shadow-sm rounded">
					<thead>
						<tr class="bg-gray-100 text-black text-base">
							<th class="px-2 py-2 border w-12">No</th>
							<th class="px-2 py-2 border w-24">Photo</th>
							<th class="px-2 py-2 border w-24">Photo 1</th>
							<th class="px-2 py-2 border w-24">Photo 2</th>
							<th class="px-2 py-2 border w-24">Photo 3</th>
							<th class="px-1 py-2 border w-24">Room Name</th>
							<th class="px-2 py-2 border">Description 1</th>
							<th class="px-2 py-2 border">Description 2</th>
							<th class="px-2 py-2 border">Description 3</th>
							<th class="px-2 py-2 border">Phone Number</th>
							<th class="px-2 py-2 border w-20">Studio Type</th>
							<th class="px-2 py-2 border">Action</th>
						</tr>
					</thead>
					<tbody class="bg-white">
						@foreach ($data as $index => $item)
							<tr class="hover:bg-gray-50">
								<td class="px-2 py-2 border text-center w-12">{{ $index + 1 }}</td>
								<td class="px-2 py-2 border w-24">
									@if($item->photo)
										<img src="{{ asset('images/' . $item->photo) }}" alt="Photo" width="80" class="w-20 h-20 object-cover rounded-md mx-auto" />
									@else 
										No Photo
									@endif
								</td>
								<td class="px-2 py-2 border w-24">
									@if($item->photo1)
										<img src="{{ asset('images/' . $item->photo1) }}" alt="Photo1" width="80" class="w-20 h-20 object-cover rounded-md mx-auto" />
									@else 
										No Photo
									@endif
								</td>
								<td class="px-2 py-2 border w-24">
									@if($item->photo2)
										<img src="{{ asset('images/' . $item->photo2) }}" alt="Photo2" width="80" class="w-20 h-20 object-cover rounded-md mx-auto" />
									@else 
										No Photo
									@endif
								</td>
								<td class="px-2 py-2 border w-24">
									@if($item->photo3)
										<img src="{{ asset('images/' . $item->photo3) }}" alt="Photo3" width="80" class="w-20 h-20 object-cover rounded-md mx-auto" />
									@else 
										No Photo
									@endif
								</td>
								<td class="px-2 py-2 border text-center w-40 break-words whitespace-normal">{{ $item->room_name }}</td>
								<td class="px-2 py-2 border text-center w-48 break-words whitespace-normal">{{ $item->description1 }}</td>
								<td class="px-2 py-2 border text-center w-48 break-words whitespace-normal">{{ $item->description2 }}</td>
								<td class="px-2 py-2 border text-center w-48 break-words whitespace-normal">{{ $item->description3 }}</td>
								<td class="px-2 py-2 border text-center w-25 break-words whitespace-normal">{{ $item->noTelepon }}</td>
								<td class="px-2 py-2 border text-center w-20">{{ $item->studio_type }}</td>
								<td class="border px-2">
									<div class="flex justify-center gap-1">
										<button type="button"
											onclick="openEditModal({{ $item->id }}, `{{ $item->room_name }}`, `{{ $item->description1 }}`, `{{ $item->description2 }}`, `{{ $item->description3 }}`, `{{ $item->noTelepon }}`, `{{ $item->studio_type }}`, `{{ $item->photo }}`, `{{ $item->photo1 }}`, `{{ $item->photo2 }}`, `{{ $item->photo3 }}`)"
											class="bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-3 rounded transition duration-200">Edit</button>
										<form action="{{ route('produk.delete', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure want to delete {{ $item->room_name }}?');">
											@csrf
											<button type="submit" 
											class="bg-red-600 hover:bg-red-700 text-white py-1 px-2 rounded transition duration-200">Delete</button>
										</form>
									</div>
									<dialog id="editModal{{ $item->id }}" class="modal w-full max-w-md rounded-lg">
										<form method="POST" action="{{ route('produk.update', $item->id) }}" enctype="multipart/form-data"
											class="bg-white text-primary p-6 rounded shadow-xl">
											@csrf
											<h5 class="text-center text-lg mb-2">Edit Room</h5>
											<div class="mb-1">
												<label for="room_name" class="block mb-1">Room Name</label>
												<input type="text" id="room_name" name="room_name" class="w-full border p-2 rounded text-black border border-primary focus:outline-none focus:ring-2 focus:ring-primary/40" placeholder="Enter Room Name" required>
											</div>
											<div class="mb-1">
												<label for="description1" class="block mb-1">Description 1</label>
												<textarea id="description1" name="description1" class="w-full border p-1 rounded text-black border border-primary focus:outline-none focus:ring-2 focus:ring-primary/40" placeholder="Enter Description" required></textarea>
											</div>
											<div class="mb-1">
												<label for="description2" class="block mb-1">Description 2</label>
												<textarea id="description2" name="description2" class="w-full border p-1 rounded text-black border border-primary focus:outline-none focus:ring-2 focus:ring-primary/40" placeholder="Enter Description" required></textarea>
											</div>
											<div class="mb-1">
												<label for="description3" class="block mb-1">Description 3</label>
												<textarea id="description3" name="description3" class="w-full border p-1 rounded text-black border border-primary focus:outline-none focus:ring-2 focus:ring-primary/40" placeholder="Enter Description" required></textarea>
											</div>
											<div class="mb-1">
												<label for="noTelepon" class="block mb-1">Phone Number</label>
												<input type="number" id="noTelepon" name="noTelepon" class="w-full border p-2 rounded text-black border border-primary focus:outline-none focus:ring-2 focus:ring-primary/40" accept="image/*" required>
											</div>
											<div class="mb-1">
												<label for="studio_type" class="block mb-1">Studio Type</label>
												<select id="studio_type" name="studio_type" class="w-full border p-2 rounded text-black border border-primary focus:outline-none focus:ring-2 focus:ring-primary/40" required>
													<option value="" disabled selected>Select Studio Type</option>
													<option value="Studio Partner">Studio Partner</option>
												</select>
											</div>
											<div class="mb-2">
												<label class="block mb-1">Current Photo</label>
												<img id="photoPreview{{ $item->id }}" src="{{ asset('images/' . $item->photo) }}" class="w-20 h-20 object-cover rounded mb-2" alt="Current Photo">
												<label for="photo" class="block mb-1">Change Photo</label>
												<input type="file" id="photo" name="photo" class="w-full border p-2 rounded text-black border border-primary focus:outline-none focus:ring-2 focus:ring-primary/40" accept="image/*">
											</div>
											<div class="mb-2">
												<label class="block mb-1">Current Photo 1</label>
												<img id="photoPreview1{{ $item->id }}" src="{{ asset('images/' . $item->photo1) }}" class="w-20 h-20 object-cover rounded mb-2" alt="Current Photo 1">
												<label for="photo1" class="block mb-1">Change Photo 1</label>
												<input type="file" id="photo1" name="photo1" class="w-full border p-2 rounded text-black border border-primary focus:outline-none focus:ring-2 focus:ring-primary/40" accept="image/*">
											</div>
											<div class="mb-2">
												<label class="block mb-1">Current Photo 2</label>
												<img id="photoPreview2{{ $item->id }}" src="{{ asset('images/' . $item->photo2) }}" class="w-20 h-20 object-cover rounded mb-2" alt="Current Photo 2">
												<label for="photo2" class="block mb-1">Change Photo 2</label>
												<input type="file" id="photo2" name="photo2" class="w-full border p-2 rounded text-black border border-primary focus:outline-none focus:ring-2 focus:ring-primary/40" accept="image/*">
											</div>
											<div class="mb-2">
												<label class="block mb-1">Current Photo 3</label>
												<img id="photoPreview3{{ $item->id }}" src="{{ asset('images/' . $item->photo3) }}" class="w-20 h-20 object-cover rounded mb-2" alt="Current Photo 3">
												<label for="photo3" class="block mb-1">Change Photo 3</label>
												<input type="file" id="photo3" name="photo3" class="w-full border p-2 rounded text-black border border-primary focus:outline-none focus:ring-2 focus:ring-primary/40" accept="image/*">
											</div>
											<div class="text-center">
												<button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 rounded">
													Update
												</button>
												<button type="button" onclick="document.getElementById('editModal{{ $item->id }}').close();" class="bg-gray-400 hover:bg-gray-500 text-white px-3 py-1.5 rounded">
													Cancel
												</button>
											</div>
										</form>
									</dialog>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<script>
				function openEditModal(id, name, desc1, desc2, desc3, phone, type, photo, photo1, photo2, photo3) {
					const modal = document.getElementById('editModal' + id);
					modal.querySelector('[name="room_name"]').value = name;
					modal.querySelector('[name="description1"]').value = desc1;
					modal.querySelector('[name="description2"]').value = desc2;
					modal.querySelector('[name="description3"]').value = desc3;
					modal.querySelector('[name="noTelepon"]').value = phone;
					modal.querySelector('[name="studio_type"]').value = type;
					const imgPreview = document.getElementById('photoPreview' + id);
					imgPreview.src = '/images/' + photo;
					const imgPreview1 = document.getElementById('photoPreview1' + id);
					imgPreview1.src = '/images/' + photo1;
					const imgPreview2 = document.getElementById('photoPreview2' + id);
					imgPreview2.src = '/images/' + photo2;
					const imgPreview3 = document.getElementById('photoPreview3' + id);
					imgPreview3.src = '/images/' + photo3;
					modal.showModal();
				}
			</script>
		</div>
	</div>
	<dialog id="tambahDataModal" class="modal w-full max-w-md rounded-lg">
		<form method="POST" action="{{ route('produk.simpan') }}" enctype="multipart/form-data" class="bg-white text-primary p-4 rounded shadow-xl">
			@csrf
			<h5 class="text-center text-lg mb-2">Add New Room</h5>
			<div class="mb-1">
				<label for="room_name" class="block mb-1">Room Name</label>
				<input type="text" id="room_name" name="room_name" class="w-full border p-2 rounded text-black border border-primary focus:outline-none focus:ring-2 focus:ring-primary/40" placeholder="Enter Room Name" required>
			</div>
			<div class="mb-1">
				<label for="description1" class="block mb-1">Description 1</label>
				<textarea id="description1" name="description1" class="w-full border p-1 rounded text-black border border-primary focus:outline-none focus:ring-2 focus:ring-primary/40" placeholder="Enter Description" required></textarea>
			</div>
			<div class="mb-1">
				<label for="description2" class="block mb-1">Description 2</label>
				<textarea id="description2" name="description2" class="w-full border p-1 rounded text-black border border-primary focus:outline-none focus:ring-2 focus:ring-primary/40" placeholder="Enter Description" required></textarea>
			</div>
			<div class="mb-1">
				<label for="description3" class="block mb-1">Description 3</label>
				<textarea id="description3" name="description3" class="w-full border p-1 rounded text-black border border-primary focus:outline-none focus:ring-2 focus:ring-primary/40" placeholder="Enter Description" required></textarea>
			</div>
			<div class="mb-1">
				<label for="noTelepon" class="block mb-1">Phone Number</label>
				<input type="number" id="noTelepon" name="noTelepon" class="w-full border p-2 rounded text-black border border-primary focus:outline-none focus:ring-2 focus:ring-primary/40" accept="image/*" required>
			</div>
			<div class="mb-1">
				<label for="studio_type" class="block mb-1">Studio Type</label>
				<select id="studio_type" name="studio_type" class="w-full border p-2 rounded text-black border border-primary focus:outline-none focus:ring-2 focus:ring-primary/40" required>
					<option value="" disabled selected>Select Studio Type</option>
                    <option value="Studio Partner">Studio Partner</option>
				</select>
			</div>
			<div class="mb-2">
				<label for="photo" class="block mb-1">Photo</label>
				<input type="file" id="photo" name="photo" class="w-full border p-2 rounded text-black border border-primary focus:outline-none focus:ring-2 focus:ring-primary/40" accept="image/*" required>
			</div>
			<div class="mb-2">
				<label for="photo1" class="block mb-1">Photo 1</label>
				<input type="file" id="photo1" name="photo1" class="w-full border p-2 rounded text-black border border-primary focus:outline-none focus:ring-2 focus:ring-primary/40" accept="image/*" required>
			</div>
			<div class="mb-2">
				<label for="photo2" class="block mb-1">Photo 2</label>
				<input type="file" id="photo2" name="photo2" class="w-full border p-2 rounded text-black border border-primary focus:outline-none focus:ring-2 focus:ring-primary/40" accept="image/*" required>
			</div>
			<div class="mb-2">
				<label for="photo3" class="block mb-1">Photo 3</label>
				<input type="file" id="photo3" name="photo3" class="w-full border p-2 rounded text-black border border-primary focus:outline-none focus:ring-2 focus:ring-primary/40" accept="image/*" required>
			</div>
			<div class="text-center">
				<button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 rounded">
					<i class="fas fa-archive mr-2"></i>Save
				</button>
			</div>
		</form>
	</dialog>
	@if(session('success'))
		<script>
			window.onload = function() {
				alert("{{ session('success') }}");
			};
		</script>
	@endif

	@if(session('error'))
		<script>
			window.onload = function() {
				alert("{{ session('error') }}");
			};
		</script>
	@endif

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
		document.addEventListener("click", function (event) {
			document.querySelectorAll("dialog"). forEach(dialog => {
				if (dialog.open && !dialog.contains(event.target) && !event.target.closest("button")) {
					dialog.close();
				}
			});
		});
	</script>

@endsection