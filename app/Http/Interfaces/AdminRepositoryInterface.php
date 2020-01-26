<?php


namespace App\Http\Interfaces;


use App\Models\Admin;

interface AdminRepositoryInterface
{
    public function getAdmin($username, $password);

    public function generateToken(Admin $admin);

    public function generateSession(Admin $admin);

    public function generateCookie(Admin $admin);

    public function getAdminByCookie();

    public function removeCookie();
}
