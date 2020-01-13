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
        if ($request->has('locale')) {
            if (array_key_exists($request->locale, Language::LANGUAGES))
                session()->put('locale', $request->locale);
        }

        if(session()->has('locale')) {
            app()->setLocale(session('locale'));
        }

        return $next($request);
    }
}
