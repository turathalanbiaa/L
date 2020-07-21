<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WatchTimetable extends Model
{
    protected $table = "watch_timetables";
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = [
        "user_id",
        "timetable_id",
        "created_at",
        "updated_at"
    ];
}
