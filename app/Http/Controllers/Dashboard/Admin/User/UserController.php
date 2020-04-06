<?php

namespace App\Http\Controllers\Dashboard\Admin\User;

use App\Enum\Certificate;
use App\Enum\Gender;
use App\Enum\Stage;
use App\Enum\UserState;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Admin\CreateUserRequest;
use App\Http\Requests\Dashboard\Admin\UpdateUserRequest;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use PeterColes\Countries\CountriesFacade as Countries;

class UserController extends Controller
{
    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware("dashboard.auth");
        $this->middleware("dashboard.role:User");
        $this->middleware("filter:user-type")->only(["index", "create", "store"]);
        $this->middleware("filter:user-update")->only(["update"]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $type = request()->input("type");
        $users = User::select(["id", "name", "email", "phone", "last_login"])
            ->where("type", $type)
            ->where("lang", app()->getLocale())
            ->latest()
            ->get();

        return view("dashboard.admin.user.index")->with([
            "type" => $type,
            "users" => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
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

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateUserRequest $request
     * @return RedirectResponse
     */
    public function store(CreateUserRequest $request)
    {
        $user = User::create([
            "name"           => $request->input("name"),
            "type"           => $request->input("type"),
            "lang"           => app()->getLocale(),
            "stage"          => $request->input("stage", null),
            "email"          => $request->input("email"),
            "phone"          => $request->input("phone"),
            "password"       => md5($request->input("password")),
            "gender"         => $request->input("gender"),
            "country"        => $request->input("country"),
            "birth_date"     => $request->input("birth_date", null),
            "address"        => $request->input("address", null),
            "certificate"    => $request->input("certificate", null),
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

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return Factory|View
     */
    public function show(User $user)
    {
        self::checkView($user);

        return view("dashboard.admin.user.show")->with([
            "user"      => $user,
            "documents" => $user->documents
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Factory|View
     */
    public function edit(User $user)
    {
        self::checkView($user);

        return view("dashboard.admin.user.edit")->with([
            "user"         => $user,
            "stages"       => Stage::getStages(),
            "genders"      => Gender::getGenders(),
            "countries"    => Countries::lookup(app()->getLocale()),
            "certificates" => Certificate::getCertificates()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        self::checkView($user);

        switch ($request->input("update")) {
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
                    "password" => md5($request->input("password"))
                ];
                break;
            default: $data = array();
        }

        User::where("id", $user->id)->update($data);

        if (!$user)
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

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return RedirectResponse
     */
    public function destroy(User $user) {
        self::checkView($user);
        User::where("id", $user->id)->update([
            "state" => UserState::DISABLE
        ]);

        if (!$user)
            return redirect()
                ->back()
                ->with([
                    "message" => __("dashboard-admin/user.destroy.failed"),
                    "type" => "warning"
                ]);
        else
            return redirect()
                ->back()
                ->with([
                    "message" => __("dashboard-admin/user.destroy.success"),
                    "type" => "success"
                ]);
    }

    /**
     * Check permission to view the specified resource.
     *
     * @param User $user
     */
    public static function checkView(User $user) {
        if ($user->lang != app()->getLocale())
            abort(404);
    }
}
