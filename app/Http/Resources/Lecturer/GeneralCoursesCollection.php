<?php

namespace App\Http\Resources\Lecturer;

use App\Http\Resources\Course\SimpleGeneralCourseHerder;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GeneralCoursesCollection extends JsonResource
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
            "header"            => new SimpleGeneralCourseHerder($this->generalCourseHeader),
            "no.of_enrollments" => $this->enrollments->count(),
            "rating"            => round($this->reviews->avg("rate"), 2) ?? 0,
            "no.of_lessons"     => 120,
        ];
    }
}
