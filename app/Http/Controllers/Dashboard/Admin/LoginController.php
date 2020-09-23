<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Admin\LoginRequest;
use App\Models\Admin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    /**
     * Login the admin.
     *
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function login(LoginRequest $request)
    {
        $admin = Admin::where(["username" => $request->input("username"), "password" => md5($request->input("password"))])
            ->first();

        if (!$admin)
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(["login-failed" => __("dashboard-admin/login.failed-message")]);

        self::generateSession($admin);
        self::generateCookie($admin);
        return redirect()->route("dashboard.admin");
    }

    /**
     * Generate session for the admin.
     *
     * @param Admin $admin
     */
    public static function generateSession(Admin $admin) {
        self::updateLoginDate($admin);
        session()->put("eta.admin.lang", app()->getLocale());
        session()->put("eta.admin.token", $admin->token);
        session()->put("eta.admin.roles", $admin->roles
            ->pluck("name")
            ->toArray()
        );
        session()->save();
    }

    /**
     * Update login date for the admin.
     *
     * @param Admin $admin
     */
    public static function updateLoginDate(Admin $admin)
    {
        if (is_null($admin->token))
            $admin->token = hash_hmac("sha256",md5(microtime(true).mt_Rand()),bcrypt($admin->email));
        $admin->last_login = date("Y-m-d H:i:s");
        $admin->save();
    }

    /**
     * Generate cookie for the admin.
     *
     * @param Admin $admin
     */
    public static function generateCookie(Admin $admin) {
        Cookie::queue(cookie()->forever("ETA-Admin", $admin->token));
    }
}
