<?php

namespace Website\Http\Controllers;

use App\Http\Controllers\Controller;
use Website\Http\Interfaces\UserRepositoryInterface;
use Website\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function login(LoginRequest $request, UserRepositoryInterface $userRepository)
    {
        $user = $userRepository->getUser($request->username, $request->password);

        if (!$user)
            return redirect("/")
                ->withInput()
                ->with(["error" => "اسم المستخدم اوكلمة المرور خطا"]);

        if ($request->rememberMe) {
            $user = $userRepository->generateToken($user);
            $userRepository->generateCookie($user);
        }

        $userRepository->generateSession($user);

        return redirect("/");
    }
}
