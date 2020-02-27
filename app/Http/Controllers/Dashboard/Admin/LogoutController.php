<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;

class LogoutController extends Controller
{
    public static function removeCookie()
    {
        Cookie::queue(cookie()->forget("ETA-Admin"));
    }
}
