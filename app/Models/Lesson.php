<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $table = "lessons";
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = [
        "title",
        "description",
        "youtube_video",
        "video_length",
        "order",
        "seen",
        "lecturer_id",
        "course_id",
        "course_type",
        "created_at",
        "updated_at"
    ];

    public function lecturer()
    {
        return $this->belongsTo("App\\Models\\Lecturer");
    }
}
