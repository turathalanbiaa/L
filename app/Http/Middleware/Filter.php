<?php

namespace App\Http\Middleware;

use App\Enum\DocumentType;
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
            case "user-update":
                if (!in_array(request()->input("update"), array("info", "pass")))
                    abort(403, __('dashboard-admin/user.filter.update'));
                break;
            case "document-type":
                if (!is_null(request()->input("type")) && !in_array(request()->input("type"), DocumentType::getTypes()))
                    abort(403, __('dashboard-admin/document.filter.type'));
                break;
        }

        return $next($request);
    }
}
