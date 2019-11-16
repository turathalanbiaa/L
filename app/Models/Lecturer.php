<?php

namespace Api\Models;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    protected $table = 'lecturers';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
