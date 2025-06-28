@extends('layouts.app2')

@section('title', 'My Orders')

@if(session('logged_in_user') && session('logged_in_user')->role === 'admin')
  <script>
    window.location.href = "/dashboard_admin";
  </script>
  @php exit; @endphp
@endif

@section('content')
    <div class="bg-primary text-secondary rounded-3xl p-10 h-[100vh] max-h-[560px]">
        <h4 class="text-center text-2xl mb-10">My Orders</h4>
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
                    @forelse($orders as $index => $order)
                        <tr class="@if($loop->even) bg-gray-100 @else bg-white @endif">
                            <td class="px-4 py-2">{{ $index + 1 }}</td>
                            <td class="px-4 py-2 font-mono text-sm">{{ $order->code_order }}</td>
                            <td class="px-4 py-2">{{ $order->room->room_name ?? 'N/A' }}</td>
                            <td class="px-4 py-2">{{ date('d/m/Y', strtotime($order->order_date)) }}</td>
                            <td class="px-4 py-2">{{ implode(', ', $order->order_times ?? []) }}</td>
                            <td class="px-4 py-2 font-semibold">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</td>
                            <td class="px-4 py-2">{{ $order->room->studio_type ?? 'N/A' }}</td>
                            <td class="px-4 py-2">
                                @if($order->payment_status == 'paid')
                                    <span class="bg-green-500 text-white px-2 py-1 rounded-full text-xs">Paid</span>
                                @elseif($order->payment_status == 'pending')
                                    <span class="bg-yellow-500 text-white px-2 py-1 rounded-full text-xs">Pending</span>
                                @else
                                    <span class="bg-red-500 text-white px-2 py-1 rounded-full text-xs">Failed</span>
                                @endif
                            </td>
                            <td class="px-4 py-2">
                                <a href="#" class="text-blue-500 underline text-xs">Detail</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-gray-500 py-8">Belum ada order.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
