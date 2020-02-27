<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Admin\LoginRequest;
use App\Models\Admin;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $admin = Admin::where('username', $username)
            ->where('password', md5($password))
            ->first();

        if (!$admin)
            return redirect()
                ->route("dashboard.admin")
                ->withInput()
                ->with(["error" => __('dashboard-admin/login.error-message')]);

        self::generateSession($admin);
        self::generateCookie($admin);

        return redirect()->route("dashboard.admin");
    }

    public static function generateSession(Admin $admin) {
        self::updateLoginDate($admin);
        session()->put('eta.admin.id', $admin->id);
        session()->put('eta.admin.name', $admin->name);
        session()->put('eta.admin.lang', $admin->lang);
        session()->put('eta.admin.username', $admin->username);
        session()->put('eta.admin.token', $admin->remember_token);
        session()->put('eta.admin.roles', $admin->roles
            ->pluck("name")
            ->toArray()
        );
        session()->save();
    }

    public static function updateLoginDate(Admin $admin)
    {
        if (is_null($admin->remember_token))
            $admin->remember_token = hash_hmac("sha256",md5(microtime(true).mt_Rand()),bcrypt($admin->email));
        $admin->last_login = date("Y-m-d");
        $admin->save();
    }

    public static function generateCookie(Admin $admin) {
        Cookie::queue(cookie()->forever("ETA-Admin", $admin->remember_token));
    }
}
