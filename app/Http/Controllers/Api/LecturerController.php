<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Course\GeneralCourseCollection;
use App\Http\Resources\Course\StudyCourseCollection;
use App\Http\Resources\Lecturer\LecturerCollection;
use App\Http\Resources\Lecturer\SimpleLecturerCollection;
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

        return $this->paginateResponse(SimpleLecturerCollection::collection($lecturers), $lecturers);
    }

    public function show($lecturer) {
        $lecturer = Lecturer::find($lecturer);
        if (!$lecturer)
            return $this->simpleResponseWithError("not_found");

        return $this->simpleResponse(new LecturerCollection($lecturer));
    }

    public function studyCourses($lecturer) {
        $lecturer = Lecturer::find($lecturer);
        if (!$lecturer)
            return $this->simpleResponseWithError("not_found");

        return $this->simpleResponse($lecturer->availableStudyCourses->isEmpty()
            ? null
            : StudyCourseCollection::collection($lecturer->availableStudyCourses));
    }

    public function generalCourses($lecturer) {
        $lecturer = Lecturer::find($lecturer);
        if (!$lecturer)
            return $this->simpleResponseWithError("not_found");

        return $this->simpleResponse($lecturer->availableGeneralCourses->isEmpty()
            ? null
            : GeneralCourseCollection::collection($lecturer->availableGeneralCourses));
    }
}
