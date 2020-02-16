<?php

namespace App\Http\Controllers\Dashboard\Admin\User;

use App\Enum\Certificate;
use App\Enum\Gender;
use App\Enum\Stage;
use App\Enum\UserState;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Dashboard\Admin\Auth;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use PeterColes\Countries\CountriesFacade as Countries;

class UserController extends Controller
{
    public function __construct(Auth $auth)
    {
        $auth->check();
        $auth->hasRole("User");
        $this->middleware('filter:user-type')->only(['index', 'create', 'store']);
        $this->middleware('filter:user-update')->only(['update']);
    }

    public function index()
    {
        $type = request()->input("type");
        $users = User::where('type', $type)
                ->where('lang', app()->getLocale())
                ->orderBy('id')
                ->get(['id', 'name', 'email', 'phone', 'state']);

        return view("dashboard.admin.user.index")->with([
            "type" => $type,
            "users" => $users
        ]);
    }

    public function create()
    {
        return view("dashboard.admin.user.create")->with([
            "type"         => request()->input("type"),
            "stages"       => Stage::getStages(),
            "genders"      => Gender::getGenders(),
            "countries"    => Countries::lookup(app()->getLocale()),
            "certificates" => Certificate::getCertificates()
        ]);
    }

    public function store(CreateUserRequest $request)
    {
        $user = User::create([
            "name"           => $request->input('name'),
            "type"           => $request->input('type'),
            "lang"           => app()->getLocale(),
            "stage"          => $request->input('stage', null),
            "email"          => $request->input('email'),
            "phone"          => $request->input('phone'),
            "password"       => md5($request->input('password')),
            "gender"         => $request->input('gender'),
            "country"        => $request->input('country'),
            "birth_date"     => $request->input('birth_date', null),
            "address"        => $request->input('address', null),
            "certificate"    => $request->input('certificate', null),
            "created_at"     => date("Y-m-d"),
            "last_login"     => null,
            "state"          => UserState::UNTRUSTED,
            "remember_token" => null
        ]);

        if (!$user)
            return redirect()
                ->back()
                ->with([
                    "message" => __("dashboard-admin/user.store.failed"),
                    "type" => "warning"
                ]);
        else
            return redirect()
                ->back()
                ->with([
                    "message" => __("dashboard-admin/user.store.success"),
                    "type" => "success"
                ]);
    }

    public function show(User $user)
    {
        return view("dashboard.admin.user.show")->with([
            "user"      => $user,
            "documents" => $user->documents
        ]);
    }

    public function edit(User $user)
    {
        if ($user->lang != app()->getLocale())
            return abort(404);

        return view("dashboard.admin.user.edit")->with([
            "user"         => $user,
            "stages"       => Stage::getStages(),
            "genders"      => Gender::getGenders(),
            "countries"    => Countries::lookup(app()->getLocale()),
            "certificates" => Certificate::getCertificates()
        ]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        switch ($request->input('update')) {
            case "info":
                $data = [
                    "name"        => $request->input("name"),
                    "stage"       => $request->input("stage", null),
                    "email"       => $request->input("email"),
                    "phone"       => $request->input("phone"),
                    "gender"      => $request->input("gender"),
                    "country"     => $request->input("country"),
                    "birth_date"  => $request->input("birth_date", null),
                    "address"     => $request->input("address", null),
                    "certificate" => $request->input("certificate", null),
                ];
                break;
            case "pass":
                $data = [
                    "password" => md5($request->input('password'))
                ];
                break;
            default: $data = array();
        }

        $state = User::where("id", $user->id)->update($data);

        if ($state == false)
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    "message" => __("dashboard-admin/user.update.failed"),
                    "type" => "warning"
                ]);
        else
            return redirect()
                ->back()
                ->with([
                    "message" => __("dashboard-admin/user.update.success"),
                    "type" => "success"
                ]);
    }
}
