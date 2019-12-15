<?php

namespace App\Http\Middleware;

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
        if ($request->has('locale')) {
            session()->put('locale', $request->locale);
        }

        if(session()->has('locale')) {
            app()->setLocale(session('locale'));
        }

        return $next($request);
    }
}
