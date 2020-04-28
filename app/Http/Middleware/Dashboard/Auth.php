<?php

namespace App\Http\Middleware\Dashboard;

use App\Http\Controllers\Dashboard\Admin\LoginController;
use App\Http\Controllers\Dashboard\Admin\LogoutController;
use App\Models\Admin;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class Auth
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //For admin
        if (request()->is("dashboard/admin*"))
        {
            if (!Cookie::has("ETA-Admin") && !session()->has("eta.admin.token"))
                abort(302, "", ["Location" => "/dashboard/admin"]);

            if (Cookie::has("ETA-Admin") && !session()->has("eta.admin.token")) {
                $admin = Admin::where("remember_token", Cookie::get("ETA-Admin"))->first();

                if ($admin)
                    LoginController::generateSession($admin);
                else {
                    LogoutController::removeCookie();
                    abort(302, "", ["Location" => "/dashboard/admin"]);
                }
            }
        }

        return $next($request);
    }
}
