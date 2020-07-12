<?php

namespace App\Http\Resources\Course;

use App\Enum\Stage;
use App\Http\Resources\Lecturer\SimpleLecturer;
use App\Http\Resources\Lesson\LessonsCollection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SingleStudyCourse extends JsonResource
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
            "stage"             => Stage::getStageName($this->stage),
            "lecturer"          => new SimpleLecturer($this->lecturer),
            "rating"            => round($this->reviews->avg("rate"), 2) ?? 0,
            "no.of_lessons"     => $this->lessons->count(),
            "lessons"           => LessonsCollection::collection($this->lessons)
        ];
    }
}
