<?php


namespace App\Http\Repositories;

use App\Http\Interfaces\UserRepositoryInterface;
use App\Models\User;
use phpDocumentor\Reflection\Types\Integer;

class UserRepository implements UserRepositoryInterface
{
    private $user;
    private $lang;

    public function __construct(User $user)
    {
        $this->lang = app()->getLocale();
        $this->user = $user;
    }

    public function getUsersByType($type, $columns = array())
    {
        // TODO: Implement getUsersByType() method.
        $users = is_null($columns)?
            $this->user
                ->where('type', $type)
                ->where('lang', $this->lang)
                ->orderBy('id')
                ->get($columns) :
            $this->user
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
