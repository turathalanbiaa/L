<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WatchedLesson extends Model
{
    protected $table = "watched_lessons";
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = [
        "id",
        "user_id",
        "lesson_id",
        "counter",
        "datetime"
    ];
}
