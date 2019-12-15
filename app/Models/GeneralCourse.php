<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneralCourse extends Model
{
    protected $table = 'general_courses';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function header()
    {
        return $this->belongsTo('App\Models\GeneralCourseHeader','general_course_header_id');
    }
}
