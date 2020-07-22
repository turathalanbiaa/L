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

    public function watchedLesson($lesson)
    {
        $user = request()->user;

        Lesson::where("id", $lesson)
            ->update(["seen" => DB::raw("seen +1")]);

        $timetable = Timetable::where("lesson_id", $lesson)
            ->where("stage", $user->stage)
            ->first();

        if ($timetable)
            WatchedTimetable::updateOrCreate([
                "user_id"      => $user->id,
                "timetable_id" => $timetable->id
            ], [
                "updated_at"   => date("Y-m-d  h:i:s")
            ]);

        return $this->simpleResponseWithMessage(true, "success");
    }

    public function watchLaterLessons()
    {
        $lessons_id = WatchLaterLesson::where("user_id", request()->user->id)
            ->orderByDesc("id")
            ->pluck("lesson_id")
            ->toArray();

        $lessons = Lesson::whereIn("id", $lessons_id)->get();

        return $this->simpleResponse(LessonsCollection::collection($lessons));
    }

    public function addLessonToWatchLater()
    {
        $watchLaterLesson = WatchLaterLesson::updateOrCreate([
            "user_id"    => request()->user->id,
            "lesson_id"  => request()->input("lesson")
        ], [
            "updated_at" => date("Y-m-d  h:i:s")
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
            ->orderBy("id")
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
            ->orderBy("id")
            ->pluck("lesson_id")
            ->toArray();

        $lessons = Lesson::whereIn("id", $lessonsId)
            ->get();

        return $this->simpleResponse(LessonsCollection::collection($lessons));
    }
}
