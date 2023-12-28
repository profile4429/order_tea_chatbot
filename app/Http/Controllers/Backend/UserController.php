<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function ViewUser()
    {
        $users = User::get();
        return view('backend.viewuser')->with([
            'users'=> $users
        ]);
    }
}
