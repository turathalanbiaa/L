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
        if ($request->is("admin*"))
            if(session()->has('adminLocale'))
                app()->setLocale(session('adminLocale'));

        return $next($request);
    }
}
