<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    protected $table = "timetables";
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = [
        "id",
        "lesson_id",
        "stage",
        "publish_date"
    ];
}
