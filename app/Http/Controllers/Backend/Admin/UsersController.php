<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * Display all users.
     *
     * @return \Illuminate\View\View
     */
    public function allUsers()
    {
        $users = User::orderBy('id')->get();
        return view('admin.users.all_users', compact('users'));
    }

    /**
     * Delete a user.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteUser(User $user)
    {
        $user->delete();

        toastr()->success('User deleted successfully', 'Congrats');
        return redirect()->back();
    }

    /**
     * Display details of a specific user.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function userDetail($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.detail', compact('user'));
    }

    /**
     * Update the role of a user.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateRole(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Update the user role based on user input
        $user->role = $request->has('role') ? 'admin' : 'user';
        $user->save();

        toastr()->success('Role updated successfully', 'Congrats');
        return redirect()->back();
    }

    /**
     * Update the status of a user.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateStatus(Request $request, $id)
    {
        $user = User::find($id);

        // Update the user status based on user input
        $user->status = $request->has('status') ? 'active' : 'inactive';
        $user->save();

        toastr()->success('Status updated successfully', 'Congrats');
        return redirect()->back();
    }
}
