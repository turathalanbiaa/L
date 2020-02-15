<?php


namespace App\Http\Interfaces;


use App\Models\User;

interface UserRepositoryInterface
{
    public function getUsersByType($type, $columns = array());

    public function getUserById($id);

    public function store($data);

    public function update($id, $data);

    public function getDocuments(User $user);
}
