<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lecturer;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    use ResponseTrait;

    public function index()
    {
        $lecturers = (\request()->input("q"))
            ? Lecturer::where("name", 'like', '%' . \request()->input("q") . '%')
                ->paginate(10)
            : Lecturer::paginate(10);

        return $this->paginateResponse($lecturers);
    }

    public function show($lecturer) {
        $lecturer = Lecturer::find($lecturer);

        if (!$lecturer)
            return $this->simpleResponseWithError("not_found");

        return $this->simpleResponse($lecturer);
    }

    public function courses($lecturer) {
        $lecturer = Lecturer::find($lecturer);

        if (!$lecturer)
            return $this->simpleResponseWithError("not_found");

        $courses = collect([$lecturer->generalCourses , $lecturer->studyCourses])->collapse();
        return $this->simpleResponse($courses->isEmpty() ? null : $courses);
    }
}
