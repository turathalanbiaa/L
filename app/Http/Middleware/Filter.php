<?php

namespace App\Http\Middleware;

use App\Enum\UserType;
use Closure;

class Filter
{
    /**
     * Handle an incoming request.
     * @param $request
     * @param Closure $next
     * @param $parameter
     * @return mixed
     */
    public function handle($request, Closure $next, $parameter)
    {
        switch ($parameter) {
            case "user-type":
                if (!in_array(request()->input("type"), UserType::getTypes()))
                    abort(403, __('dashboard-admin/user.filter.type'));
                break;
            default: return "OK";
        }

        return $next($request);
    }
}
