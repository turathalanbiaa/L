<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;


class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware('setLocale')->only('index');
    }

    public function index()
    {
        if (!Cookie::has("ETA-Admin"))
            return view("dashboard.admin.login");

        return view("dashboard.admin.main");
    }
}
