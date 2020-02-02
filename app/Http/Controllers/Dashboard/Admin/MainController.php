<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Enum\Language;
use App\Http\Controllers\Controller;
use App\Http\Repositories\AdminRepository;
use App\Http\Requests\AdminLoginRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cookie;
use Illuminate\View\View;
use PeterColes\Countries\CountriesFacade as Countries;


class MainController extends Controller
{
    protected $adminRepository;

    /**
     * MainController constructor.
     * @param AdminRepository $adminRepository
     */
    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    /**
     * Display the login or admin home page.
     * @return Factory|View
     */
    public function index()
    {
        if (!Cookie::has("ETA-Admin"))
            return view("dashboard.admin.login");

        return view("dashboard.admin.main");
    }

    /**
     * Change the local application language.
     * @return RedirectResponse
     */
    public function changeLanguage()
    {
        $locale = request()->input('locale');
        $languages = Language::getLanguages();

        if (in_array($locale, $languages)) {
            session()->put('eta.admin.lang', $locale);
            session()->save();
        }

        return redirect()->back();
    }

    /**
     * Admin login to the dashboard.
     * @param AdminLoginRequest $adminLoginRequest
     * @return RedirectResponse
     */
    public function login(AdminLoginRequest $adminLoginRequest)
    {
        $username = request()->input('username');
        $password = request()->input('password');
        $admin = $this->adminRepository->getAdmin($username, $password);

        if (!$admin)
            return redirect()
                ->route("dashboard.admin")
                ->withInput()
                ->with(["error" => __('dashboard-admin/login.error-message')]);

        $this->adminRepository->generateSession($admin);
        $this->adminRepository->generateCookie($admin);

        return redirect()->route("dashboard.admin");
    }
}
