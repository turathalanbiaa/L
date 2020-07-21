<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Lesson\LessonsCollection;
use App\Models\Lesson;
use App\Models\Timetable;
use App\Models\WatchLaterLesson;
use App\Models\WatchedTimetable;
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
        $lessonsId = Timetable::where("stage", request()->user->stage)
            ->where("publish_date", date("Y-m-d"))
            ->pluck("lesson_id")
            ->toArray();

        $lessons = Lesson::whereIn("id", $lessonsId)
            ->get();

        return $this->simpleResponse(LessonsCollection::collection($lessons));
    }

    public function missedLessons()
    {
        $timetablesId = Timetable::where("stage", request()->user->stage)
            ->pluck("id")
            ->toArray();

        $watchedTimetablesId = WatchedTimetable::where("user_id", request()->user->id)
            ->whereIn("timetable_id", $timetablesId)
            ->pluck("timetable_id")
            ->toArray();

        $lessonsId = Timetable::whereIn("id", array_values(array_diff($timetablesId, $watchedTimetablesId)))
            ->pluck("lesson_id")
            ->toArray();

        $lessons = Lesson::whereIn("id", $lessonsId)
            ->get();

        return $this->simpleResponse(LessonsCollection::collection($lessons));
    }
}
