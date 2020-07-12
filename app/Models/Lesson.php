<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $table = "lessons";
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = [
        "id",
        "title",
        "description",
        "lecturer_id",
        "course_id",
        "type",
        "youtube_video",
        "video_length",
        "order",
        "created_at",
        "updated_at"
    ];

    public function lecturer()
    {
        return $this->belongsTo("App\\Models\\Lecturer");
    }
}
