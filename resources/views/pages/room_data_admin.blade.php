@extends('layouts.app')

@section('title', 'Room Data Admin')

@section('content')
    <div class="bg-primary text-secondary rounded-3xl px-8 py-3 text-lg mb-6">
        <i class="fa-solid fa-house mr-2"></i>Room Data
    </div>
    <div class="bg-primary text-secondary rounded-3xl p-6 h-[485px]">
        <div class="flex justify-between items-center mb-6">
              <button onclick="document.getElementById('tambahDataModal').showModal();" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 rounded">
                  <i class="fas fa-plus-circle mr-2"></i>Add New Room
            </button> 
        </div>
        <div class="overflow-x-auto max-h-[370px] overflow-y-auto">
              <table class="w-full text-center text-black">
                <thead>
                      <tr class="bg-gray-100 text-black text-base">
                        <th class="px-4 py-2 border">No</th>
                        <th class="px-4 py-2 border">Photo</th>
                        <th class="px-4 py-2 border">Room Name</th>
                        <th class="px-4 py-2 border">Description</th>
                        <th class="px-4 py-2 border">Duration</th>
                        <th class="px-4 py-2 border">Studio Type</th>
                        <th class="px-4 py-2 border">Price</th>
                        <th class="px-4 py-2 border">Action</th>
                      </tr>
                </thead> 
                <tbody>
                    @foreach ($data as $index => $room)
                        <tr class="bg-white border-t text-black">
                            <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                            <td class="px-4 py-2 border">
                                <img src="{{ asset($room->photo) }}" alt="Room Photo" class="w-16 h-16 object-cover rounded">
                            </td>
                            <td class="px-4 py-2 border">{{ $room->room_name }}</td>
                            <td class="px-4 py-2 border">{{ $room->description }}</td>
                            <td class="px-4 py-2 border">{{ $room->duration }}</td>
                            <td class="px-4 py-2 border">{{ $room->studio_type }}</td>
                            <td class="px-4 py-2 border">{{ $room->price }}</td>
                            <td class="px-4 py-2 space-x-2 border">
                                <div class="flex space-x-2 justify-center">
                                    {{-- Tombol Edit --}}
                                    <button onclick="openEditModal({{ $room->id }})" class="bg-yellow-500 hover:bg-yellow-600 text-white px-2 py-1 rounded text-sm">
                                        Edit
                                    </button>

                                    {{-- Tombol Delete --}}
                                    <form action="{{ route('room_data_admin.hapus', $room->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this room?')" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-2 py-1 rounded text-sm">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td> 
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <dialog id="tambahDataModal" class="modal w-full max-w-md rounded-lg">
        <form action="{{ route('room_data_admin.simpan') }}" method="POST" enctype="multipart/form-data" class="bg-white text-primary p-6 rounded shadow-xl">
            @csrf
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
    <dialog id="editModal" class="modal w-full max-w-md rounded-lg">
        <form id="editForm" method="POST" enctype="multipart/form-data" class="bg-white text-primary p-6 rounded shadow-xl">
            @csrf
            @method('PUT')

            <h5 class="text-center text-lg mb-2">Edit Room</h5>

            <input type="hidden" id="edit_id" name="id">

            <div class="mb-2">
                <label for="edit_room_name" class="block mb-1">Room Name</label>
                <input type="text" id="edit_room_name" name="room_name" class="w-full border p-1 rounded text-black border border-primary" required>
            </div>

            <div class="mb-2">
                <label for="edit_description" class="block mb-1">Description</label>
                <textarea id="edit_description" name="description" class="w-full border p-1 rounded text-black border border-primary" required></textarea>
            </div>

            <div class="mb-3">
                <label class="block mb-1">Duration</label>

                {{-- All In --}}
                <div class="flex items-center mb-2">
                    <input id="edit_all_in" type="checkbox" name="duration[]" value="All In" class="w-4 h-4 text-blue-600 border-gray-300 rounded" />
                    <label for="edit_all_in" class="ms-2 text-sm font-medium text-gray-900">All In</label>
                </div>

                {{-- No Session --}}
                <div class="flex items-center mb-2">
                    <input id="edit_no_session" type="checkbox" name="duration[]" value="No Session" class="w-4 h-4 text-blue-600 border-gray-300 rounded" />
                    <label for="edit_no_session" class="ms-2 text-sm font-medium text-gray-900">No Session</label>
                </div>

                {{-- Jam per sesi --}}
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2" id="edit_duration_checkboxes">
                    @foreach (['10.00', '11.10', '12.10', '12.20', '01.30', '02.20', '02.40', '03.50', '04.30', '05.00'] as $jam)
                        <div class="flex items-center">
                            <input type="checkbox" name="duration[]" value="{{ $jam }}" id="edit_jam_{{ str_replace('.', '', $jam) }}" class="edit_duration_checkbox w-4 h-4 text-blue-600 border-gray-300 rounded">
                            <label for="edit_jam_{{ str_replace('.', '', $jam) }}" class="ms-2 text-sm font-medium text-gray-900">{{ $jam }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="mb-2">
                <label for="edit_studio_type" class="block mb-1">Studio Type</label>
                <select id="edit_studio_type" name="studio_type" class="w-full border p-1 rounded text-black border border-primary" required>
                    <option value="Studio Photo">Studio Photo</option>
                    <option value="Studio Space">Studio Space</option>
                    <option value="Studio Video">Studio Video</option>
                </select>
            </div>

            <div class="mb-2">
                <label for="edit_price" class="block mb-1">Price</label>
                <input type="text" id="edit_price" name="price" class="w-full border p-1 rounded text-black border border-primary" required>
            </div>

            <div class="mb-2">
                <label class="block mb-1">Current Photo</label>
                <img id="edit_photo_preview" src="" alt="Current Photo" class="mt-2 w-24 h-24 object-cover rounded shadow">
                <label for="edit_photo" class="block mb-1">Change Photo</label>
                <input type="file" id="edit_photo" name="photo" class="w-full border p-1 rounded text-black border border-primary" accept="image/*">
            </div>
            <div class="flex justify-center space-x-3 mt-4">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 rounded">
                    Update
                </button>
                <button type="button" onclick="document.getElementById('editModal').close();" class="bg-gray-400 hover:bg-gray-500 text-white px-3 py-1.5 rounded">
                    Cancel
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
    <script>
        function openEditModal(id) {
            fetch(`/api/room_data/${id}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('editForm').action = `/room_data_admin/update/${id}`;
                    document.getElementById('edit_room_name').value = data.room_name;
                    document.getElementById('edit_description').value = data.description;
                    document.getElementById('edit_studio_type').value = data.studio_type;
                    document.getElementById('edit_price').value = data.price;
                    document.getElementById('edit_photo_preview').src = `/${data.photo}`;

                    // Reset checkbox
                    document.querySelectorAll('.edit_duration_checkbox').forEach(cb => cb.checked = false);
                    document.getElementById('edit_all_in').checked = false;
                    document.getElementById('edit_no_session').checked = false;

                    // Isi centang sesuai data.duration
                    const durasiList = data.duration.split(',').map(d => d.trim());
                    const allDurasi = ['10.00','11.10','12.10','12.20','01.30','02.20','02.40','03.50','04.30','05.00'];
                    
                    durasiList.forEach(val => {
                        const checkbox = document.querySelector(`.edit_duration_checkbox[value="${val}"]`);
                        if (checkbox) checkbox.checked = true;
                    });

                    // Aktifkan "All In" kalau semua durasi ke-check
                    const checkedCount = document.querySelectorAll('.edit_duration_checkbox:checked').length;
                    if (checkedCount === allDurasi.length) {
                        document.getElementById('edit_all_in').checked = true;
                    }

                    // Aktifkan "No Session" kalau kosong
                    if (durasiList.includes('No Session')) {
                        document.getElementById('edit_no_session').checked = true;
                        document.querySelectorAll('.edit_duration_checkbox').forEach(cb => cb.checked = false);
                    }

                    document.getElementById('editModal').showModal();
                });
        }

        // Checkbox logic: All In & No Session
        document.addEventListener("DOMContentLoaded", function () {
            const editAllIn = document.getElementById("edit_all_in");
            const editNoSession = document.getElementById("edit_no_session");
            const editCheckboxes = document.querySelectorAll('.edit_duration_checkbox');

            editAllIn.addEventListener("change", function () {
                if (this.checked) {
                    editNoSession.checked = false;
                    editCheckboxes.forEach(cb => cb.checked = true);
                } else {
                    editCheckboxes.forEach(cb => cb.checked = false);
                }
            });

            editNoSession.addEventListener("change", function () {
                if (this.checked) {
                    editAllIn.checked = false;
                    editCheckboxes.forEach(cb => cb.checked = false);
                }
            });

            editCheckboxes.forEach(cb => {
                cb.addEventListener("change", function () {
                    editAllIn.checked = false;
                    editNoSession.checked = false;
                });
            });
        });
    </script>
@endsection
