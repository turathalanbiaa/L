<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Course\GeneralCourses;
use App\Http\Resources\Course\StudyCourses;
use App\Http\Resources\Lecturer\Lecturers;
use App\Http\Resources\Lecturer\SingleLecturer;
use App\Models\Lecturer;

class LecturerController extends Controller
{
    use ResponseTrait;

    public function index()
    {
        $q = request()->input("q");
        $lecturers = (\request()->input("q"))
            ? Lecturer::where("name", "like", "%$q%")->paginate(10)
            : Lecturer::paginate(10);

        return $this->paginateResponse(Lecturers::collection($lecturers), $lecturers);
    }

    public function show($lecturer) {
        $lecturer = Lecturer::find($lecturer);

        if (!$lecturer)
            return $this->simpleResponseWithError("not_found");

        return $this->simpleResponse(new SingleLecturer($lecturer));
    }

    public function studyCourses($lecturer) {
        $lecturer = Lecturer::find($lecturer);

        if (!$lecturer)
            return $this->simpleResponseWithError("not_found");

        return $this->simpleResponse($lecturer->availableStudyCourses->isEmpty()
            ? null
            : StudyCourses::collection($lecturer->availableStudyCourses));
    }

    public function generalCourses($lecturer) {
        $lecturer = Lecturer::find($lecturer);

        if (!$lecturer)
            return $this->simpleResponseWithError("not_found");

        return $this->simpleResponse($lecturer->availableGeneralCourses->isEmpty()
            ? null
            : GeneralCourses::collection($lecturer->availableGeneralCourses));
    }
}
