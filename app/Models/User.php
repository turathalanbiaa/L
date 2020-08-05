<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = "users";
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = [
        "name",
        "type",
        "lang",
        "stage",
        "email",
        "phone",
        "password",
        "gender",
        "country",
        "birth_date",
        "address",
        "certificate",
        "created_at",
        "updated_at",
        "last_login",
        "state",
        "token"
    ];

    public function documents()
    {
        return $this->hasMany("App\\Models\\Document")
            ->orderBy("type");
    }
}
