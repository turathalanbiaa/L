<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Course\SimpleGeneralCourse;
use App\Http\Resources\Course\SimpleStudyCourse;
use App\Models\GeneralCourse;
use App\Models\GeneralCourseHeader;
use App\Models\StudyCourse;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    use ResponseTrait;

    public function generalCourses() {
        $q = request()->input("q");
        $courses = (\request()->input("q"))
            ? GeneralCourse::where("name", "like", "%$q%")->paginate(10)
            : GeneralCourse::paginate(10);

        return $this->paginateResponse(SimpleGeneralCourse::collection($courses), $courses);
    }

    public function studyCourses() {
        $q = request()->input("q");
        $courses = (\request()->input("q"))
            ? StudyCourse::where("name", "like", "%$q%")->paginate(10)
            : StudyCourse::paginate(10);

        return $this->paginateResponse(SimpleStudyCourse::collection($courses), $courses);
    }

    public function generalCourseHeader($generalCourseHeader) {
        $courseHeader = GeneralCourseHeader::find($generalCourseHeader);

        if (!$courseHeader)
            return $this->simpleResponseWithError("Not_Found");

        return $this->simpleResponse($courseHeader);
    }
}
