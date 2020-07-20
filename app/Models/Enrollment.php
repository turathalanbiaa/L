<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    protected $table = "enrollments";
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = [
        "user_id",
        "general_course_id",
        "state",
        "created_at",
        "updated_at"
    ];
}
