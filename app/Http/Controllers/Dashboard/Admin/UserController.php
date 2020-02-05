<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Enum\Certificate;
use App\Enum\Gender;
use App\Enum\Stage;
use App\Enum\UserState;
use App\Http\Controllers\Controller;
use App\Http\Repositories\UserRepository;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use PeterColes\Countries\CountriesFacade as Countries;

class UserController extends Controller
{
    protected $userRepository;

    /**
     * UserController constructor.
     *
     * @param UserRepository $userRepository
     * @param Auth $auth
     */
    public function __construct(UserRepository $userRepository, Auth $auth)
    {
        $auth->check();
        $auth->hasRole("User");
        $this->userRepository = $userRepository;
        $this->middleware('filter:user-type')->only(['index', 'create', 'store']);
        $this->middleware('filter:user-update')->only(['update']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $type = request()->input("type");

        return view("dashboard.admin.user.index")->with([
            "type" => $type,
            "users" => $this->userRepository->getUsersByType($type, ['id', 'name', 'email', 'phone', 'state'])
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
     * @return RedirectResponse|Redirector
     */
    public function store(CreateUserRequest $request)
    {
        $user = $this->userRepository->store($request);

        if (!$user)
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    "message" => __("dashboard-admin/user.create.failed"),
                    "type" => "warning"
                ]);

        return redirect()
            ->back()
            ->with([
                "message" => __("dashboard-admin/user.create.success"),
                "type" => "success"
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return void
     */
    public function show(User $user)
    {


        dd("gtuyhui");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Factory|View
     */
    public function edit(User $user)
    {
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
     * @return void
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $this->userRepository->update($request, $user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return Response
     */
    public function destroy(User $user)
    {
        //
    }

    /**
     * Display the user info.
     *
     * @return JsonResponse
     */
    public function simpleShow()
    {
        $id = base64_decode(request()->input('content'));
        $user = $this->userRepository->getUserById($id);

        if ($user)
        {
            $state = true;
            $collect = [
                "name" => [
                    "value" => $user->name,
                    "text"  => __('dashboard-admin/user.column.name')
                ],
                "stage" => [
                    "value" => is_null($user->stage)?
                        __('dashboard-admin/user.column.null'):
                        Stage::getStageName($user->stage),
                    "text"  => __('dashboard-admin/user.column.stage')
                ],
                "email" => [
                    "value" => $user->email,
                    "text"  => __('dashboard-admin/user.column.email')
                ],
                "phone" => [
                    "value" => $user->phone,
                    "text"  => __('dashboard-admin/user.column.phone')
                ],
                "gender" => [
                    "value" => Gender::getGenderName($user->gender),
                    "text"  => __('dashboard-admin/user.column.gender')
                ],
                "country" => [
                    "value" => Countries::getValue(app()->getLocale(), $user->country),
                    "text"  => __('dashboard-admin/user.column.country')
                ],
                "birth_date" => [
                    "value" => is_null($user->birth_date)?
                        __('dashboard-admin/user.column.null'):
                        $user->birth_date,
                    "text"  => __('dashboard-admin/user.column.birth_date')
                ],
                "address" => [
                    "value" => is_null($user->address)?
                        __('dashboard-admin/user.column.null'):
                        $user->address,
                    "text"  => __('dashboard-admin/user.column.address')
                ],
                "certificate" => [
                    "value" => is_null($user->certificate)?
                        __('dashboard-admin/user.column.null'):
                        Certificate::getCertificateName($user->certificate),
                    "text"  => __('dashboard-admin/user.column.certificate')
                ],
                "created_at" => [
                    "value" => $user->created_at,
                    "text"  => __('dashboard-admin/user.column.created_at')
                ],
                "last_login" => [
                    "value" => is_null($user->last_login)?
                        __('dashboard-admin/user.column.last_login_null'):
                        $user->last_login,
                    "text"  => __('dashboard-admin/user.column.last_login')
                ],
                "state" => [
                    "value" => UserState::getStateName($user->state),
                    "text"  => __('dashboard-admin/user.column.state')
                ]
            ];
        }

        return response()->json([
            'state' => $state ?? false,
            'user' => $collect ?? null,
            'message' => __('dashboard-admin/user.index.modal.simple-show.message')
        ]);
    }
}
