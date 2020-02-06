<?php


namespace App\Http\Repositories;

use App\Enum\UserState;
use App\Enum\UserType;
use App\Http\Interfaces\UserRepositoryInterface;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserRepository implements UserRepositoryInterface
{
    private $user;

    /**
     * UserRepository constructor.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get users by the type.
     *
     * @param $type
     * @param array $columns
     * @return mixed
     */
    public function getUsersByType($type, $columns = array())
    {
        // TODO: Implement getUsersByType() method.
        $users = is_null($columns)?
            $this->user
                ->where('type', $type)
                ->where('lang', app()->getLocale())
                ->orderBy('id')
                ->get($columns) :
            $this->user
                ->where('type', $type)
                ->where('lang', app()->getLocale())
                ->orderBy('id')
                ->get();

        return $users;
    }

    /**
     * Get the user by id.
     *
     * @param $id
     * @return mixed
     */
    public function getUserById($id)
    {
        // TODO: Implement getUserById() method.
        $user = $this->user
            ->where('id', $id)
            ->where('lang', app()->getLocale())
            ->first();

        return $user;
    }

    /**
     * Save a new user.
     *
     * @param CreateUserRequest $request
     * @return User
     */
    public function store($data)
    {
        // TODO: Implement store() method.
        return $this->user->create($data);
    }


    public function update($data)
    {
        // TODO: Implement update() method.
        return $this->user->where("id", $data["id"])->update($data);
    }
}
