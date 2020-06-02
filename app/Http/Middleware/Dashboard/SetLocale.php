<?php

namespace App\Http\Middleware\Dashboard;

use App\Enum\Language;
use Closure;

class SetLocale
{

    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     */

    public function handle($request, Closure $next)
    {
        //For admin
        if (request()->is("dashboard/admin*")) {
            $locale = request()->input("locale");
            if (in_array($locale, Language::getLanguages())) {
                session()->put("eta.admin.lang", $locale);
                session()->save();
            }

            if (session()->has("eta.admin.lang"))
                app()->setLocale(session()->get("eta.admin.lang"));
        }

        return $next($request);
    }
}
