<?php

namespace Website\Http\Interfaces;

use Website\Http\Requests\CreateListenerRequest;
use Website\Http\Requests\CreateStudentRequest;
use Website\Models\User;

interface UserRepositoryInterface
{
    public function storeStudent(CreateStudentRequest $request);

    public function storeListener(CreateListenerRequest $request);

    public function getUser($username, $password);

    public function generateToken(User $user);

    public function generateSession(User $user);

    public function generateCookie(User $user);

    public function getUserByCookie();

    public function removeCookie();
}
