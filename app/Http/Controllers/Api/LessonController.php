<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Lesson\LessonsCollection;
use App\Models\Lesson;
use App\Models\WatchLaterLesson;

class LessonController extends Controller
{
    use ResponseTrait;

    public function watchLaterLessons()
    {
        $lessons_id = WatchLaterLesson::where("user_id", request()->input("user"))
            ->pluck("lesson_id")
            ->toArray();

        $lessons = Lesson::whereIn("id", $lessons_id)
            ->get();

        return $this->simpleResponse(LessonsCollection::collection($lessons));
    }

    public function addLessonToWatchLater()
    {
        $success = WatchLaterLesson::updateOrCreate([
            "user_id"    => request()->input("user"),
            "lesson_id"  => request()->input("lesson")
        ], [
            "updated_at" => date("Y-m-d h:i:s")
        ]);

        if (!$success)
            return $this->simpleResponseWithError("error");

        return $this->simpleResponse(["message" => "success"]);
    }

    public function deleteLessonFromWatchLater()
    {
        $success = WatchLaterLesson::where("user_id", request()->input("user"))
            ->where("lesson_id", request()->input("lesson"))
            ->delete();

        if (!$success)
            return $this->simpleResponseWithError("error");

        return $this->simpleResponse(["message" => "success"]);
    }
}
