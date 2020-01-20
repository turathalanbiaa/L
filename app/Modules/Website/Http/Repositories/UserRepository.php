<?php

namespace Website\Http\Repositories;

use App\Enum\Stage;
use App\Enum\UserType;
use App\Enum\UserState;
use Illuminate\Support\Facades\Cookie;
use Website\Http\Interfaces\UserRepositoryInterface;
use Website\Http\Requests\CreateListenerRequest;
use Website\Http\Requests\CreateStudentRequest;
use Website\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function storeStudent(CreateStudentRequest $request)
    {
        $student = new User();
        $student->name = $request->name;
        $student->type = UserType::STUDENT;
        $student->lang = app()->getLocale();
        $student->level = Stage::BEGINNER;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->password = md5($request->password);
        $student->gender = $request->gender;
        $student->country = $request->country;
        $student->image = null;
        $student->birthdate = $request->birthdate;
        $student->address = $request->address;
        $student->scientific_degree = $request->scientific_degree;
        $student->register_date = date("Y-m-d");
        $student->last_login_date = date("Y-m-d");
        $student->verify_state = UserState::NOT_ACTIVE;
        $student->remember_token = hash_hmac("sha256",md5(microtime(true).mt_Rand()),bcrypt($request->email));
        $student->save();

        return $student;
    }

    public function storeListener(CreateListenerRequest $request)
    {
        $listener = new User();
        $listener->name = $request->name;
        $listener->type = UserType::LISTENER;
        $listener->lang = app()->getLocale();
        $listener->level = null;
        $listener->email = $request->email;
        $listener->phone = $request->phone;
        $listener->password = md5($request->password);
        $listener->gender = $request->gender;
        $listener->country = $request->country;
        $listener->image = null;
        $listener->birthdate = null;
        $listener->address = null;
        $listener->scientific_degree = null;
        $listener->register_date = date("Y-m-d");
        $listener->last_login_date = date("Y-m-d");
        $listener->verify_state = UserState::NOT_ACTIVE;
        $listener->remember_token = hash_hmac("sha256",md5(microtime(true).mt_Rand()),bcrypt($request->email));
        $listener->save();

        return $listener;
    }

    public function getUser($username, $password)
    {
        $user = null;

        // Where Username is phone
        if (is_numeric($username))
            $user = User::where("phone", $username)
                ->where("password", $password)
                ->first();

        // Where Username is email
        if (filter_var($username, FILTER_VALIDATE_EMAIL))
            $user = User::where("email", $username)
                ->where("password", md5($password))
                ->first();

        return $user;
    }

    public function generateToken(User $user)
    {
        if (is_null($user->remember_token)) {
            $user->remember_token = hash_hmac("sha256",md5(microtime(true).mt_Rand()),bcrypt($user->email));
            $user->save();
        }

        return $user;
    }

    public function generateSession(User $user)
    {
        session()->put('eta', $user->remember_token);
        session()->put('user.name', $user->name);
        session()->put('user.type', $user->type);
        session()->put('user.type', $user->lang);
        session()->put('user.level', $user->level);
        session()->put('user.email', $user->email);
        session()->put('user.phone', $user->phone);
        session()->put('user.gender', $user->gender);
        session()->put('user.country', $user->country);
        session()->put('user.birthdate', $user->birthdate);
        session()->put('user.address', $user->address);
        session()->put('user.scientific_degree', $user->scientific_degree);
        session()->save();
    }

    public function generateCookie(User $user)
    {
        Cookie::queue(cookie()->forever("ETA", $user->remember_token));
    }

    public function getUserByCookie()
    {
       $user = User::where("remember_token", Cookie::get("ETA"))
            ->first();

       return $user;
    }

    public function removeCookie()
    {
        Cookie::queue(cookie()->forget("ETA"));
    }
}
