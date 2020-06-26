<?php

namespace App\Http\Controllers\Api;

use App\Enum\CourseState;
use App\Enum\EnrollmentState;
use App\Enum\UserState;
use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use App\Models\GeneralCourse;
use App\Models\User;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    use ResponseTrait;

    public function createOrUpdate()
    {
        $user = User::find(\request()->input("user"));

        if (!$user)
            return $this->simpleResponseWithError("user_not_found");

        if ($user->state == UserState::DISABLE)
            return $this->simpleResponseWithError("user_is_Blocked");

        $generalCourse = GeneralCourse::find(\request()->input("generalCourse"));

        if (!$generalCourse)
            return $this->simpleResponseWithError("course_not_found");

        if ($generalCourse->state == CourseState::INACTIVE)
            return $this->simpleResponseWithError("course_is_Blocked");

        $enrollment = Enrollment::where("user_id", $user->id)
            ->where("general_course_id", $generalCourse->id)
            ->first();

        if ($enrollment) {
            $enrollment->state = \request()->input("state");
            $enrollment->updated_at = date("Y-m-d");
        } else {
            $enrollment = new Enrollment();
            $enrollment->user_id = $user->id;
            $enrollment->general_course_id = $generalCourse->id;
            $enrollment->state = \request()->input("state");
            $enrollment->created_at = date("Y-m-d");
            $enrollment->updated_at = date("Y-m-d");
        }
        $success = $enrollment->save();

        if (!$success)
            return $this->simpleResponseWithError("try_again");

        return $this->simpleResponse($enrollment);
    }

    public function getState()
    {
        $enrollment = Enrollment::where("user_id", \request()->input("user"))
            ->where("general_course_id",  \request()->input("generalCourse"))
            ->first();

        if (($enrollment && $enrollment->state == EnrollmentState::SUBSCRIBE)) {
            return $this->simpleResponse(["state" => true]);
        } else {
            return $this->simpleResponse(["state" => false]);
        }
    }
}
