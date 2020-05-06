<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    protected $table = "lecturers";
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = [
        "id",
        "name",
        "lang",
        "email",
        "phone",
        "password",
        "description",
        "created_at",
        "last_login",
        "remember_token"
    ];

    public function studyCourses()
    {
        return $this->hasMany("App\\Models\\StudyCourse");
    }

    public function generalCourses()
    {
        return $this->hasMany("App\\Models\\GeneralCourse");
    }
}
