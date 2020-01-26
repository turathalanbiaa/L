<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;

class DashboardController extends Controller
{
    /**
     * DashboardController constructor.
     */
    public function __construct()
    {
        Auth::check();
        Auth::hasRole('Admin');
    }

    public function index()
    {
        return view("admin-dashboard.main");
    }
}
