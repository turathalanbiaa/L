<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminRole extends Model
{
    protected $table = "admins_roles";
    protected $primaryKey = 'id';
    public $timestamps = false;
}
