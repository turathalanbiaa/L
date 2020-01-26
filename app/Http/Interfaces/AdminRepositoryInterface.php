<?php


namespace App\Http\Interfaces;


use App\Models\Admin;

interface AdminRepositoryInterface
{
    public function getAdmin($username, $password);

    public function generateSession(Admin $admin);

    public function generateCookie(Admin $admin);

    public function getByCookie();

    public function removeCookie();
}
