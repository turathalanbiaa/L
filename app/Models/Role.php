<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = "roles";
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = [
        "id",
        "name",
        "description",
        "created_at"
    ];
}
