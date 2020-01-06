<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\Controller;
use App\Http\Repositories\AdminRepository;
use App\Http\Requests\AdminLoginRequest;
use Illuminate\Support\Facades\Request;

class LoginController extends Controller
{
    public function login(AdminLoginRequest $adminLoginRequest, AdminRepository $adminRepository)
    {
        $username = Request::input('username');
        $password = Request::input('password');
        $rememberMe = Request::input('rememberMe');

        $admin = $adminRepository->getAdmin($username, $password);

        if (!$admin)
            return redirect()->route("adminIndex")
                ->withInput()
                ->with(["error" => __('login.error-message')]);

        if ($rememberMe) {
            $admin = $adminRepository->generateToken($admin);
            $adminRepository->generateCookie($admin);
        }

        $adminRepository->generateSession($admin);

        return redirect()->route("adminDashboard");
    }
}
