<?php

namespace App\Http\Middleware\Api;

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
        app()->setLocale($request->header('LANG'));
        return $next($request);
    }
}
