<?php

namespace App\Models;

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
        "details",
        "created_at"
    ];
}
