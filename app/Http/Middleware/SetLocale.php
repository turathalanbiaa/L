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
        if(session()->has('locale'))
            app()->setLocale(session('locale'));

        return $next($request);
    }
}
