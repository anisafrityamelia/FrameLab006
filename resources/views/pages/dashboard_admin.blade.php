@extends('layouts.app')

@section('title', 'Dashboard Admin')
@if(session('logged_in_user') && session('logged_in_user')->role === 'user')
  <script>
    window.location.href = "/landing_page1";
  </script>
  @php exit; @endphp
@endif

@section('content')
    <div class="bg-primary text-secondary rounded-3xl p-7 min-h-screen lg:min-h-[560px] flex-1">
        <h4 class="text-xl sm:text-2xl mb-1 mt-1">Hello, Admin!</h4>
        <p class="text-base sm:text-lg">Welcome to your dashboard.</p>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-10">
            @include('components.card_admin', [
                'title' => 'Room Data',
                'count' => $roomCount,
                'desc' => 'Total rooms available',
                'link' => 'room_data_admin',
            ])
            
            @include('components.card_admin', [
                'title' => 'Orders Total',
                'count' => $orderCount,
                'desc' => 'Total incoming orders',
                'link' => 'orders_total_admin',
            ])
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-7">
            @include('components.card_admin', [
                'title' => 'User Data',
                'count' => $userCount,
                'desc' => 'Total registered users',
                'link' => 'users_data_admin',
            ])

            @include('components.card_admin', [
                'title' => 'Feedback',
                'count' => $feedbackCount,
                'desc' => 'Customer feedback',
                'link' => 'feedback_admin',
            ])
        </div>
    </div>
@endsection