<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WatchedTimetable extends Model
{
    protected $table = "watched_timetables";
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = [
        "user_id",
        "timetable_id",
        "created_at",
        "updated_at"
    ];
}
