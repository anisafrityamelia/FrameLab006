@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="bg-primary text-secondary rounded-3xl p-7 h-[100vh] max-h-[560px]">
        <h4 class="text-2xl mb-1 mt-1">Hello, Admin!</h4>
        <p class="text-lg">Welcome to your dashboard.</p>
        <div class="flex flex-wrap justify-center gap-10 mt-7">
            @include('components.card_admin', [
                'title' => 'Room Data',
                'count' => '20',
                'desc' => 'Total rooms available',
                'link' => 'room_data_admin',
            ])
            
            @include('components.card_admin', [
                'title' => 'Orders Total',
                'count' => '17',
                'desc' => 'Total incoming orders',
                'link' => 'orders_total_admin',
            ])
        </div>
        <div class="flex flex-wrap justify-center gap-10 mt-8">
            @include('components.card_admin', [
                'title' => 'User Data',
                'count' => '130',
                'desc' => 'Total registered users',
                'link' => 'users_data_admin',
            ])

            @include('components.card_admin', [
                'title' => 'Feedback',
                'count' => '85',
                'desc' => 'Customer feedback',
                'link' => 'feedback_admin',
            ])
        </div>
    </div>
@endsection