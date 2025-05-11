<div class="bg-primary text-secondary w-full md:w-[286px] h-[100vh] max-h-[600px] p-8 rounded-3xl space-y-4">
    <a href="dashboard_admin" class="block text-lg hover:bg-secondary hover:text-primary rounded px-3 py-2"><i class="fa-solid fa-bars mr-2"></i>Dashboard</a>
    <a href="room_data_admin" class="block text-lg hover:bg-secondary hover:text-primary rounded px-3 py-2"><i class="fa-solid fa-house mr-2"></i>Room Data</a>
    <div class="relative">
      <button onclick="toggleSubmenu()" class="flex w-full items-center text-lg px-3 py-2 hover:bg-secondary hover:text-primary rounded">
        <span class="flex items-center">
          <i class="fa-solid fa-cart-shopping mr-2"></i>Orders Data
        </span>
        <i class="fa-solid fa-chevron-down ml-2 text-sm"></i>
      </button>
      <div id="submenu" class="mt-2 space-y-1 hidden">
        <a href="pending_data_admin" class="block text-lg py-2 pl-6 hover:bg-secondary hover:text-primary rounded">Pending</a>
        <a href="data_verification" class="block text-lg py-2 pl-6 hover:bg-secondary hover:text-primary rounded">Verification</a>
      </div>
    </div>
    <a href="feedback_admin" class="block text-lg hover:bg-secondary hover:text-primary rounded px-3 py-2"><i class="fa-solid fa-message mr-2"></i>Feedback</a>
    <a href="settings_admin" class="block text-lg hover:bg-secondary hover:text-primary rounded px-3 py-2"><i class="fa-solid fa-gear mr-2"></i>Settings</a>
    <a href="login" class="block text-lg hover:bg-secondary hover:text-primary rounded px-3 py-2"><i class="fa-solid fa-right-from-bracket mr-2"></i>Log Out</a>
</div>
