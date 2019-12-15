<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\GeneralCourseHeader as GeneralCourseHeaderResource;
class GeneralCourse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'general_course_header_id' => $this->general_course_header_id,
            'header' =>$this->header->title,
            'lecturer_id' => $this->lecturer_id,
            'lang' => $this->lang,
            'description' => $this->description
        ];
    }
}
