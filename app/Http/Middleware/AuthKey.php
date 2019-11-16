<?php

namespace App\Http\Middleware;

use Closure;
use PhpParser\Node\Stmt\If_;

class AuthKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->header('APP_KEY')!=env('APP_KEY')){
           return response()->json(['error'=>'App key not found'],401);
        }
        return $next($request);
    }
}
