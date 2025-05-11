@extends('layouts.app')

@section('title', 'Data Verification')

@section('content')
    <div class="bg-primary text-secondary rounded-3xl px-8 py-3 text-lg mb-6">
        <i class="fa-solid fa-cart-shopping mr-2"></i>Verification Data
    </div>

    <div class="bg-primary text-secondary rounded-3xl p-6">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-6">
            @include('components.search')
            @include('components.sortby')
        </div>
        <div class="overflow-x-auto">
          	<table class="w-full text-center text-black">
            	<thead>
          			<tr class="bg-white text-black">
        			    <th class="px-4 py-2">No</th>
            		    <th class="px-4 py-2">Code Orders</th>
            		    <th class="px-4 py-2">Room Name</th>
			            <th class="px-4 py-2">Order Date</th>
			            <th class="px-4 py-2">Total</th>
				        <th class="px-4 py-2">Renters</th>
				        <th class="px-4 py-2">Studio Type</th>
				        <th class="px-4 py-2">Action</th>
            		</tr>
        		</thead>
        		<tbody>
		        </tbody>
		    </table>
	    </div>
    </div>
@endsection