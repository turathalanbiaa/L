<?php

namespace App\Http\Controllers\AdminDashboard;

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
            return view("admin-dashboard.login");

        return redirect()->route("adminDashboard");
    }

    public function changeLanguage()
    {
        $locale = request()->input('locale');
        if (array_key_exists($locale, Language::LANGUAGES)) {
            session()->put('admin.lang', $locale);
            session()->save();
        }

        return redirect()->back();
    }

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
