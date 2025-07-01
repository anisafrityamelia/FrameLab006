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
    <div class="flex justify-end  items-center mb-6">
        @include('components.sortby')
    </div>

    <div class="overflow-x-auto max-h-[370px] overflow-y-auto w-full">
      <table class="min-w-[1400px] w-full text-center text-black">
        <thead>
          <tr class="bg-gray-100 text-black">
            <th class="px-1 py-3 border w-[40px]">No</th>
            <th class="px-1 py-3 border w-[120px]">Code Orders</th>
            <th class="px-1 py-3 border w-[140px]">Room Name</th>
            <th class="px-1 py-3 border w-[120px]">Studio Type</th>
            <th class="px-1 py-3 border w-[120px]">Order Date</th>
            <th class="px-1 py-3 border w-[140px]">Customer</th>
            <th class="px-2 py-3 border w-[150px]">Email</th>
            <th class="px-1 py-3 border w-[100px]">Total</th>
            <th class="px-1 py-3 border w-[120px]">Status</th>
            <th class="px-1 py-3 border w-[150px]">Action</th>
          </tr>
        </thead>
        <tbody> 
          @forelse($orders as $index => $order)
            <tr class="bg-white text-base text-black">
              <td class="px-1 py-1 border">{{ $index + 1 }}</td>
              <td class="px-1 py-1 font-mono text-sm border break-words w-[120px]">{{ $order->code_order }}</td>
              <td class="px-1 py-1 border break-words w-[140px]">{{ $order->room->room_name ?? 'N/A' }}</td>
              <td class="px-1 py-1 border break-words w-[120px]">{{ $order->room->studio_type ?? 'N/A' }}</td>
              <td class="px-1 py-1 border break-words w-[120px]">{{ date('d/m/Y', strtotime($order->order_date)) }}</td>
              <td class="px-1 py-1 border break-words w-[140px]">{{ $order->customer_name ?? 'N/A' }}</td>
              <td class="px-2 py-1 text-sm border break-words w-[150px]">{{ $order->customer_email ?? 'N/A' }}</td>
              <td class="px-1 py-1 border break-words w-[120px]">{{ number_format($order->total_amount, 0, ',', '.') }}</td>
              <td class="px-1 py-1 border break-words w-[120px]">
                @if($order->payment_status == 'paid')
                  <span class="bg-green-500 text-white px-2 py-1 rounded-full text-xs">Paid</span>
                @elseif($order->payment_status == 'pending')
                  <span class="bg-yellow-500 text-white px-2 py-1 rounded-full text-xs">Pending</span>
                @elseif($order->payment_status == 'failed')
                  <span class="bg-red-500 text-white px-2 py-1 rounded-full text-xs">Cancelled</span>
                @else
                  <span class="bg-gray-500 text-white px-2 py-1 rounded-full text-xs">Unknown</span>
                @endif
              </td>
              <td class="px-2 py-2 border">
                <div class="flex gap-2 justify-center">
                  <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs"
                          onclick="deleteOrder('{{ $order->id }}')">
                    Delete
                  </button>
                  <button class="bg-indigo-500 hover:bg-indigo-600 text-white px-3 py-1 rounded text-xs"
                        onclick="editStatus('{{ $order->id }}', '{{ $order->payment_status }}')">
                    Edit
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
  <div id="editStatusModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50">
    <div class="flex items-center justify-center min-h-screen">
      <div class="bg-white rounded-lg p-6 max-w-md w-full mx-4">
        <div class="flex justify-between items-center mb-4">
          <h3 class="text-lg font-semibold">Edit Order Status</h3>
          <button onclick="closeEditModal()" class="text-gray-500 hover:text-gray-700">
            <i class="fas fa-times"></i>
          </button>
        </div>
        <form id="editStatusForm">
          @csrf
          @method('PATCH')
          <input type="hidden" id="editOrderId">
          <label for="payment_status" class="block mb-2 text-sm font-medium text-gray-700">Pilih Status:</label>
          <select id="payment_status" name="payment_status" class="w-full border px-3 py-2 rounded mb-4">
            <option value="paid">Paid</option>
            <option value="cancelled">Cancelled</option>
          </select>
          <div class="text-right">
            <button type="button" onclick="submitEditStatus()" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
              Simpan
            </button>
          </div>
        </form>
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
      if (confirm('Are you sure you want to delete this order?')) {
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
            alert('Gagal menghapus order: ' + data.message);
          }
        });
      }
    }
    function editStatus(orderId, currentStatus) {
      document.getElementById('editOrderId').value = orderId;
      document.getElementById('payment_status').value = (currentStatus === 'failed') ? 'cancelled' : currentStatus;
      document.getElementById('editStatusModal').classList.remove('hidden');
    }

    function closeEditModal() {
      document.getElementById('editStatusModal').classList.add('hidden');
    }

    function submitEditStatus() {
      const orderId = document.getElementById('editOrderId').value;
      const status = document.getElementById('payment_status').value;

      fetch(`/admin/orders/${orderId}/update-status`, {
        method: 'PATCH',
        headers: {
          'X-CSRF-TOKEN': '{{ csrf_token() }}',
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({ payment_status: status })
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          location.reload();
        } else {
          alert(data.message);
        }
      });
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