<div class="bg-primary text-secondary w-full lg:w-[286px] h-auto lg:h-[100vh] lg:max-h-[560px] p-5 sm:p-8 rounded-2xl space-y-3 overflow-auto">
    <a href="{{ route('dashboard_admin') }}" class="block text-lg hover:bg-secondary hover:text-primary rounded px-3 py-2"><i class="fa-solid fa-bars mr-2"></i>Dashboard</a>
    <div class="relative">
      <button onclick="toggleRoomSubmenu()" class="flex w-full items-center text-lg px-3 py-2 hover:bg-secondary hover:text-primary rounded">
        <span class="flex items-center">
          <i class="fa-solid fa-house mr-2"></i>Room
        </span>
        <i class="fa-solid fa-chevron-down ml-2 text-sm"></i>
      </button>
      <div id="roomSubmenu" class="mt-2 space-y-1 hidden">
        <a href="{{ route('room_data_admin') }}" class="block text-lg py-2 pl-6 hover:bg-secondary hover:text-primary rounded">Room Data</a>
        <a href="{{ route('room_partner_admin') }}" class="block text-lg py-2 pl-6 hover:bg-secondary hover:text-primary rounded">Room Partner</a>
      </div>
    </div>
    <a href="{{ route('feedback_admin') }}" class="block text-lg hover:bg-secondary hover:text-primary rounded px-3 py-2"><i class="fa-solid fa-message mr-2"></i>Feedback</a>
    <a href="{{ route('settings_admin') }}" class="block text-lg hover:bg-secondary hover:text-primary rounded px-3 py-2"><i class="fa-solid fa-gear mr-2"></i>Settings</a>
    <a href="{{ route('logout') }}" class="block text-lg hover:bg-secondary hover:text-primary rounded px-3 py-2"><i class="fa-solid fa-right-from-bracket mr-2"></i>Log Out</a>
</div>
