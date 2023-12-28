<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\User_Admin;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function ViewLogin()
    {
        return view('backend.viewlogin');
    }
    public function Login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $count = User_Admin::where('username',$username)->where('password',$password)->count();
        
        $role = User_Admin::where('username',$username)->pluck('role_id');

    
        if($count >0){
            session()->put('ss_username', $username);
            session()->put('ss_role',$role);
            return view('backend.home');
        }else{
            return redirect()->route('ViewLogin')->with('false','Sai tên đăng nhập hoặc mật khẩu');
        }
       
    }
    public function logout(Request $request)
    {
        session()->forget('ss_username');
        session()->forget('ss_role');

        return view('backend.viewlogin');
    }
}
