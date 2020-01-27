<?php


namespace App\Http\Interfaces;


use App\Http\Requests\CreateUserRequest;

interface UserRepositoryInterface
{
    public function getUsersByType($type, $columns = array());

    public function getUserById($id);

    public function store(CreateUserRequest $request);
}
