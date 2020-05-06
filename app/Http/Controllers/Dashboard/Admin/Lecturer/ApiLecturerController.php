<?php

namespace App\Http\Controllers\Dashboard\Admin\Lecturer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Dashboard\ApiResponseTrait;
use App\Models\Lecturer;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;
use Throwable;

class ApiLecturerController extends Controller
{
    use ApiResponseTrait;

    /**
     * Display the specified lecturer.
     *
     * @return ResponseFactory|Response
     * @throws Throwable
     */
    public function show()
    {
        $lecturer = self::getLecturer();
        $view = view("dashboard.admin.lecturer.components.modal-show", compact("lecturer"))->render();
        return $this->apiResponse(["html" => $view]);
    }

    /**
     * Display model change state.
     *
     * @return ResponseFactory|Response
     * @throws Throwable
     */
    public function changeState()
    {
        $lecturer = self::getLecturer();
        $view = view("dashboard.admin.lecturer.components.modal-change-state", compact("lecturer"))->render();
        return $this->apiResponse(["html" => $view]);
    }

    /**
     * Get the specified lecturer from storage.
     *
     * @return mixed
     */
    public static function getLecturer() {
        return Lecturer::where("id", request()->input("lecturer"))
            ->where("lang", app()->getLocale())
            ->first();
    }
}
