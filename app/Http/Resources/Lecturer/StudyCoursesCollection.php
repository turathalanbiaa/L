<?php

namespace App\Http\Resources\Lecturer;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudyCoursesCollection extends JsonResource
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
            "rating"            => round($this->reviews->avg("rate"), 2) ?? 0,
            "no.of_lessons"     => 120,
        ];
    }
}
