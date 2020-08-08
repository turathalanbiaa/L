<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $table = "announcements";
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = [
        "title",
        "lang",
        "description",
        "image",
        "youtube_video",
        "type",
        "state",
        "created_at",
        "updated_at"
    ];
}
