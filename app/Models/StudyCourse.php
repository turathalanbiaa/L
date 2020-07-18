<?php

namespace App\Models;

use App\Enum\CourseType;
use Illuminate\Database\Eloquent\Model;

class StudyCourse extends Model
{
    protected $table = "study_courses";
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = [
        "name",
        "lang",
        "description",
        "image",
        "stage",
        "state",
        "lecturer_id",
        "created_at",
        "updated_at"
    ];

    public function lecturer()
    {
        return $this->belongsTo("App\\Models\\Lecturer");
    }

    public function reviews()
    {
        return $this->hasMany("App\\Models\\Review", "course_id")
            ->where("type", CourseType::STUDY);
    }

    public function lessons()
    {
        return $this->hasMany("App\\Models\\Lesson", "course_id")
            ->where("type", CourseType::STUDY);
    }
}
