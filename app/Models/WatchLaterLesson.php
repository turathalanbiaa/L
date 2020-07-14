<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WatchLaterLesson extends Model
{
    protected $table = "watch_later_lessons";
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = [
        "id",
        "user_id",
        "lesson_id",
        "created_at",
        "updated_at"
    ];
}
