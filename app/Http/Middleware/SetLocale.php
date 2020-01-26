<?php

namespace App\Http\Middleware;

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
        if ($request->is("admin*"))
            if(session()->has('eta.admin.lang'))
                app()->setLocale(session('eta.admin.lang'));

        return $next($request);
    }
}
