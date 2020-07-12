<?php

namespace App\Http\Resources\Lesson;

use App\Http\Resources\Lecturer\SimpleLecturer;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LessonsCollection extends JsonResource
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
            "id"            => $this->id,
            "title"         => $this->title,
            "order"         => $this->order,
            "youtube_video" => $this->youtube_video,
            "video_length"  => $this->video_length
        ];
    }
}
