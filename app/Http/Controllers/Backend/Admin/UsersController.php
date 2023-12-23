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
        $user = User::findOrFail($id);
        return view('admin.users.detail', compact('user'));
    }

    public function updateRole(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->role = $request->has('role') ? 'admin' : 'user';
        $user->save();

        toastr()->success('Role updated successfully', 'Congrats');
        return redirect()->back();
    }
}
