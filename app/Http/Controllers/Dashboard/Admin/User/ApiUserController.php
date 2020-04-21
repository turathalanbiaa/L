<?php

namespace App\Http\Controllers\Dashboard\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Dashboard\ApiResponseTrait;
use App\Models\User;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;
use Throwable;

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
        $user = self::getUser();
        $view = view("dashboard.admin.user.components.modal-show", compact("user"))->render();
        return $this->apiResponse(["html" => $view]);
    }

    /**
     * Display Modal Remove.
     *
     * @return ResponseFactory|Response
     * @throws Throwable
     */
    public function destroy()
    {
        $user = self::getUser();
        $view = view("dashboard.admin.user.components.modal-delete", compact("user"))->render();
        return $this->apiResponse(["html" => $view]);
    }

    /**
     * Get the specified user from storage.
     *
     * @return mixed
     */
    public static function getUser() {
        return User::where("id", request()->input("user"))
            ->where("lang", app()->getLocale())
            ->first();
    }
}
