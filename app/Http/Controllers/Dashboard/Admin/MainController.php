<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Enum\Language;
use App\Http\Controllers\Controller;
use App\Http\Repositories\AdminRepository;
use App\Http\Requests\AdminLoginRequest;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Request;


class MainController extends Controller
{
    public function index()
    {
        if (!Cookie::has("ETA-Admin"))
            return view("dashboard.admin.login");

        return view("dashboard.admin.main");
    }

    public function changeLanguage()
    {
        $locale = request()->input('locale');
        if (array_key_exists($locale, Language::LANGUAGES)) {
            session()->put('eta.admin.lang', $locale);
            session()->save();
        }

        return redirect()->back();
    }

    public function login(AdminLoginRequest $adminLoginRequest, AdminRepository $adminRepository)
    {
        $username = Request::input('username');
        $password = Request::input('password');
        $rememberMe = Request::input('rememberMe');

        $admin = $adminRepository->get($username, $password);

        if (!$admin)
            return redirect()->route("dashboard.admin")
                ->withInput()
                ->with(["error" => __('dashboard-admin/login.error-message')]);

        $adminRepository->generateSession($admin);
        $adminRepository->generateCookie($admin);

        return redirect()->route("dashboard.admin");
    }
}
