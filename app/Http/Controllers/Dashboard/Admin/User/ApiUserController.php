<?php

namespace App\Http\Controllers\Dashboard\Admin\User;

use App\Enum\Certificate;
use App\Enum\Gender;
use App\Enum\Stage;
use App\Enum\UserState;
use App\Http\Controllers\Controller;
use App\Http\Repositories\UserRepository;
use Illuminate\Http\JsonResponse;
use PeterColes\Countries\CountriesFacade as Countries;

class ApiUserController extends Controller
{
    protected $userRepository;

    /**
     * ApiUserController constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Display the specified user.
     *
     * @return JsonResponse
     */
    public function info()
    {
        $id = base64_decode(request()->input('content'));
        $user = $this->userRepository->getUserById($id);

        if ($user)
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

        return response()->json([
            'state'   => ($user)? true:false,
            'user'    => $collect ?? null,
            'message' => __('dashboard-admin/user.index.modal-info.message')
        ]);
    }
}
