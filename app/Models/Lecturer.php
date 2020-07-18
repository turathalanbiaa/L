<?php

namespace App\Models;

use App\Enum\CourseState;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    protected $table = "lecturers";
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = [
        "name",
        "email",
        "phone",
        "password",
        "description",
        "image",
        "state",
        "token",
        "last_login",
        "created_at",
        "updated_at",
    ];

    public function generalCourses()
    {
        return $this->hasMany("App\\Models\\GeneralCourse")
            ->orderBy("id");
    }

    public function availableGeneralCourses()
    {
        return $this->hasMany("App\\Models\\GeneralCourse")
            ->where("state", CourseState::ACTIVE)
            ->orderBy("id");
    }

    public function studyCourses()
    {
        return $this->hasMany("App\\Models\\StudyCourse")
            ->orderBy("id");
    }

    public function availableStudyCourses()
    {
        return $this->hasMany("App\\Models\\StudyCourse")
            ->where("state", CourseState::ACTIVE)
            ->orderBy("id");
    }
}
