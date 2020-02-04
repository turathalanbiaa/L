<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Enum\Language;
use App\Http\Controllers\Controller;
use App\Http\Repositories\AdminRepository;
use App\Http\Requests\LoginRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cookie;
use Illuminate\View\View;


class MainController extends Controller
{
    protected $adminRepository;

    /**
     * MainController constructor.
     *
     * @param AdminRepository $adminRepository
     */
    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
        $this->middleware('setLocale')->only('index');
    }


    /**
     * Display the login or admin home page.
     *
     * @return Factory|View
     */
    public function index()
    {
        if (!Cookie::has("ETA-Admin"))
            return view("dashboard.admin.login");

        return view("dashboard.admin.main");
    }

    /**
     * Login.
     *
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function login(LoginRequest $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

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
