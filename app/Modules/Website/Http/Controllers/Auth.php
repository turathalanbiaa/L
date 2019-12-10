<?php


namespace Website\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Website\Http\Interfaces\UserRepositoryInterface;
use Website\Http\Repositories\UserRepository;

class Auth extends Controller
{
    public static function check()
    {
        self::ifHasCookieMakeSession();
        self::isLoggedIn();
    }

    private static function ifHasCookieMakeSession()
    {
        if (Cookie::has("ETA") && !session()->has("eta"))
        {
            $user = null;
            $userRepository = new UserRepository();
            $user = $userRepository->getUserByCookie();

            if ($user)
                $userRepository->generateSession($user);
            else
            {
                $userRepository->removeCookie();
                abort(302, '', ['Location' => "/"]);
            }
        }
    }

    private static function isLoggedIn()
    {
        if (!Cookie::has("ETA") && !session()->has("eta"))
        {
            if(request()->is("create-student-account") || request()->is("create-listener-account"))
                return "";
            else
                abort(302, '', ['Location' => "/"]);
        }


    }
}
