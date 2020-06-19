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
        "id",
        "name",
        "lang",
        "stage",
        "lecturer_id",
        "description",
        "created_at"
    ];

    public function reviews() {
        return $this->hasMany("App\\Models\\Review", "course_id")
            ->where("type", CourseType::STUDY);
    }
}
