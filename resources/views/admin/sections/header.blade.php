<header class="bg-gradient-to-r from-blue-500 to-indigo-700 px-6 py-3">
    <!-- Header Content: Logo and Title -->
    <div class="flex items-center justify-between">
        <!-- Logo and Title Section -->
        <div class="flex items-center space-x-4">
            <img src="{{asset('images/logo.png')}}" alt="Logo" class="w-12 h-12 rounded-full">
            <div>
                <h2 class="text-xl font-semibold text-white">Loan Craft</h2>
            </div>
        </div>
        <!-- User Profile Section -->
        <div class="relative inline-block text-gray-200">
            <!-- User Profile Button -->
            <div class="flex items-center space-x-4" id="profileButton">
                <img src="{{ asset(Auth::user()->image) }}" alt="User Profile" class="w-12 h-12 rounded-full cursor-pointer">
                <div>
                    <h2 class="text-xl font-semibold text-white cursor-pointer">Welcome, {{Auth::user()->name}}!</h2>
                    <p class="text-gray-200 text-sm cursor-pointer">{{Auth::user()->role}}</p>
                </div>
            </div>
            <!-- Profile Dropdown Menu -->
            <ul id="profileDropdown" class="hidden mt-2 py-2 w-32 bg-white border rounded-lg shadow-lg absolute right-0" x-cloak>
                <li><a href="{{route('admin.profile')}}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">My Profile</a></li>
                <li><a href="{{route('admin.password.update')}}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Change Password</a></li>
                <li>
                    <!-- Logout Form -->
                    <form method="POST" action="{{route('logout')}}">
                        @csrf
                        <a href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Logout</a>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</header>
