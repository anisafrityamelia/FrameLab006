<div class="bg-primary text-secondary w-full md:w-[286px] h-[100vh] max-h-[600px] p-8 rounded-3xl space-y-4">
    <a href="landing_page1" class="block text-lg hover:bg-secondary hover:text-primary rounded px-3 py-2">
        <i class="fa-solid fa-house mr-2"></i>Home
    </a>
    <div class="relative">
        <button onclick="toggleSubmenu()" class="flex w-full items-center text-lg px-3 py-2 hover:bg-secondary hover:text-primary rounded">
            <span class="flex items-center">
                <i class="fa-solid fa-user mr-2"></i>My Profile
            </span>
            <i class="fa-solid fa-chevron-down ml-2 text-sm"></i>
        </button>
        <div id="submenu" class="mt-2 space-y-1 hidden">
            <a href="edit_profile" class="block text-lg py-2 pl-6 hover:bg-secondary hover:text-primary rounded">
                Edit Profile
            </a>
            <a href="edit_password" class="block text-lg py-2 pl-6 hover:bg-secondary hover:text-primary rounded">
                Edit Password
            </a>
        </div>
    </div>
    <a href="my_orders" class="block text-lg hover:bg-secondary hover:text-primary rounded px-3 py-2">
        <i class="fa-solid fa-cart-shopping mr-2"></i>My Orders
    </a>
    <a href="chat_admin" class="block text-lg hover:bg-secondary hover:text-primary rounded px-3 py-2">
        <i class="fa-solid fa-message mr-2"></i>Chat Admin
    </a>
    <a href="login" class="block text-lg hover:bg-secondary hover:text-primary rounded px-3 py-2">
        <i class="fa-solid fa-right-from-bracket mr-2"></i>Log Out
    </a>
</div>
