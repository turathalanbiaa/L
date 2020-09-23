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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
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
        $this->middleware("filter:user-state")->only(["index", "changeState"]);
        $this->middleware("filter:user-update")->only(["update"]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $type = $request->input("type");
        $state = $request->input("state");

        $users = ($state)
            ? User::select(["id", "name", "email", "phone", "state", "last_login"])
                ->where(["type" => $type, "lang" => app()->getLocale(), "state" => $state])
                ->orderBy("created_at", "desc")
                ->get()
            : User::select(["id", "name", "email", "phone", "state", "last_login"])
                ->where(["type" => $type, "lang" => app()->getLocale()])
                ->orderBy("created_at", "desc")
                ->get();

        return view("dashboard.admin.user.index")->with([
            "type"  => $type,
            "state" => $state,
            "users" => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return Factory|View
     */
    public function create(Request $request)
    {
        return view("dashboard.admin.user.create")->with([
            "type" => $request->input("type")
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
                ->withInput()
                ->with([
                    "message" => __("dashboard-admin/user.store.failed"),
                    "type"    => "warning"
                ]);

        return redirect()
            ->back()
            ->with([
                "message" => __("dashboard-admin/user.store.success"),
                "type"    => "success"
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
            "user" => $user
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
            "user" => $user
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
                    "certificate" => $request->input("certificate", null)
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
                    "type"    => "warning"
                ]);

        return redirect()
            ->back()
            ->with([
                "message" => __("dashboard-admin/user.update.success"),
                "type"    => "success"
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return void
     */
    public function destroy(User $user) {
        abort(404);
    }

    /**
     * Change state for the specified resource in storage.
     *
     * @return RedirectResponse
     */
    public function changeState() {
        $user = User::findorFail(request()->input("id"));
        self::checkView($user);
        $user->state = ((integer)request()->input("state") == UserState::DISABLE)
            ? UserState::DISABLE
            : UserState::UNTRUSTED;
        $user->save();

        if (!$user)
            return redirect()
                ->back()
                ->with([
                    "message" => __("dashboard-admin/user.change-state.failed-$user->state"),
                    "type"    => "warning"
                ]);

        return redirect()
            ->back()
            ->with([
                "message" => __("dashboard-admin/user.change-state.success-$user->state"),
                "type"    => "success"
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
