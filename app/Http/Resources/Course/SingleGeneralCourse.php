<?php

namespace App\Http\Resources\Course;

use App\Enum\EnrollmentState;
use App\Http\Resources\Lecturer\SimpleLecturer;
use App\Http\Resources\Lesson\LessonsCollection;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use phpDocumentor\Reflection\Types\This;

class SingleGeneralCourse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id"                => $this->id,
            "name"              => $this->name,
            "description"       => $this->description,
            "image"             => $this->image,
            "lecturer"          => new SimpleLecturer($this->lecturer),
            "header"            => new SingleGeneralCourseHerder($this->generalCourseHeader),
            "is_enrolled"       => $this->isEnrolled(\request()->user),
            "no.of_enrollments" => $this->enrollments->count(),
            "rating"            => round($this->reviews->avg("rate"), 2) ?? 0,
            "no.of_lessons"     => $this->lessons->count(),
            "lessons"           => LessonsCollection::collection($this->lessons)
        ];
    }

    private function isEnrolled($user)
    {
        $enrollment = Enrollment::where("general_course_id", $this->id)
            ->where("user_id", $user->id)
            ->first();

        return $enrollment->state ?? EnrollmentState::UNSUBSCRIBE;
    }
}
