<?php

namespace App\Http\Controllers\Dashboard\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Dashboard\ApiResponseTrait;
use App\Models\User;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;

class ApiUserController extends Controller
{
    use ApiResponseTrait;

    /**
     * Display the specified user.
     *
     * @return ResponseFactory|Response
     * @throws \Throwable
     */
    public function show()
    {
        $user = User::where("id", request()->input('user'))
            ->where("lang", app()->getLocale())
            ->first();

        $view = view("dashboard.admin.user.components.modal-show", compact("user"))->render();
        return $this->apiResponse(["html" => $view]);
    }
}
