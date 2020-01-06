<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Enum\Language;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function welcome() {
        return view("admin-dashboard.welcome");
    }

    public function changeLanguage() {
        if (array_key_exists(request()->input('locale'), Language::LANGUAGES))
            session()->put('locale', request()->input('locale'));

        return redirect()->back();
    }

    public function login() {
        dd("login");
    }
}
