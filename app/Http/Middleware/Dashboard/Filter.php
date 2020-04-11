<?php

namespace App\Http\Middleware\Dashboard;

use App\Enum\AnnouncementType;
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
        //For admin
        if (request()->is("dashboard/admin*"))
        {
            switch ($parameter) {
                case "user-type":
                    if (!in_array(request()->input("type"), UserType::getTypes()))
                        abort(403, __("dashboard-admin/middleware.filter.user-type"));
                    break;
                case "user-update":
                    if (!in_array(request()->input("update"), array("info", "pass")))
                        abort(403, __("dashboard-admin/middleware.filter.user-update"));
                    break;
                case "document-type":
                    if (!is_null(request()->input("type")) && !in_array(request()->input("type"), DocumentType::getTypes()))
                        abort(403, __("dashboard-admin/middleware.filter.document-type"));
                    break;
                case "announcement-type":
                    if (!is_null(request()->input("type")) && !in_array(request()->input("type"), AnnouncementType::getTypes()))
                        abort(403, __("dashboard-admin/middleware.filter.announcement-type"));
                    break;
                case "announcement-update":
                    if (!in_array(request()->input("update"), array("info", "image")))
                        abort(403, __("dashboard-admin/middleware.filter.announcement-update"));
                    break;
            }
        }

        return $next($request);
    }
}
