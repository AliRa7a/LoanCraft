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

<div class="p-6">
  <div class="bg-white shadow-md rounded-lg p-4">
    <!-- Title -->
    <h2 class="text-2xl font-semibold mb-4">User Management</h2>

    <!-- Table -->
    <div class="overflow-x-auto">
      <table class="min-w-full table-auto border">
        <thead>
          <tr class="bg-gray-200 whitespace-nowrap">
            <th class="py-2 px-4">Sr. #</th>
            <th class="py-2 px-4">Name</th>
            <th class="py-2 px-4">Email</th>
            <th class="py-2 px-4">Role</th>
            <th class="py-2 px-4">Adminify</th>
            <th class="py-2 px-4">Action</th>
          </tr>
        </thead>

        <tbody id="user-table-body">
          @foreach($users as $index => $user)
          <tr>
            <td class="py-2 px-4">{{ $index + 1 }}</td>
            <td class="py-2 px-4">{{ $user->name }}</td>
            <td class="py-2 px-4">{{ $user->email }}</td>
            <td class="py-2 px-4">{{ $user->role }}</td>
            <td class="py-2 px-4">
              <!-- Switch for Role -->
              <form action="{{ route('user.update-role',$user->id) }}" method="post">
                @csrf
                <label class="switch">
                  <input type="checkbox" name="role" onchange="this.form.submit()" {{ $user->role === 'admin' ? 'checked' : '' }}>
                  <span class="slider"></span>
                </label>
              </form>
            </td>
            <td class="py-2 px-4 flex whitespace-nowrap">
              <!-- View Details Button -->
              <a href="{{route('user.deatail',$user->id)}}" class="bg-blue-500 text-white py-1 px-3 rounded-md hover:bg-blue-600 transition duration-200">View Details</a>
              <!-- Delete Button -->
              <button class="bg-red-500 text-white py-1 px-3 rounded-md hover:bg-red-600 transition duration-200 ml-2" onclick="showDeleteConfirmation('{{$user->id}}')">Delete</button>
              <!-- Delete Form -->
              <form action="{{ route('delete.users', $user->id) }}" method="POST" id="delete-form{{$user->id}}">
                @csrf
                @method('DELETE')
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection