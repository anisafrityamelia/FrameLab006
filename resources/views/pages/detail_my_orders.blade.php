@extends('layouts.app2')

@section('title', 'Detail My Orders')

@section('content')
    <div class="bg-primary text-secondary rounded-3xl p-14 h-[100vh] max-h-[600px]">
        <h4 class="text-center text-2xl mb-10 mt-2">Detail Order</h4>
        <div class="flex gap-12">
        	<div class="w-1/2 h-[415px] overflow-hidden rounded-3xl">
            	<img src="images/gambar11.jpeg" alt="Studio" class="w-full h-full object-cover rounded-3xl">
          	</div>
          	<div class="flex flex-col gap-1 flex-1 justify-center">
          		<div>
				    <label class="block" for="code_order">Code Order</label>
				    <input type="text" id="code_order" name="code_order" readonly class="w-full px-3 py-1 rounded bg-white text-black" />
            	</div>
            	<div>
				    <label class="block" for="room_name">Room Name</label>
				    <input type="text" id="room_name" name="room_name" readonly class="w-full px-3 py-1 rounded bg-white text-black" />
            	</div>
            	<div>
				    <label class="block" for="order_date">Order Date</label>
				    <input type="text" id="order_date" name="order_date" readonly class="w-full px-3 py-1 rounded bg-white text-black" />
            	</div>
            	<div>
				    <label class="block" for="order_time">Order Time</label>
				    <input type="text" id="order_time" name="order_time" readonly class="w-full px-3 py-1 rounded bg-white text-black" />
            	</div>
            	<div>
				    <label class="block" for="total_price">Total Price</label>
				    <input type="text" id="total_price" name="total_price" readonly class="w-full px-3 py-1 rounded bg-white text-black" />
            	</div>
            	<div>
				    <label class="block" for="studio_type">Studio Type</label>
				    <input type="text" id="studio_type" name="studio_type" readonly class="w-full px-3 py-1 rounded bg-white text-black" />
            	</div>
            	<div>
				    <label class="block" for="status">Status</label>
				    <input type="text" id="status" name="status" readonly class="w-full px-3 py-1 rounded bg-white text-black" />
            	</div>
            </div>
        </div>       		
    </div>
@endsection
