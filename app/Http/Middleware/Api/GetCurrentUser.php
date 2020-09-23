<?php

namespace App\Http\Middleware\Api;

use App\Enum\UserState;
use App\Http\Controllers\Api\ResponseTrait;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class GetCurrentUser
{
    use ResponseTrait;
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = User::where("token", $request->header("token"))->first();

        if (!$user)
            return $this->simpleResponseWithMessage(false, __("api/api.middleware.get-current-user.user-not-found"));

        if ($user->state == UserState::DISABLE)
            return $this->simpleResponseWithMessage(false, "user is blocked");

        $request->request->add(["user" => $user]);

        return $next($request);
    }
}
