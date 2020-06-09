<?php

namespace App\Http\Middleware\Api;

use Closure;
use Illuminate\Http\Request;

class AuthKey
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
        if($request->header('APP_KEY')!=config("app.key")){
           return response()->json(['error'=>'App key not found'],401);
        }
        return $next($request);
    }
}
