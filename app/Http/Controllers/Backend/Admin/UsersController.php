<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function allUsers()
    {

        $users = User::orderBy('id')->get();
        return view('admin.users.all_users', compact('users'));
    }

    public function deleteUser(User $user)
    {
        $user->delete();

        toastr()->success('User deleted successfully', 'Congrats');
        return redirect()->back();
    }
    public function userDetail($id)
    {
        // Retrieve user details using the $id parameter
        $user = User::findOrFail($id);

        // Pass the user details to the view
        return view('admin.users.detail', compact('user'));
    }
}
