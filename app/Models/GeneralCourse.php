<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneralCourse extends Model
{
    protected $table = "general_courses";
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = [
        "id",
        "name",
        "general_course_header_id",
        "lecturer_id",
        "lang",
        "description",
        "details",
        "created_at"
    ];

    public function generalCourseHeader()
    {
        return $this->belongsTo("App\\Models\\GeneralCourseHeader");
    }
}
