<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Enum\Language;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index()
    {
        return view("admin-dashboard.login");
    }

    public function changeLanguage()
    {
        $locale = request()->input('locale');
        if (array_key_exists($locale, Language::LANGUAGES))
            session()->put('adminLocale', $locale);

        return redirect()->back();
    }

    public function dashboard()
    {

    }
}
