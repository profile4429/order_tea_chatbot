<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function ViewHomeAdmin()
    {
        $user = Auth::user();

        return view('backend.home')->with([
            'user'=>$user,
        ]);
    }
}
