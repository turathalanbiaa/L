<?php

namespace App\Http\Resources\Course;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GeneralCourseCollection extends JsonResource
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
            "header"            => is_null($this->general_course_header_id)
                ? null
                : new GeneralCourseHerderCollection($this->generalCourseHeader),
            "no.of_enrollments" => 120,
            "rating"            => 120,
            "no.of_lessons"     => 120,
        ];
    }
}
