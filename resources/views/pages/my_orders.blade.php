@extends('layouts.app2')

@section('title', 'My Orders')

@section('content')
    <div class="bg-primary text-secondary rounded-3xl p-14 h-[100vh] max-h-[600px]">
        <h4 class="text-center text-2xl mb-10 mt-2">My Orders</h4>
        <div class="overflow-x-auto">
          	<table class="w-full text-center text-black">
            	<thead>
              		<tr class="bg-white text-black">
                		<th class="px-4 py-2">No</th>
                		<th class="px-4 py-2">Code Orders</th>
                		<th class="px-4 py-2">Room Name</th>
				        <th class="px-4 py-2">Order Date</th>
				        <th class="px-4 py-2">Order Time</th>
				        <th class="px-4 py-2">Total Price</th>
				        <th class="px-4 py-2">Studio Type</th>
				        <th class="px-4 py-2">Status</th>
				        <th class="px-4 py-2">Action</th>
              		</tr>
            	</thead>
            	<tbody>
			    </tbody>
			</table>
		</div>
    </div>
@endsection