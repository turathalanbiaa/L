<?php


namespace App\Http\Repositories;


use App\Http\Interfaces\AdminRepositoryInterface;
use App\Models\Admin;

class AdminRepository implements AdminRepositoryInterface
{

    public function getAdmin($username, $password)
    {
        // TODO: Implement getAdmin() method.
        $admin = Admin::where('username', $username)
            ->where('password', md5($password))
            ->first();

        return $admin;
    }

    public function generateToken()
    {
        // TODO: Implement generateToken() method.
    }

    public function generateSession()
    {
        // TODO: Implement generateSession() method.
    }

    public function generateCookie()
    {
        // TODO: Implement generateCookie() method.
    }
}
