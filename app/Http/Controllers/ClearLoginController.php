<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\ClearLoginUser;
use App\Models\User;
use App\Models\Admin;
use App\Models\Coordinator;
use App\Models\Ppe_worker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ClearLoginController extends Controller
{
    public static function debug()
    {
        $user = new User;
        $user->type = 'ppe_worker';
        $user->login = 'user_1';
        $user->password = 123;
        $user->save();

        $admin = new Ppe_worker;
        $admin->id = $user->id;
        $admin->surname = 'Пилипенко';
        $admin->name = 'Михаил';
        $admin->second_name = 'Михайлович';
        $admin->save();
    }

    public static function updateUser()
    {
        $max_updated = User::max('updated_at');
        $max_created = User::max('created_at');
        if ($max_created  == null) {
            $max_created = 0;
            $max_updated = 0;
        }
        $clear_login_created = ClearLoginUser::where([
            ['created_at', '>', $max_created],
            ['type', '=', 'admin']
            ])->get();
        $clear_login_updated = ClearLoginUser::where([
            ['updated_at', '>', $max_updated],
            ['type', '=', 'admin']
            ])->get();

        foreach ($clear_login_created as $user_create) {
            $user = new User;
            $user->type = 'admin';
            $user->login = $user_create->login;
            $user->password = $user_create->password;
            $user->created_at = $user_create->created_at;
            $user->updated_at = $user_create->updated_at;
            $user->save();

            $admin = new Admin;
            $admin->id = $user->id;
            $admin->surname = $user_create->surname;
            $admin->name = $user_create->name;
            $admin->second_name = $user_create->second_name;
            $admin->save();
        }

        foreach ($clear_login_updated as $user_update) {
            User::where('login', $user_update->login)
                ->update([
                    'login' => $user_update->login,
                    'password' => Hash::make($user_update->password),
                    // 'surname' => $user_update->surname,
                    // 'name' => $user_update->name,
                    // 'second_name' => $user_update->second_name
                ]);
        }
    }
}
