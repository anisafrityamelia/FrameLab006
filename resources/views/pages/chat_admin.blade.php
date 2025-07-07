@extends('layouts.app2')

@section('title', 'Chat Admin')
@if(session('logged_in_user') && session('logged_in_user')->role === 'admin')
  <script>
    window.location.href = "/dashboard_admin";
  </script>
  @php exit; @endphp
@endif

@section('content')
    <div class="bg-primary text-secondary rounded-3xl h-[100vh] max-h-[560px] overflow-hidden">
      	<div class="text-center">
	        <h4 class="text-center text-2xl mb-8 mt-10">Contact Us</h4>
	        <h5 class="text-xl mb-12">Please contact admin if you have any issues or questions.</h5>
	        <a href="https://wa.me/6282133176988" target="_blank">
	        	<button class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-6 rounded mb-12"><i class="fa-brands fa-whatsapp mr-2"></i>Continue to Chat</button>
	        </a>
	    </div>
	    <div class="h-[305px] bg-cover bg-center" style="background-image: url('images/bg_framelab_maroon.png');"></div>       		
 	</div>
@endsection