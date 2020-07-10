<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = "admins";
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = [
        "id",
        "name",
        "username",
        "password",
        "created_at",
        "updated_at",
        "last_login",
        "remember_token"
    ];

    public function roles()
    {
        return $this->belongsToMany("App\\Models\\Role")
            ->orderBy("id");
    }
}
