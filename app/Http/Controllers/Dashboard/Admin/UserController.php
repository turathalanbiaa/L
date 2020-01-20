<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Enum\UserType;
use App\Http\Controllers\Controller;
use App\Http\Repositories\UserRepository;
use App\Models\User;
use function MongoDB\BSON\toJSON;

class UserController extends Controller
{
    protected $userRepository;

    /**
     * UserController constructor.
     * @param UserRepository $userRepository
     * @param Auth $auth
     */
    public function __construct(UserRepository $userRepository, Auth $auth)
    {
        $auth->check();
        $auth->hasRole("User");
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $type = request()->input("type");
        $users = $this->userRepository->getUsersByType($type, ['id', 'name', 'email', 'phone', 'stage', 'state']);

        return view("dashboard.admin.user.index")->with([
            "type"  => $type,
            "users" => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        dd("create new user");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        if (request()->input('simple'))
            return response()->json([
                'state' => true,
                'user' => $user
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
