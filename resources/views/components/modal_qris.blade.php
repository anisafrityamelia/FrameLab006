<div id="qrisModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
  <div class="bg-white rounded-lg p-6 max-w-md w-full">
    <div class="flex justify-between items-center border-b pb-2 mb-4">
      <h5 class="text-primary font-bold">Scan QRIS for payment!</h5>
      <button type="button" onclick="document.getElementById('qrisModal').classList.add('hidden')" class="text-gray-500 hover:text-gray-700">
        <i class="fas fa-times"></i>
      </button>
    </div>
    <div class="flex justify-center">
      <img src="images/qris.png" alt="QRIS Payment" class="max-w-xs" />
    </div>
  </div>
</div>
<script>
  window.addEventListener('click', function(event) {
    const modal = document.getElementById('qrisModal');
    if (event.target === modal) {
      modal.classList.add('hidden');
    }
  });
</script>
