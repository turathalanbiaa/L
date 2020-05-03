<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneralCourseHeader extends Model
{
    protected $table = "general_course_headers";
    protected $primaryKey = "id";
    public $timestamps = false;
//    public function GeneralCourse()
//    {
//        return $this->hasMany('app\modeles\GeneralCourse');
//    }
    protected $fillable = [
        "id",
        "title",
        "lang",
        "description",
        "created_at"
    ];
}
