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
    private $user;

    public function __construct()
    {
        $this->middleware("getCurrentUser")->only(["createOrUpdate"]);
        $this->user = request()->user;
    }

    public function createOrUpdate()
    {
        $generalCourse = GeneralCourse::find(\request()->input("generalCourse"));

        if (!$generalCourse)
            return $this->simpleResponseWithMessage(false, "general course not found");

        if ($generalCourse->state == CourseState::INACTIVE)
            return $this->simpleResponseWithMessage(false, "general course is blocked");

        $enrollment = Enrollment::where("user_id", $this->user->id)
            ->where("general_course_id", $generalCourse->id)
            ->first();
        $state = (\request()->input("state") == EnrollmentState::SUBSCRIBE)
            ? EnrollmentState::SUBSCRIBE
            : EnrollmentState::UNSUBSCRIBE;

        if ($enrollment) {
            $enrollment->state = $state;
            $enrollment->updated_at = date("Y-m-d");
        } else {
            $enrollment = new Enrollment();
            $enrollment->user_id = $user->id;
            $enrollment->general_course_id = $generalCourse->id;
            $enrollment->state = $state;
            $enrollment->created_at = date("Y-m-d");
            $enrollment->updated_at = date("Y-m-d");
        }

        $success = $enrollment->save();

        if (!$success)
            return $this->simpleResponseWithError("try_again");

        return $this->simpleResponse($enrollment);
    }
}
