<?php


namespace App\Http\Interfaces;


interface AdminRepositoryInterface
{
    public function getAdmin($username, $password);

    public function generateToken();

    public function generateSession();

    public function generateCookie();
}
