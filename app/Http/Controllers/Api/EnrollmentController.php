<?php

namespace App\Http\Controllers\Api;

use App\Enum\CourseState;
use App\Enum\EnrollmentState;
use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use App\Models\GeneralCourse;

class EnrollmentController extends Controller
{
    use ResponseTrait;

    public function __construct()
    {
        $this->middleware("getCurrentUser")->only(["createOrUpdate"]);
    }

    public function createOrUpdate()
    {
        $generalCourse = GeneralCourse::find(\request()->input("generalCourse"));

        if (!$generalCourse)
            return $this->simpleResponseWithMessage(false, "general course not found");

        if ($generalCourse->state == CourseState::INACTIVE)
            return $this->simpleResponseWithMessage(false, "general course is blocked");

        $user = request()->user;

        $enrolled = Enrollment::updateOrCreate([
            "user_id" => $user->id,
            "general_course_id" => $generalCourse->id
        ], [
            "state" => (\request()->input("state") == EnrollmentState::SUBSCRIBE)
                ? EnrollmentState::SUBSCRIBE
                : EnrollmentState::UNSUBSCRIBE
        ]);

        if (!$enrolled)
            return $this->simpleResponseWithMessage(false, "try again");


        return ($enrolled->state == EnrollmentState::SUBSCRIBE)
            ? $this->simpleResponseWithMessage(true, "success subscribe")
            : $this->simpleResponseWithMessage(true, "success unsubscribe");
    }
}
