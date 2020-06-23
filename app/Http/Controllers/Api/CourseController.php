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

    public function allGeneralCourses()
    {
        $q = request()->input("q");
        $generalCourses = (\request()->input("q"))
            ? GeneralCourse::where("name", "like", "%$q%")->paginate(10)
            : GeneralCourse::paginate(10);
        GeneralCourses::collection($generalCourses);

        return $this->paginateResponse($generalCourses);
    }

    public function singleGeneralCourse($generalCourse)
    {
        $generalCourse = GeneralCourse::find($generalCourse);

        if (!$generalCourse)
            return $this->simpleResponseWithError("Not Found");

        return $this->simpleResponse($generalCourse);
    }

    public function studyCourses()
    {
        $q = request()->input("q");
        $studyCourses = (\request()->input("q"))
            ? StudyCourse::where("name", "like", "%$q%")->paginate(10)
            : StudyCourse::paginate(10);
        StudyCourses::collection($studyCourses);

        return $this->paginateResponse($studyCourses);
    }

    public function studyCourse($studyCourse)
    {
        $studyCourse = StudyCourse::find($studyCourse);

        if (!$studyCourse)
            return $this->simpleResponseWithError("Not Found");

        return $this->simpleResponse($studyCourse);
    }

    public function generalCourseHeader($generalCourseHeader)
    {
        $generalCourseHeader = GeneralCourseHeader::find($generalCourseHeader);

        if (!$generalCourseHeader)
            return $this->simpleResponseWithError("Not_Found");

        return $this->simpleResponse(new SingleGeneralCourseHerder($generalCourseHeader));
    }

    public function generalCoursesByHeader($generalCourseHeader)
    {
        $generalCourseHeader = GeneralCourseHeader::find($generalCourseHeader);

        if (!$generalCourseHeader)
            return $this->simpleResponseWithError("Not_Found");

        return $this->simpleResponse(GeneralCourses::collection($generalCourseHeader->generalCourses));
    }


}
