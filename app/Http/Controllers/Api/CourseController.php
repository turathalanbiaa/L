<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Course\GeneralCourses;
use App\Http\Resources\Course\SingleGeneralCourseHerder;
use App\Http\Resources\Course\StudyCourses;
use App\Models\GeneralCourse;
use App\Models\GeneralCourseHeader;
use App\Models\StudyCourse;

class CourseController extends Controller
{
    use ResponseTrait;

    public function generalCourses() {
        $q = request()->input("q");
        $generalCourses = (\request()->input("q"))
            ? GeneralCourse::where("name", "like", "%$q%")->paginate(10)
            : GeneralCourse::paginate(10);

        return $this->paginateResponse(GeneralCourses::collection($generalCourses), $generalCourses);
    }

    public function studyCourses() {
        $q = request()->input("q");
        $studyCourses = (\request()->input("q"))
            ? StudyCourse::where("name", "like", "%$q%")->paginate(10)
            : StudyCourse::paginate(10);

        return $this->paginateResponse(StudyCourses::collection($studyCourses), $studyCourses);
    }

    public function generalCourseHeader($generalCourseHeader) {
        $generalCourseHeader = GeneralCourseHeader::find($generalCourseHeader);

        if (!$generalCourseHeader)
            return $this->simpleResponseWithError("Not_Found");

        return $this->simpleResponse(new SingleGeneralCourseHerder($generalCourseHeader));
    }

    public function generalCoursesByHeader($generalCourseHeader) {
        $generalCourseHeader = GeneralCourseHeader::find($generalCourseHeader);

        if (!$generalCourseHeader)
            return $this->simpleResponseWithError("Not_Found");

        return $this->simpleResponse($generalCourseHeader->generalCourses->isEmpty()
            ? null
            : GeneralCourses::collection($generalCourseHeader->generalCourses));
    }
}
