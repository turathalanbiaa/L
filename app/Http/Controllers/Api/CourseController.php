<?php

namespace App\Http\Controllers\Api;

use App\Enum\CourseState;
use App\Http\Controllers\Controller;
use App\Http\Resources\Course\GeneralCoursesCollection;
use App\Http\Resources\Course\GeneralCoursesCollectionWithoutHeader;
use App\Http\Resources\Course\SingleGeneralCourse;
use App\Http\Resources\Course\SingleStudyCourse;
use App\Http\Resources\Course\StudyCoursesCollection;
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
            ? GeneralCourse::where("name", "like", "%$q%")
                ->where("state", CourseState::ACTIVE)
                ->paginate(10)
            : GeneralCourse::where("state", CourseState::ACTIVE)
                ->paginate(10);
        GeneralCoursesCollection::collection($generalCourses);

        return $this->paginateResponse($generalCourses);
    }

    public function singleGeneralCourse($generalCourse)
    {
        $generalCourse = GeneralCourse::find($generalCourse);

        if (!$generalCourse)
            return $this->simpleResponseWithError("Not Found");

        if ($generalCourse->state == CourseState::INACTIVE)
            return $this->simpleResponseWithError("course_is_blocked");

        return $this->simpleResponse(new SingleGeneralCourse($generalCourse));
    }

    public function studyCourses()
    {
        $q = request()->input("q");
        $studyCourses = (\request()->input("q"))
            ? StudyCourse::where("name", "like", "%$q%")
                ->where("state", CourseState::ACTIVE)
                ->paginate(10)
            : StudyCourse::where("state", CourseState::ACTIVE)
                ->paginate(10);
        StudyCoursesCollection::collection($studyCourses);

        return $this->paginateResponse($studyCourses);
    }

    public function singleStudyCourse($studyCourse)
    {
        $studyCourse = StudyCourse::find($studyCourse);

        if (!$studyCourse)
            return $this->simpleResponseWithError("Not Found");

        if ($studyCourse->state == CourseState::INACTIVE)
            return $this->simpleResponseWithError("course_is_blocked");

        return $this->simpleResponse(new SingleStudyCourse($studyCourse));
    }

    public function generalCoursesByHeader($generalCourseHeader)
    {
        $generalCourseHeader = GeneralCourseHeader::find($generalCourseHeader);

        if (!$generalCourseHeader)
            return $this->simpleResponseWithError("Not_Found");

        return $this->simpleResponse(GeneralCoursesCollectionWithoutHeader::collection($generalCourseHeader->generalCourses));
    }
}
