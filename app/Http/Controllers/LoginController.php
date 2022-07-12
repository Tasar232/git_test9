<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClearLoginAdmin;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public static function login(Request $request)
    {
        $field = [
            'login' => $request->login,
            'password' => $request->password
        ];

        if (Auth::attempt($field)) {
            $user = Auth::user();
            switch ($user->type) {
                case "admin":
                    return redirect(route('admin'));
                    break;
                case "coordinator":
                    return redirect(route('coordinator'));
                    break;
                case "ppe_worker":
                    return redirect(route('ppe_worker'));
                    break;
            }
        }
        return redirect(route('login'));
    }

    public static function login_check()
    {
        if (Auth::check()) {
            $user = Auth::user();
            switch ($user->type) {
                case "admin":
                    return redirect(route('admin'));
                    break;
            }
        }
        return view('auth_my.login');
    }


    public static function logout()
    {
        Auth::logout();
    }
}
