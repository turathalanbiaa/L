<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Str;


class SessionController extends Controller
{
    protected $session_id;
    protected $user_id;
    /**
     * @return mixed
     */

    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */

    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public static function getToken($token)
    {
        return Session()->get('eta.user.token','');
    }

    /**
     * @param mixed $session_id
     */
    public function generateSessionId($user_id)
    {
        $user = User::find($user_id);
        if ($user) {
            $remember_token = $user_id . Str::random(32);
            Session()->put('eta.user.token', $remember_token);
            Session()->save();
            $user->remember_token = $remember_token;
            $user->save();
            return $remember_token;
        }
    }

    public function forgetToken($remember_token): void
    {
        session()->forget($remember_token);
    }


}
