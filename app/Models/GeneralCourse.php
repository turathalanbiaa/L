<?php

namespace App\Models;

use App\Enum\CourseType;
use App\Enum\EnrollmentState;
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
        "created_at"
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
        return $this->hasMany("App\\Models\\Enrollment");
    }

    public function isEnrolled()
    {
        $enrollment = Enrollment::where("general_course_id", $this->id)
            ->where("user_id", request()->header("token"))
            ->first();

        return $enrollment->state ?? EnrollmentState::UNSUBSCRIBE;
    }

    public function reviews()
    {
        return $this->hasMany("App\\Models\\Review", "course_id")
            ->where("type", CourseType::GENERAL);
    }

    public function lessons()
    {
        return $this->hasMany("App\\Models\\Lesson", "course_id")
            ->where("type", CourseType::GENERAL);
    }
}
