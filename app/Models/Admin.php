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
        "lang",
        "username",
        "password",
        "created_at",
        "last_login",
        "remember_token"
    ];

    public function roles() {
        return $this->belongsToMany("App\\Models\\Role");
    }
}
