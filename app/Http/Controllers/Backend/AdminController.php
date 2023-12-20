<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }

    public function profile(){
        return view('admin.profile.view');
    }
    public function updateProfile(Request $request){
        $request->validate([
            'name' =>['required','max:100'],
            'phone' =>['required','max:100'],
            'image' =>['image','max:2048']
        ]);

        $user = Auth::user();

        if($request->hasFile('image')){
            if(File::exists(public_path($user->image))){
                File::delete(public_path($user->image));
            }
            $image = $request->image;
            $imageName = rand() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);

            $path = '/uploads/'.$imageName;

            $user->image = $path;
        }

        $user->name = $request->name;
        $user->phone = $request->phone;

        /** @var \App\Models\User $user **/
        $user->save();

        return redirect()->back();
    }
}
