<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Cookie;
use Illuminate\View\View;

class MainController extends Controller
{
    /**
     * MainController constructor.
     */
    public function __construct()
    {
        $this->middleware("setLocale")->only(["index"]);
    }

    /**
     * Show the admin page or go to the login page.
     *
     * @return Factory|View
     */
    public function index()
    {
        if (!Cookie::has("ETA-Admin"))
            return view("dashboard.admin.login");

        return view("dashboard.admin.main");
    }
}
