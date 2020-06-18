<?php

namespace App\Http\Resources\Lecturer;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\GeneralCourseHeader as GeneralCourseHeaderResource;
class SingleLecturer extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id"          => $this->id,
            "name"        => $this->name,
            "email"       => $this->email,
            "phone"       => $this->phone,
            "description" => $this->description,
            "details"     => $this->details,
            "image"       => $this->image
        ];
    }
}
