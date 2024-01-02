<!-- User Sidebar -->
<div class="bg-gray-800 text-white w-64 px-6 py-8">
    <!-- Dashboard Title -->
    <h1 class="text-2xl font-semibold">User Dashboard</h1>
    <!-- Sidebar Menu -->
    <ul class="mt-8">
        <!-- Dashboard Link -->
        <li class="my-3">
            <a href="#" class="flex items-center text-gray-300 hover:text-white">
                Dashboard
            </a>
        </li>
        <!-- Loan Details Dropdown -->
        <li class="my-3">
            <!-- Loan Details Dropdown Button -->
            <div x-data="{ open: false }">
                <button @click="open = !open" class="flex items-center text-gray-300 hover:text-white">
                    Loan Details
                    <!-- Dropdown Arrow Icons -->
                    <svg x-show="!open" class="ml-auto h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                    <svg x-show="open" class="ml-auto h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                    </svg>
                </button>
                
                <!-- Loan Details Dropdown Items -->
                <ul x-show="open" class="ml-4 mt-2 space-y-2">
                    <li><a href="{{route('user.loan.application')}}" class="text-gray-300 hover:text-white">Apply for loan</a></li>
                    <li><a href="{{route('user.approved.loan')}}" class="text-gray-300 hover:text-white">View Approved Loans</a></li>
                </ul>
            </div>
        </li>
    </ul>
</div>