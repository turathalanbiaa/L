<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\Controller;
use App\Http\Repositories\AdminRepository;
use App\Models\Admin;
use App\Models\AdminRole;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Cookie;

class Auth extends Controller
{
    public static function check()
    {
        if (!Cookie::has("ETA-Admin") && !session()->has("eta.admin.token"))
            abort(302, '', ['Location' => "/admin"]);

        if (Cookie::has("ETA-Admin") && !session()->has("eta.admin.token")) {
            $adminRepository = new AdminRepository();
            $admin = $adminRepository->getAdminByCookie();

            if ($admin)
                $adminRepository->generateSession($admin);
            else {
                $adminRepository->removeCookie();
                abort(302, '', ['Location' => "/admin"]);
            }
        }
    }

    public static function hasRole($role) {
        $roles = session()->get("eta.admin.roles");
        if (!in_array($role, $roles))
            abort(403, __('auth.error-message'));
    }
}
