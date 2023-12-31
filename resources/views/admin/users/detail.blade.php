@extends('admin.dashboard')

@section('content')
<style>
    /* Switch Style */
    .switch {
        position: relative;
        display: inline-block;
        width: 50px;
        height: 24px;
    }

    .switch input {
        display: none;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        border-radius: 17px;
        /* Make the slider rounded */
        transition: 0.4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 16px;
        width: 16px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        border-radius: 50%;
        /* Make the circle rounded */
        transition: 0.4s;
    }

    input:checked+.slider {
        background-color: #2196F3;
    }

    input:checked+.slider:before {
        transform: translateX(26px);
    }
</style>

<div class="p-6 mx-auto max-w-xl">
    <div class="bg-white shadow-md rounded-lg p-4">
        <!-- User Profile Section -->
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <img src="{{ asset($user->image) }}" alt="{{ $user->name }}'s Profile Image" class="w-16 h-16 rounded-full">
                <div>
                    <h2 class="text-2xl font-semibold">{{ $user->name }}</h2>
                    <p class="text-gray-500">{{ $user->role }}</p>
                </div>
            </div>

            <!-- Change Status Section -->
            <div>
                <b>Change Status</b>
                <form action="{{ route('user.update-status',$user->id) }}" method="post">
                    @csrf
                    <label class="switch">
                        <input type="checkbox" name="status" onchange="this.form.submit()" {{ $user->status === 'active' ? 'checked' : '' }}>
                        <span class="slider"></span>
                    </label>
                </form>
            </div>
        </div>

        <!-- Separator Line -->
        <hr class="my-4 border-t border-gray-300">

        <!-- User Details Section -->
        <div>
            <h3 class="text-xl font-semibold mb-2">User Details</h3>
            <p class="font-semibold mb-2">Email: {{ $user->email }}</p>
            <p class="font-semibold mb-2">Phone: {{ $user->phone }}</p>
            <p class="font-semibold mb-2">Status: {{ $user->status }}</p>
        </div>
    </div>
</div>

@endsection