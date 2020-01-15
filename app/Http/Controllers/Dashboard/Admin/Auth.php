<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\AdminRepository;
use Illuminate\Support\Facades\Cookie;

class Auth extends Controller
{
    protected $adminRepository;

    /**
     * Auth constructor.
     * @param AdminRepository $adminRepository
     */
    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    /**
     * Make automatic login to the admin if he has a cookie.
     */
    public function check()
    {
        if (!Cookie::has("ETA-Admin") && !session()->has("eta.admin.token"))
            abort(302, '', ['Location' => "/dashboard/admin"]);

        if (Cookie::has("ETA-Admin") && !session()->has("eta.admin.token")) {
            $admin = $this->adminRepository->getByCookie();

            if ($admin)
                $this->adminRepository->generateSession($admin);
            else {
                $this->adminRepository->removeCookie();
                abort(302, '', ['Location' => "/dashboard/admin"]);
            }
        }
    }

    /**
     * Check the admin has a role.
     * @param $role
     */
    public function hasRole($role) {
        $roles = session()->get("eta.admin.roles");
        if (!in_array($role, $roles))
            abort(403, __('dashboard-admin/auth.error-message'));
    }
}
