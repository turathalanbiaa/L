<?php


namespace App\Http\Repositories;


use App\Enum\UserType;
use App\Http\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    private $user;
    private $lang;

    public function __construct(User $user)
    {
        $this->lang = app()->getLocale();
        $this->user = $user;
    }

    public function getUsersByType($type)
    {
        // TODO: Implement getUsersByType() method.
        $users = $this->user
            ->where('type', $type)
            ->where('lang', $this->lang)
            ->orderBy('id')
            ->get();

        return $users;
    }

    public function getUserById($id)
    {
        // TODO: Implement getUserById() method.
        $user = $this->user
            ->where('id', $id)
            ->where('lang', $this->lang)
            ->get();

        return $user;
    }

    public function store()
    {
        // TODO: Implement store() method.

    }
}
