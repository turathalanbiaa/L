<?php

namespace App\Models;

use App\Enum\CourseType;
use Illuminate\Database\Eloquent\Model;

class GeneralCourse extends Model
{
    protected $table = "general_courses";
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = [
        "name",
        "lang",
        "description",
        "image",
        "state",
        "general_course_header_id",
        "lecturer_id",
        "created_at",
        "updated_at"
    ];

    public function lecturer()
    {
        return $this->belongsTo("App\\Models\\Lecturer");
    }

    public function generalCourseHeader()
    {
        return $this->belongsTo("App\\Models\\GeneralCourseHeader");
    }

    public function enrollments()
    {
        return $this->hasMany("App\\Models\\Enrollment")
            ->orderBy("id");
    }

    public function reviews()
    {
        return $this->hasMany("App\\Models\\Review", "course_id")
            ->where("course_type", CourseType::GENERAL)
            ->orderBy("id");
    }

    public function lessons()
    {
        return $this->hasMany("App\\Models\\Lesson", "course_id")
            ->where("course_type", CourseType::GENERAL)
            ->orderBy("order");
    }
}
