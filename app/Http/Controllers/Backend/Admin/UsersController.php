<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function allUsers(){

        $users= User::latest()->get();
        return view('admin.users.all_users',compact('users'));
    }
}
