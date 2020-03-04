<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;

class MainController extends Controller
{
    /**
     * MainController constructor.
     */
    public function __construct()
    {
        $this->middleware('setLocale')->only('index');
    }

    /**
     * Show the admin page or go to the login page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if (!Cookie::has("ETA-Admin"))
            return view("dashboard.admin.login");

        return view("dashboard.admin.main");
    }
}
