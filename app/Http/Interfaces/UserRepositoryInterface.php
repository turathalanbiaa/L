<?php


namespace App\Http\Interfaces;


interface UserRepositoryInterface
{
    public function getUsersByType($type);

    public function getUserById($id);

    public function store();
}
