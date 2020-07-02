<?php

namespace App\Http\Resources\Review;

use App\Http\Resources\User\SimpleUser;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SingleReview extends JsonResource
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
            "id"          => $this->id,
            "user"        => new SimpleUser($this->user),
            "rate"        => $this->rate,
            "comment"     => $this->comment,
            "created_at"  => $this->created_at,
            "updated_at"  => $this->updated_at
        ];
    }
}
