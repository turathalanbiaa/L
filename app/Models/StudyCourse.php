<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudyCourse extends Model
{
    protected $table = 'study_courses';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
