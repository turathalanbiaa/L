<?php

namespace App\Http\Middleware\Api;

use Closure;
use Illuminate\Http\Request;

class Api
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->header("app_key") != config("app.key"))
            return response()->json(["error" => "App key not found"],401);

        app()->setLocale($request->header("lang"));

        return $next($request);
    }
}
