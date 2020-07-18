<?php

namespace App\Http\Middleware\Api;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class GetCurrentUser
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
        $user = User::where("token", $request->header('token'))->first();

        $request->request->add(['user' => $user]);

        return response()->json($request->user);

        return $next($request);
    }
}
