<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Lesson\LessonsCollection;
use App\Models\Lesson;
use App\Models\Timetable;
use App\Models\WatchedLesson;
use App\Models\WatchLaterLesson;

class LessonController extends Controller
{
    use ResponseTrait;

    public function watchLaterLessons()
    {
        $lessons_id = WatchLaterLesson::where("user_id", request()->header("token"))
            ->pluck("lesson_id")
            ->toArray();

        $lessons = Lesson::whereIn("id", $lessons_id)
            ->get();

        return $this->simpleResponse(LessonsCollection::collection($lessons));
    }

    public function addLessonToWatchLater()
    {
        $success = WatchLaterLesson::updateOrCreate([
            "user_id"    => request()->header("token"),
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
        $success = WatchLaterLesson::where("user_id", request()->header("token"))
            ->where("lesson_id", request()->input("lesson"))
            ->delete();

        if (!$success)
            return $this->simpleResponseWithError("error");

        return $this->simpleResponse(["message" => "success"]);
    }

    public function todayLessons()
    {
        $lessons_id = Timetable::where("stage", request()->input("stage"))
            ->where("publish_date", date("Y-m-d"))
            ->pluck("lesson_id")
            ->toArray();

        $lessons = Lesson::whereIn("id", $lessons_id)
            ->get();

        return $this->simpleResponse(LessonsCollection::collection($lessons));
    }

    public function missedLessons()
    {
        // User;;;;;
        $timetableLessons = Timetable::where("stage", request()->input("stage"))
            ->where("publish_date","<=", date("Y-m-d"))
            ->pluck("lesson_id")
            ->toArray();

        $watchedLessons = WatchedLesson::where("user_id", request()->input("user"))
            ->whereIn("lesson_id", $timetableLessons)
            ->pluck("lesson_id")
            ->toArray();

        return [$timetableLessons, $watchedLessons, array_diff($timetableLessons, $watchedLessons)];



        $lessons = Lesson::whereIn("id", $lessons_id)
            ->get();

        return $this->simpleResponse(LessonsCollection::collection($lessons));
    }
}
