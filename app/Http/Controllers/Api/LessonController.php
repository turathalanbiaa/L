<?php

namespace App\Http\Controllers\Api;

use App\Enum\CourseType;
use App\Http\Controllers\Controller;
use App\Http\Resources\Lesson\LessonsCollection;
use App\Models\Lesson;

class LessonController extends Controller
{
    use ResponseTrait;

    public function all()
    {
        $lessons = Lesson::where("course_id", \request()->input("course"))
            ->where("type", request()->input("type"))
            ->orderBy("order")
            ->get();

        return $this->simpleResponse(LessonsCollection::collection($lessons));
    }
}
