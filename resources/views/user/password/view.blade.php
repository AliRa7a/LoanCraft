<!-- User Password Update View -->
@extends('user.dashboard');

@section('content')
<div class="p-6">
  <div class="bg-white shadow-md rounded-lg p-4">
    <!-- Section Title -->
    <h2 class="text-2xl font-semibold mb-4">Update Password</h2>

    <!-- Password Update Form -->
    <form class="mt-6" method="POST" action="{{route('user.password.store')}}" enctype="multipart/form-data">
      @csrf
      <!-- Current Password Input -->
      <div class="mb-4">
        <label for="current_password" class="block text-gray-700 font-medium">Current Password</label>
        <input type="password" id="current_password" name="current_password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-300 bg-gray-200 p-2">
      </div>
      <!-- New Password Input -->
      <div class="mb-4">
        <label for="new_password" class="block text-gray-700 font-medium">New Password</label>
        <input type="password" id="new_password" name="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-300 bg-gray-200 p-2">
      </div>
      <!-- Confirm Password Input -->
      <div class="mb-4">
        <label for="password_confirmation" class="block text-gray-700 font-medium">Confirm Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-300 bg-gray-200 p-2">
      </div>
      <!-- Submit Button -->
      <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-200 focus:ring-opacity-50">Save Changes</button>
    </form>
  </div>
</div>
@endsection