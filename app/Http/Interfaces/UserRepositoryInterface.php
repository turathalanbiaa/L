<?php


namespace App\Http\Interfaces;


interface UserRepositoryInterface
{
    public function getAllUsersByType($type);

    public function getUserById($id);

    public function store();
}
