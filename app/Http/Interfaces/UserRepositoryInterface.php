<?php


namespace App\Http\Interfaces;


interface UserRepositoryInterface
{
    public function getUsersByType($type, $columns = array());

    public function getUserById($id);

    public function store($data);

    public function update($data);
}
