<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Lesson\LessonsCollection;
use App\Models\Lesson;
use App\Models\Timetable;
use App\Models\WatchLaterLesson;
use Illuminate\Support\Facades\DB;

class LessonController extends Controller
{
    use ResponseTrait;

    public function __construct()
    {
        $this->middleware("getCurrentUser");
    }

    public function incrementSeen() {
        Lesson::where("id", request()->input("lesson"))
            ->update(["seen" => DB::raw("seen +1")]);

        return $this->simpleResponseWithMessage(true, "success");
    }

    public function watchLaterLessons()
    {
        $lessons_id = WatchLaterLesson::where("user_id", request()->user->id)
            ->pluck("lesson_id")
            ->toArray();

        $lessons = Lesson::whereIn("id", $lessons_id)->get();

        return $this->simpleResponse(LessonsCollection::collection($lessons));
    }

    public function addLessonToWatchLater()
    {
        $watchLaterLesson = WatchLaterLesson::create([
            "user_id"    => request()->user->id,
            "lesson_id"  => request()->input("lesson")
        ]);

        if (!$watchLaterLesson)
            return $this->simpleResponseWithMessage(false, "try again");

        return $this->simpleResponseWithMessage(true, "success");
    }

    public function deleteLessonFromWatchLater()
    {
        $watchLaterLesson = WatchLaterLesson::where("user_id", request()->user->id)
            ->where("lesson_id", request()->input("lesson"))
            ->delete();

        if (!$watchLaterLesson)
            return $this->simpleResponseWithMessage(false, "try again");

        return $this->simpleResponseWithMessage(true, "success");
    }

    public function todayLessons()
    {
        $lessons_id = Timetable::where("stage", request()->user->stage)
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
