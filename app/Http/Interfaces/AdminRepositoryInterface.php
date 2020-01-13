<?php


namespace App\Http\Interfaces;


use App\Models\Admin;

interface AdminRepositoryInterface
{
    public function get($username, $password);

    public function updateLoginDate(Admin $admin);

    public function generateSession(Admin $admin);

    public function generateCookie(Admin $admin);

    public function getByCookie();

    public function removeCookie();
}
