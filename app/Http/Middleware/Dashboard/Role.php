<?php

namespace App\Http\Middleware\Dashboard;

use Closure;
use Illuminate\Http\Request;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        //For admin
        if (request()->is("dashboard/admin*"))
        {
            $roles = session()->get("eta.admin.roles");
            if (!in_array($role, $roles))
                abort(403, __("dashboard-admin/middleware.auth"));
        }

        return $next($request);
    }
}
