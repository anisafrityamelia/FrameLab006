@extends('layouts.app')

@section('title', 'Orders Total Admin')

@if(session('logged_in_user') && session('logged_in_user')->role === 'user')
  <script>
    window.location.href = "/landing_page1";
  </script>
  @php exit; @endphp
@endif

@section('content')
  <div class="bg-primary text-secondary rounded-3xl px-8 py-3 text-lg mb-6">
    <i class="fa-solid fa-cart-shopping mr-2"></i>Orders Total
  </div>

  <div class="bg-primary text-secondary rounded-3xl p-6">
    <div class="flex justify-between items-center mb-6">
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
            <th class="px-4 py-2">Studio Type</th>
            <th class="px-4 py-2">Order Date</th>
            <th class="px-4 py-2">Customer</th>
            <th class="px-4 py-2">Email</th>
            <th class="px-4 py-2">Total</th>
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
              <td class="px-4 py-2">{{ $order->room->studio_type ?? 'N/A' }}</td>
              <td class="px-4 py-2">{{ date('d/m/Y', strtotime($order->order_date)) }}</td>
              <td class="px-4 py-2">{{ $order->customer_name ?? 'N/A' }}</td>
              <td class="px-4 py-2 text-sm">{{ $order->customer_email ?? 'N/A' }}</td>
              <td class="px-4 py-2 font-semibold">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</td>
              <td class="px-4 py-2">
                @if($order->payment_status == 'paid')
                  <span class="bg-green-500 text-white px-2 py-1 rounded-full text-xs">Paid</span>
                @elseif($order->payment_status == 'pending')
                  <span class="bg-yellow-500 text-white px-2 py-1 rounded-full text-xs">Pending</span>
                @elseif($order->payment_status == 'failed')
                  <span class="bg-red-500 text-white px-2 py-1 rounded-full text-xs">Failed</span>
                @else
                  <span class="bg-gray-500 text-white px-2 py-1 rounded-full text-xs">Unknown</span>
                @endif
              </td>
              <td class="px-4 py-2">
                <div class="flex gap-2 justify-center">
                  <button class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-xs"
                          onclick="viewOrder('{{ $order->id }}')">
                    View
                  </button>
                  @if($order->payment_status == 'pending')
                    <button class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-xs"
                            onclick="markAsPaid('{{ $order->id }}')">
                      Mark Paid
                    </button>
                  @endif
                  <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs"
                          onclick="deleteOrder('{{ $order->id }}')">
                    Delete
                  </button>
                </div>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="10" class="px-4 py-8 text-center text-gray-500">
                Tidak ada data orders
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  <!-- Modal untuk View Order Detail -->
  <div id="orderModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50">
    <div class="flex items-center justify-center min-h-screen">
      <div class="bg-white rounded-lg p-6 max-w-md w-full mx-4">
        <div class="flex justify-between items-center mb-4">
          <h3 class="text-lg font-semibold">Order Details</h3>
          <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700">
            <i class="fas fa-times"></i>
          </button>
        </div>
        <div id="orderDetails">
          <!-- Order details akan diisi via JavaScript -->
        </div>
      </div>
    </div>
  </div>

  <script>
    function viewOrder(orderId) {
      // Implementasi view order detail
      // Bisa menggunakan AJAX untuk fetch detail order
      console.log('View order:', orderId);
      // Untuk sekarang, tampilkan modal sederhana
      document.getElementById('orderModal').classList.remove('hidden');
    }

    function closeModal() {
      document.getElementById('orderModal').classList.add('hidden');
    }

    function markAsPaid(orderId) {
      if (confirm('Apakah Anda yakin ingin menandai order ini sebagai paid?')) {
        // Implementasi mark as paid
        fetch(`/admin/orders/${orderId}/mark-paid`, {
          method: 'POST',
          headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json',
          },
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            location.reload();
          } else {
            alert('Gagal update status');
          }
        });
      }
    }

    function deleteOrder(orderId) {
      if (confirm('Apakah Anda yakin ingin menghapus order ini?')) {
        // Implementasi delete order
        fetch(`/admin/orders/${orderId}`, {
          method: 'DELETE',
          headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json',
          },
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            location.reload();
          } else {
            alert('Gagal menghapus order');
          }
        });
      }
    }

    // Filter functionality
    document.getElementById("studioFilter")?.addEventListener("change", function () {
      const selectedCategory = this.value;
      const rows = document.querySelectorAll("tbody tr");
      
      rows.forEach(row => {
        const studioType = row.querySelector('td:nth-child(4)')?.textContent.toLowerCase();
        if (selectedCategory === "all" || studioType?.includes(selectedCategory.toLowerCase())) {
          row.classList.remove("hidden");
        } else {
          row.classList.add("hidden");
        }
      });
    });
  </script>

@endsection