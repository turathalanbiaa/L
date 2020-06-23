<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Course\GeneralCoursesCollectionWithoutLecturer as GeneralCoursesCollection;
use App\Http\Resources\Course\StudyCoursesCollectionWithoutLecturer as StudyCoursesCollection;
use App\Http\Resources\Lecturer\LecturersCollection;
use App\Http\Resources\Lecturer\SingleLecturer;
use App\Models\Lecturer;

class LecturerController extends Controller
{
    use ResponseTrait;

    public function all()
    {
        $q = request()->input("q");
        $lecturers = (\request()->input("q"))
            ? Lecturer::where("name", "like", "%$q%")->paginate(10)
            : Lecturer::paginate(10);
        LecturersCollection::collection($lecturers);

        return $this->paginateResponse($lecturers);
    }

    public function single($lecturer) {
        $lecturer = Lecturer::find($lecturer);

        if (!$lecturer)
            return $this->simpleResponseWithError("not_found");

        return $this->simpleResponse(new SingleLecturer($lecturer));
    }

    public function generalCourses($lecturer) {
        $lecturer = Lecturer::find($lecturer);

        if (!$lecturer)
            return $this->simpleResponseWithError("not_found");

        return $this->simpleResponse(GeneralCoursesCollection::collection($lecturer->availableGeneralCourses));
    }

    public function studyCourses($lecturer) {
        $lecturer = Lecturer::find($lecturer);

        if (!$lecturer)
            return $this->simpleResponseWithError("not_found");

        return $this->simpleResponse(StudyCoursesCollection::collection($lecturer->availableStudyCourses));
    }
}
