<?php


namespace App\Http\Repositories;

use App\Enum\UserState;
use App\Enum\UserType;
use App\Http\Interfaces\UserRepositoryInterface;
use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserRepository implements UserRepositoryInterface
{
    private $user;

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

    public function getUserById($id)
    {
        // TODO: Implement getUserById() method.
        $user = $this->user
            ->where('id', $id)
            ->where('lang', app()->getLocale())
            ->first();

        return $user;
    }

    public function store(CreateUserRequest $request)
    {
        // TODO: Implement store() method.
        $type = $request->input('type');

        $this->user->name           = $request->input('name');
        $this->user->type           = $request->input('type');
        $this->user->lang           = app()->getLocale();
        $this->user->stage          = ($type == UserType::STUDENT)? $request->input('stage'):null;
        $this->user->email          = $request->input('email');
        $this->user->phone          = $request->input('phone');
        $this->user->password       = $request->input('password');
        $this->user->gender         = $request->input('gender');
        $this->user->country        = $request->input('country');
        $this->user->image          = "user/default.png";
        $this->user->birth_date     = ($type == UserType::STUDENT)? $request->input('birth_date'):null;
        $this->user->address        = ($type == UserType::STUDENT)? $request->input('address'):null;
        $this->user->certificate    = ($type == UserType::STUDENT)? $request->input('certificate'):null;
        $this->user->created_at     = date("Y-m-d");
        $this->user->last_login     = null;
        $this->user->state          = UserState::UNTRUSTED;
        $this->user->remember_token = null;
        $this->user->save();

        return $this->user;
    }
}
