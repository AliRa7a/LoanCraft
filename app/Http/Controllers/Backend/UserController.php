<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display the user dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('user.dashboard');
    }

    /**
     * Display the user profile view.
     *
     * @return \Illuminate\View\View
     */
    public function profile()
    {
        return view('user.profile.view');
    }

    /**
     * Update the user profile information.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProfile(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => ['required', 'max:100'],
            'phone' => ['required', 'max:100'],
            'image' => ['image', 'max:2048'],
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            // Delete existing image if exists
            if (File::exists(public_path($user->image))) {
                File::delete(public_path($user->image));
            }

            // Upload and save new image
            $image = $request->image;
            $imageName = rand() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);

            $path = '/uploads/' . $imageName;
            $user->image = $path;
        }

        // Update user profile information
        $user->name = $request->name;
        $user->phone = $request->phone;
        /** @var \App\Models\User $user **/
        $user->save();

        // Display success message
        toastr()->success('Profile has been updated successfully!', 'Congrats');

        return redirect()->back();
    }

    /**
     * Display the user password change view.
     *
     * @return \Illuminate\View\View
     */
    public function updatePassword()
    {
        return view('user.password.view');
    }

    /**
     * Store and update the user password.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storePassword(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'current_password' => 'required',
            'password' => [
                'required',
                'min:8',
                'confirmed',
            ],
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Check if the current password is correct
        if (!Hash::check($request->current_password, $user->password)) {
            toastr()->error('The current password is incorrect.', 'Error');
            return redirect()->back();
        }

        // Check if the new password is different from the current password
        if (Hash::check($request->password, $user->password)) {
            toastr()->error('New password must be different from the current password.', 'Error');
            return redirect()->back();
        }

        // Check if the new password meets the minimum length requirement
        if (strlen($request->password) < 8) {
            toastr()->error('New password must be at least 8 characters long.', 'Error');
            return redirect()->back();
        }

        // Check if the new password and confirmation match
        if ($request->password !== $request->password_confirmation) {
            toastr()->error('New password and confirm password do not match.', 'Error');
            return redirect()->back();
        }

        // Update user password
        $user->password = Hash::make($request->password);

        /** @var \App\Models\User $user **/
        $user->save();

        // Display success message
        toastr()->success('Password updated successfully!', 'Congrats');
        return redirect()->back();
    }
}
