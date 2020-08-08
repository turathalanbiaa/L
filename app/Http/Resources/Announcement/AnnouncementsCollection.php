<?php

namespace App\Http\Resources\Announcement;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class AnnouncementsCollection extends JsonResource
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
            "title" => $this->title,
            "description" => $this->description,
            "image" => Storage::url($this->image),
            "youtube_video" => $this->youtube_video
        ];
    }
}
