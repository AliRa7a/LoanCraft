<div class="bg-gray-800 text-white w-64 px-6 py-8">
    <!-- Admin Dashboard Header -->
    <h1 class="text-2xl font-semibold">Admin Dashboard</h1>
    <!-- Sidebar Navigation Links -->
    <ul class="mt-8">
        <!-- Dashboard Link -->
        <li class="my-3">
            <a href="#" class="flex items-center text-gray-300 hover:text-white">
                Dashboard
            </a>
        </li>
        <!-- Users Section -->
        <li class="my-3">
            <div x-data="{ open: false }">
                <!-- Toggle Users Section -->
                <button @click="open = !open" class="flex items-center text-gray-300 hover:text-white">
                    Users
                    <!-- Toggle Icon -->
                    <svg x-show="!open" class="ml-auto h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                    <svg x-show="open" class="ml-auto h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                    </svg>
                </button>
                <!-- Users Submenu -->
                <ul x-show="open" class="ml-4 mt-2 space-y-2">
                    <li><a href="{{route('admin.all.users')}}" class="text-gray-300 hover:text-white">All Users</a></li>
                </ul>
            </div>
        </li>
        <!-- Loan Type Section -->
        <li class="my-3">
            <div x-data="{ open: false }">
                <!-- Toggle Loan Type Section -->
                <button @click="open = !open" class="flex items-center text-gray-300 hover:text-white">
                    Loan Type
                    <!-- Toggle Icon -->
                    <svg x-show="!open" class="ml-auto h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                    <svg x-show="open" class="ml-auto h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                    </svg>
                </button>
                <!-- Loan Type Submenu -->
                <ul x-show="open" class="ml-4 mt-2 space-y-2">
                    <li><a href="{{route('admin.all.loan.types')}}" class="text-gray-300 hover:text-white">View Loan Types</a></li>
                    <!-- <li><a href="#" class="text-gray-300 hover:text-white">Add Product</a></li> -->
                </ul>
            </div>
        </li>
        <!-- Loan Management Section -->
        <li class="my-3">
            <div x-data="{ open: false }">
                <!-- Toggle Loan Management Section -->
                <button @click="open = !open" class="flex items-center text-gray-300 hover:text-white">
                    Loan Management
                    <!-- Toggle Icon -->
                    <svg x-show="!open" class="ml-auto h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                    <svg x-show="open" class="ml-auto h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                    </svg>
                </button>
                <!-- Loan Management Submenu -->
                <ul x-show="open" class="ml-4 mt-2 space-y-2">
                    <li><a href="{{route('admin.all.loan.applications')}}" class="text-gray-300 hover:text-white">View Loan Application</a></li>
                    <li><a href="{{route('admin.approved.loan.applications')}}" class="text-gray-300 hover:text-white">View Approved Application</a></li>
                </ul>
            </div>
        </li>
    </ul>
</div>