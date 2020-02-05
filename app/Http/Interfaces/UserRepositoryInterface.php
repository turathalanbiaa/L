<?php


namespace App\Http\Interfaces;


use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;

interface UserRepositoryInterface
{
    public function getUsersByType($type, $columns = array());

    public function getUserById($id);

    public function store(CreateUserRequest $request);

    public function update(UpdateUserRequest $request, User $user);
}
