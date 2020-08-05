<?php

namespace App\Http\Resources\Document;

use App\Enum\DocumentState;
use App\Enum\DocumentType;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class DocumentsCollection extends JsonResource
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
            "image" => Storage::url($this->image),
            "type"  => DocumentType::getTypeName($this->type),
            "state" => DocumentState::getStateName($this->state)
        ];
    }
}
